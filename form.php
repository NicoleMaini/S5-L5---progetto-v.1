<?php

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/nav.php';

include_once __DIR__ . '/classes/Login.php';
include_once __DIR__ . '/classes/Product.php';

$product = new product();

if (!empty($_SESSION['id'])) {
    $user = $select->selectUserById($_SESSION['id']);

    if (!isset($_GET['id']) || empty($_GET['id'])) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $image = $_POST['image'];
            $name = $_POST['name'];
            $fragrances = $_POST['fragrances'];
            $description = $_POST['description'];
            $price = $_POST['price'];

            if ($product->createProduct($image, $name, $fragrances, $description, $price)) {
                header('Location: index.php');
                exit();
            } else {
                echo 'Failed to create post.';
            }
        }
    } else {
        $id = $_GET['id'];

        $prod = $product->getProduct($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $image = $_POST['image'];
            $name = $_POST['name'];
            $fragrances = $_POST['fragrances'];
            $description = $_POST['description'];
            $price = $_POST['price'];

            if (isset($name) && isset($price)) {
                if ($product->updateProduct($id, $image, $name, $fragrances, $description, $price)) {
                    header('Location: index.php');
                    exit();
                } else {
                    $error = "Errore durante l'aggiornamento del post.";
                }
            } else {
                $error = 'Compilare tutti i campi.';
            }
        }
    }
} else {
    header('Location: /S5-L5%20-%20progetto%20v.1/login.php');
    exit();
}

?>

<div class="container mt-5">
    <h4 class="mb-5">Inserisci i tuoi prodotti</h4>
    <form
        action="<?= isset($_GET['id']) ? htmlspecialchars($_SERVER['PHP_SELF']) . '?id=' . $id : htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            <input type="text" class="form-control" name="image"
                value="<?= isset($_GET['id']) ? $prod['image'] : '' ?>">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" name="name"
                value="<?= isset($_GET['id']) ? $prod['name'] : '' ?>">
        </div>
        <div class="mb-3">
            <label for="fragrances" class="form-label">Fragranza</label>
            <input type="text" class="form-control" name="fragrances"
                value="<?= isset($_GET['id']) ? $prod['fragrances'] : '' ?>">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione </label>
            <textarea class="form-control" name="description" rows="3"
                value="<?= isset($_GET['id']) ? $prod['description'] : '' ?>"><?= isset($_GET['id']) ? $prod['description'] : '' ?></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="text" class="form-control" name="price"
                value="<?= isset($_GET['id']) ? $prod['price'] : '' ?>">
        </div>
        <button type="submit" class="btn btn-primary">Inserisci</button>
    </form>
</div>


<?php include __DIR__ . '/includes/footer.php';
