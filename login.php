<?php
require 'functions.php';
session_start();

if (isset($_COOKIE['id']) && isset($_COOKIE['username'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['usernane'];

    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION['login'])) {
    header('Location: index.php');
    exit;
}


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {

            $_SESSION['login'] = true;

            if (isset($_POST['remember'])) {
                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }

            header('Location: index.php');
            exit;
        }
    }
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">

<body>

    <div class="container">
        <div class="row mt-5"></div>
        <div class="row mt-5"></div>
        <div class="row mt-5">
            <div class="col-3"></div>
            <div class="col-6">
                <h1 class="h1 title-login">User Login</h1>
                <button href="index.php" type="submit" class="btn btn-primary btn-beranda">Kembali Ke Beranda</button>
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger" role="alert">
                        Username atau Password anda salah!
                    </div>
                <?php endif; ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1" for="username" class="username-login">Username</label>
                        <input type="text" class="form-control" placeholder="Enter username" name="username" id="username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" for="password" class="password-login">Password</label>
                        <input type="password" class="form-control" placeholder="Enter passwords" name="password" id="password">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember">
                        <label class="form-check-label" for="remember">Remember Me!</label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2" name="login">Login</button>
                </form>
            </div>

        </div>
    </div>
</body>

</html>