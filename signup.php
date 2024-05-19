<?php
include __DIR__ . '/includes/header.php';
// include __DIR__ . '/classes/Register.php';
include __DIR__ . '/classes/Login.php';

$register = new Register();

if (isset($_POST['submit'])) {
    $result = $register->registration($_POST['username'], $_POST['email'], $_POST['password'], $_POST['confirmpassword']);
    if ($result == 1) {
        echo "<script> alert('Registration Successful'); location.href = 'http://localhost/S5-L5%20-%20progetto%20v.1/login.php'</script>";
        // header("Location: login.php");
        // exit;
    } elseif ($result == 10) {
        echo "<script> alert('Username or Email Has Already Taken'); </script>";
    } elseif ($result == 100) {
        echo "<script> alert('Password Does Not Match'); </script>";
    }
}

?>

<div class="container px-5 mt-5">
    <h4 class="mb-5">SING UP</h4>
    <form action="" method="post">
        <div class="mb-3">
            <label class="form-label" for="username">Username</label>
            <input class="form-control" type="text" name="username" placeholder="Username" value="">
        </div>
        <div class="mb-3">
            <label class="form-label" for="password">Password</label>
            <input class="form-control" type="password" name="password" placeholder="Parssword" value="">
        </div>
        <div class="mb-3">
            <label class="form-label" for="confirmpassword">Conferma Password</label>
            <input class="form-control" type="password" name="confirmpassword" placeholder="Conferma Password"
                value="">
        </div>
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input class="form-control" type="text" name="email" placeholder="mail@provamail.con" value="">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Iscriviti</button>
    </form>
    <h4 class="mt-5">Sei già registrato? </h4>
    <a class="btn btn-success" href="./login.php">Accedi!</a>
    <p class="mt-5"> oppure </p>
    <a class="btn btn-warning" href="./index.php">torna in home</a>

</div>

<?php include __DIR__ . '/includes/footer.php';
