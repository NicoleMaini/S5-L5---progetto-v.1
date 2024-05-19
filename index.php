<?php
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/nav.php';
include_once __DIR__ . '/classes/Login.php';
include_once __DIR__ . '/classes/Product.php';

$allProduct = new Product();

if (!empty($_SESSION['id'])) {
    $user = $select->selectUserById($_SESSION['id']);

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_id'])) {
        $delete_id = $_POST['delete_id'];
        if ($allProduct->deleteProduct($delete_id)) {
            header('Location: index.php');
            exit();
        } else {
            echo 'Error deleting product.';
        }
    }
}

$products = $allProduct->getProducts();

?>

<div class="container">
    <h1 class="text-center">Benvenuto nel nostro sito</h1>
    <div class="row">
        <?php foreach ($products as $product) : ?>
        <div class="col-3 p-2">
            <div class="card h-100">
                <img src="<?= $product['image'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $product['name'] ?></h5>
                    <h5 class="small"><?= $product['fragrances'] ?></h5>
                    <p class="card-text mt-auto"><?= $product['description'] ?></p>
                    <p class="card-text"><?= $product['price'] ?></p>
                    <a href="details.php?id=<?php echo $product['id']; ?>" class="btn btn-outline-primary">View</a>
                    <?php if (!empty($_SESSION["id"])) { ?>
                    <a href="form.php?id=<?php echo $product['id']; ?>" class="btn btn-outline-warning">Edit</a>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" style="display: inline;">
                        <input type="hidden" name="delete_id" value="<?= $product['id'] ?>">
                        <button type="submit" class="btn btn-outline-danger"
                            onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <?php include __DIR__ . '/includes/footer.php';
