<?php
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/nav.php';
include_once __DIR__ . '/classes/Product.php';

if (isset($_POST['submit'])) {
    $customerObj->insertData($_POST);
}

?>

<div class="container mt-5">
    <h4 class="mb-5">Inserisci i tuoi prodotti</h4>
    <form action="form.php" method="post">
        <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            <input type="text" class="form-control" name="image" value="">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" name="name" value="">
        </div>
        <div class="mb-3">
            <label for="fragrances" class="form-label">Fragranza</label>
            <input type="text" class="form-control" name="fragrances" value="">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione </label>
            <textarea class="form-control" name="description" rows="3" value=""></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" class="form-control" name="price" value="">
        </div>
        <button type="submit" class="btn btn-primary">Inserisci</button>
    </form>
</div>