<?php
require 'functions.php';
session_start();

//if (!isset($_SESSION['login'])) {
//    header('Location: login.php');
//    exit;
//}


//$jumlahDataPerhalaman = 3;
//$jumlahData = count(query("SELECT * FROM mahasiswa"));
//$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
//$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
//$awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

$bio = query("SELECT * FROM users")[0];
$portofolios = query("SELECT id, name, image FROM portofolios order by number limit 3");

//if (isset($_POST['cari'])) {
//    $mahasiswa = cari($_POST['keyword']);
//}
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

    <!-- jumbotron -->

    <div class="jumbotron text-center">
        <img src="images/<?= $bio['image']; ?>" class="img-circle">
        <h1><?= $bio['nama']; ?></h1>
        <h4><?= $bio['jabatan']; ?></h4>
    </div>

    <!-- akhir jumbotron -->

    <div class="prevabout" id="prevabout"></div>

    <!-- about -->

    <section class="about" id="about">
        <div class="contioner">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="text-center">About</h2>
                    <hr>
                </div>
            </div>



            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
                    <p><?= $bio['first_paragraf'] ?></p>
                </div>
                <div class="col-sm-4">
                    <p><?= $bio['second_paragraf'] ?></p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-6">
                    <table class="table table-sm ">
                        <tr>
                            <td><b>Nama</b></td>
                            <td><b>:</b></td>
                            <td><?= $bio['nama']; ?></td>
                        </tr>
                        <tr>
                            <td><b>TTL</b></td>
                            <td><b>:</b></td>
                            <td><?= $bio['ttl']; ?></td>
                        </tr>

                        <tr>
                            <td><b>Skills</b></td>
                            <td><b>:</b></td>
                            <td><?= $bio['skill']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Email</b></td>
                            <td><b>:</b></td>
                            <td><?= $bio['email']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Telp</b></td>
                            <td><b>:</b></td>
                            <td><a href="https://api.whatsapp.com/send?phone=<?= $bio['telepon']; ?>" target="_blank">+<?= $bio['telepon']; ?></a></td>
                        </tr>
                        <tr>
                            <td><b>Github</b></td>
                            <td><b>:</b></td>
                            <td><a href="<?= $bio['github']; ?>" target="_blank">mabrursatori</a></td>
                        </tr>
                        <tr>
                            <td><b>Portofolio</b></td>
                            <td><b>:</b></td>
                            <td><a href="http://<?= $bio['portofolio']; ?>" target="_blank"><?= $bio['portofolio']; ?></a></td>
                        </tr>

                    </table>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-sm-10">
                    <table class="table table-sm ">
                        <thead>
                            <tr class="table-primary">
                                <th>
                                    Pengalaman Kerja
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <?= $bio['pengalaman']; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>

    </section>

    <!-- akhir about -->

    <div class="prevportfolio" id="prevportfolio"></div>

    <!-- portfolio -->

    <section class="portfolio" id="portfolio">

        <div class="container">

            <div class="row">

                <div class="col-sm-12">

                    <h2 class="text-center">Portfolio</h2>

                    <hr>

                </div>

            </div>



            <div class="row justify-content-center">
                <?php foreach ($portofolios as $portofolio) : ?>
                    <div class="col-sm-4 mb-2">
                        <a href="portofolio-detail.php?id=<?= $portofolio['id']; ?>">
                            <div class="card" style="width: 100%;">
                                <img src="images/<?= $portofolio['image']; ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                                <div class="card-body text-center">
                                    <h5 class="card-title" style="text-decoration: none; color: gray;"><?= $portofolio['name']; ?></h5>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>



            </div>

            <div class="row justify-content-center mt-3 ">
                <a href="portofolio.php" class=" btn btn-outline-secondary">VIEW MORE</a>

            </div>

        </div>

    </section>

    <!-- akhir portfolio -->

    <div class="prevcontact" id="prevcontact"></div>

    <!-- contact -->

    <section class="contact" id="contact">
        <div class="container">
            <div class="col-sm-12 col-md-12 text-center">
                <h2>Contact</h2>
                <hr>
            </div>
        </div>
        <div class="row justify-content-center mx-2">
            <div class="col-sm-8 col-md-8">
                <form>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="masukan nama">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="masukan email">
                    </div>
                    <div class="form-group">
                        <label for="telp">No Telp</label>
                        <input type="tel" name="telp" id="telp" class="form-control" placeholder="masukan no telepon">
                    </div>
                    <select class="form-group">
                        <option>-- Pilih Kategori --</option>
                        <option>Web Development</option>
                        <option>Mobile Development</option>
                    </select>
                    <div class="form-group">
                        <label for="pesan">Pesan</label>
                        <textarea class="form-control" rows="10" placeholder="masukkan pesan"></textarea>
                    </div>
                    <button type="button" class="btn btn-secondary">Kirim</button>
                </form>
            </div>
        </div>
        </div>
    </section>

    <!-- akhir contact -->






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