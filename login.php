<?php

require 'functions.php';
session_start();
if (isset($_SESSION['login'])) {
    header('Location: admin.php');
}
$bio = query("SELECT * FROM users")[0];

if (isset($_POST['submit'])) {
    if ($_POST['username'] == "admin" && $_POST['password'] == "113355") {
        $_SESSION['login'] = true;
        header("Location: admin.php");
        exit;
    } else {
        echo "<script>alert('gagal login');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="row">
        <div class="col">


            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <a class="navbar-brand" href="index.php"><?= $bio['nama']; ?></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="portofolio.php">Portofolio</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        </div>
    </div>






    <!-- LOGIN -->

    <main>
        <section class="portofolio" id="about">
            <div class="container mt-3">
                <div class="row justify-content-center">
                    <!-- FORM -->
                    <div class="col-sm-7">
                        <div class="card">
                            <div class="card-header text-center">
                                <h2>Login</h2>
                            </div>
                            <div class="card-body">

                                <form action="" method="post">
                                    <!-- Email -->
                                    <div class="form-group row">
                                        <label for="username" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="username" class="form-control" id="username">
                                        </div>
                                    </div>
                                    <!-- password -->
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="password" class="form-control" id="password">
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" name="submit" type="submit">Login</button>
                                </form>
                            </div>
                        </div>


                    </div>


                </div>

            </div>

        </section>
    </main>
    <!-- akhir Login -->





    script src="js/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/script.js"></script>
</body>

</html>