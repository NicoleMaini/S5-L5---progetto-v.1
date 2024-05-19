<?php

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/nav.php';
include __DIR__ . '/classes/Product.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: dashboard.php');
    exit();
}

$id = $_GET['id'];
$product = new product($conn);
$prod = $product->getProduct($id);

?>

<div class="container mt-5 text-center">
    <img src="<?= $prod['image'] ?>" alt="" width="500">
    <h2><?= $prod['name'] ?></h2>
    <p><?= $prod['fragrances'] ?></p>
    <p> <?= $prod['description'] ?> </p>
    <p class="btn-info"><?= $prod['price'] ?></p>
</div>
