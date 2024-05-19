<?php
include __DIR__ . '/includes/header.php';
include __DIR__ . '/classes/Login.php';

if (!empty($_SESSION["id"])) {
    header("Location: index.php");
}

$login = new Login();

if (isset($_POST["submit"])) {
    $result = $login->login($_POST["usernameemail"], $_POST["password"]);

    if ($result == 1) {
        $_SESSION["login"] = true;
        $_SESSION["id"] = $login->idUser();
        header("Location: index.php");
    } elseif ($result == 10) {
        echo
        "<script> alert('Wrong Password'); </script>";
    } elseif ($result == 100) {
        echo
        "<script> alert('User Not Registered'); </script>";
    }
}


?>

<div class="container px-5 my-5">
    <h4 class="mb-5">Login</h4>
    <form action="" method="post">
        <div class="mb-3">
            <label for="usernameemail" class="form-label">Inserisci lo username o la mail</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name="usernameemail" placeholder="Username or mail" value="">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Parssword" value="">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Accedi</button>
    </form>
    <h4 class="mt-5">Non sei ancora registrato? </h4>
    <a class="btn btn-success" href="./signup.php">Iscriviti!</a>
    <p class="mt-5"> oppure </p>
    <a class="btn btn-warning" href="./index.php">torna in home</a>
</div>

<?php

include __DIR__ . '/includes/footer.php';
