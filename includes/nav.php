<?php
include_once __DIR__ . '/../classes/Login.php';

$select = new Select();

if (!empty($_SESSION['id'])) {
    $user = $select->selectUserById($_SESSION['id']);
}

?>

<div class="z-3 container-fluid position-fixed p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
        <div class="container-fluid d-felx  align-items-center">
            <a class="navbar-brand" href="/S5-L5%20-%20progetto%20v.1/index.php">CRUDazone-Refact</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav w-100">
                    <?php if (empty($_SESSION["id"])) { ?>
                    <li class="nav-item ms-auto">
                        <a class="btn btn-link px-3 text-decoration-none" aria-current="page"
                            href="/S5-L5%20-%20progetto%20v.1/login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary me-3" href="/S5-L5%20-%20progetto%20v.1/signup.php">Register</a>
                    </li><?php
                            } ?>
                    <?php if (!empty($_SESSION["id"])) { ?>
                    <p class="nav-link mb-0">Piacere di rivederti <?= $user['username'] ?></p>
                    <a class="btn btn-primary ms-auto" href="/S5-L5%20-%20progetto%20v.1/form.php">Aggiungi</a>
                    <a class="btn btn-link px-3 text-decoration-none"
                        href="/S5-L5%20-%20progetto%20v.1/logout.php">Logout</a>
                    <?php   } ?>
                </ul>
            </div>
        </div>
    </nav>
</div>
