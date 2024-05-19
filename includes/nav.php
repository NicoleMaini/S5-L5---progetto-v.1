<?php
include_once __DIR__ . '/../classes/Login.php';

$select = new Select();

if (!empty($_SESSION['id'])) {
    $user = $select->selectUserById($_SESSION['id']);
}

?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/S5-L5%20-%20progetto%20v.1/index.php">CRUDazone Refact</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php if (empty($_SESSION["id"])) { ?>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/S5-L5%20-%20progetto%20v.1/login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/S5-L5%20-%20progetto%20v.1/signup.php">Register</a>
                </li><?php
                        } ?>
            </ul>
            <?php if (!empty($_SESSION["id"])) { ?>
            <span><?= $user['username'] ?></span>
            <a class="nav-link me-3 ms-auto" href="/S5-L5%20-%20progetto%20v.1/form.php">Aggiungi</a>
            <a class="nav-link me-3 ms-auto" href="/S5-L5%20-%20progetto%20v.1/logout.php">Logout</a>
            <?php   } ?>
        </div>
    </div>
</nav>
