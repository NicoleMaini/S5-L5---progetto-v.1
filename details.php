<?php

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/nav.php';
include __DIR__ . '/classes/Product.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: dashboard.php');
    exit();
}

$id = $_GET['id'];
$product = new product();
$prod = $product->getProduct($id);

?>

<div class="container mt-5 text-center d-flex">
    <div><img src="<?= $prod['image'] ?>" alt="" width="500"></div>
    <div class="p-5 pt-0">
        <h2><?= $prod['name'] ?></h2>
        <p class="fw-bold"><?= $prod['fragrances'] ?></p>
        <p><?= $prod['description'] ?> </p>
        <p class="btn-info text-end fw-bold fs-5"><?= $prod['price'] ?>€</p>
        <p class="small text-end">IVA inclusa</p>
        <a href="./index.php">Torna in home >></a>
    </div>
</div>

<?php include __DIR__ . '/includes/footer.php';
