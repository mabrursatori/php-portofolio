<?php
require 'functions.php';
session_start();
$bio = query("SELECT * FROM users")[0];
$portofolio = query("SELECT * FROM portofolios");

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









    <!-- CONTENT -->
    <!-- PORTOFOLIO -->

    <main>
        <section class="portofolio" id="portofolio">

            <div class="container">

                <div class="row mt-5">
                    <?php foreach ($portofolio as $data) : ?>
                        <div class="col-sm-4 mb-5">
                            <div class="card" style="max-width: 100%;">
                                <img src="images/<?= $data['image']; ?>" class="card-img-top" alt="..." style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $data['name']; ?></h5>
                                    <div style="overflow: hidden; max-height: 25px;">
                                        <p class="card-text" style="min-height: 25px;"><?= $data['description']; ?>
                                    </div>
                                    <a href="portofolio-detail.php?id=<?= $data['id']; ?>" class="btn btn-primary btn-sm">View</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>
    <!-- AKHIR CONTENT -->













    <!-- footer -->

    <footer>
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-12">
                    <p>&copy; Copyright 2020 | built by <a href="http://instagram.com/mabrursatori">Mabrur</a></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- akhir footer -->
    <script src="js/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/script.js"></script>
</body>

</html>