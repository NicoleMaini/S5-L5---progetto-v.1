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
            <div class="card h-100 position-relative">
                <img src="<?= $product['image'] ?>" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?= $product['name'] ?></h5>
                    <h5 class="small"><?= $product['fragrances'] ?></h5>
                    <p class="card-text mt-auto text-end fw-bold fs-5"><?= $product['price'] ?>€</p>
                    <a href="details.php?id=<?php echo $product['id']; ?>" class="btn btn-primary rounded-pill w-100">Clicca per
                        maggiori dettagli</a>
                    <?php if (!empty($_SESSION["id"])) { ?>
                    <div class="position-absolute" style="left: 10px; top: 10px;">
                        <a href="form.php?id=<?php echo $product['id']; ?>" class="btn btn-outline-warning rounded-circle"
                            style="background-color: #eae8d1;"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                            </svg></a>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" style="display: inline;">
                            <input type="hidden" name="delete_id" value="<?= $product['id'] ?>">
                            <button type="submit" class="btn btn-outline-danger rounded-circle"
                                style="background-color: #ead3d1;"
                                onclick="return confirm('Are you sure you want to delete this post?')"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                </svg></button>
                        </form>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include __DIR__ . '/includes/footer.php';
