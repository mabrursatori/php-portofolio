<?php
require 'functions.php';
session_start();
$bio = query("SELECT * FROM users")[0];
$portofolio = query("SELECT * FROM portofolios WHERE id = " . $_GET['id'])[0];

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
        <section class="portofolio" id="about">

            <div class="container">

                <div class="row align-items-stretch mt-3">
                    <div class="col-sm-6">

                        <?php if ($portofolio['youtube'] != null) : ?>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $portofolio['youtube']; ?>?rel=0" allowfullscreen></iframe>
                            </div>
                        <?php else : ?>
                            <div class="jumbotron text-center" style="height: 100%;">
                                <p>Video tidak tersedia karena aplikasi berjalan dibelakang layar</p>
                            </div>
                        <?php endif; ?>



                    </div>
                    <div class="col-sm-6 align-items-center">
                        <table class="table align-items-center table-sm" style="border: 0px;">

                            <tbody>
                                <tr>
                                    <th style="border: 0px;" scope="row" width="20%">App Name</th>
                                    <th style="border: 0px;" width="5%">:</th>
                                    <td style="border: 0px;"><?= $portofolio['name']; ?></td>
                                </tr>

                                <tr>
                                    <th style="border: 0px;" scope="row" width="20%">Type</th>
                                    <th style="border: 0px;" width="5%">:</th>
                                    <td style="border: 0px;"><?= $portofolio['type']; ?></td>
                                </tr>

                                <tr>
                                    <th style="border: 0px;" scope="row" width="20%">Tools</th>
                                    <th style="border: 0px;" width="5%">:</th>
                                    <td style="border: 0px;"><?= $portofolio['technology']; ?></td>
                                </tr>

                                <tr>
                                    <th style="border: 0px;" scope="row" width="20%">Developers</th>
                                    <th style="border: 0px;" width="5%">:</th>
                                    <td style="border: 0px;"><?= $portofolio['developer']; ?></td>
                                </tr>
                                <tr>
                                    <th style="border: 0px;" scope="row" width="20%">Description</th>
                                    <th style="border: 0px;" width="5%">:</th>
                                    <td style="border: 0px;"><?= $portofolio['description']; ?></td>
                                </tr>
                                <tr>
                                    <td style="border: 0px;" colspan="3">
                                        <?php if ($portofolio['link'] != null) : ?>
                                            <a href="<?= ($portofolio['link'] != null) ? $portofolio['link'] : ''; ?>" class="btn btn-primary">Download Source Code</a>
                                        <?php else : ?>
                                            <div class="alert alert-danger" role="alert">
                                                Maaf source code tidak bisa dilihat karena kesepakatan dengan pihak yang bersangkutan
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </section>
    </main>
    <!-- akhir about -->
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