<?php
require 'functions.php';
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: index.php');
}

if (isset($_POST['submit'])) {
    if (updateBio($_POST) > 0) {
        echo "<script>alert('berhasil');</script>";
    } else {
        echo "<script>alert('gagal');</script>";
    }
}
//$jumlahDataPerhalaman = 3;
//$jumlahData = count(query("SELECT * FROM mahasiswa"));
//$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
//$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
//$awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

$bio = query("SELECT * FROM users")[0];



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

                            <li class="nav-item active">
                                <a class="nav-link" href="admin.php">Admin</a>
                            </li>
                            <li>
                                <a href="bio.php" class="btn btn-warning mr-2">Edit Bio</a>
                            </li>
                            <li>
                                <a href="logout.php" class="btn btn-danger">Logout</a>
                            </li>


                        </ul>

                    </div>
                </div>
            </nav>

        </div>
    </div>


    <!-- CONTENT -->
    <div class="container mb-3">

        <div class="row my-3">
            <div class="col-sm-12">
                <h1>Edit Data</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $bio['id']; ?>">
                    <input type="hidden" name="oldImage" value="<?= $bio['image']; ?>">
                    <!-- NAMA -->
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="nama" class="form-control" id="name" value="<?= $bio['nama']; ?>">
                    </div>
                    <!-- EMAIL -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="<?= $bio['email']; ?>">
                    </div>
                    <!-- PASSWORD -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" value="<?= $bio['password']; ?>">
                    </div>
                    <!-- TTL -->
                    <div class="form-group">
                        <label for="ttl">TTL</label>
                        <input type="text" name="ttl" class="form-control" id="ttl" value="<?= $bio['ttl']; ?>">
                    </div>
                    <!-- TTL -->
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" id="jabatan" value="<?= $bio['jabatan']; ?>">
                    </div>
                    <!-- Skills -->
                    <div class="form-group">
                        <label for="skill">Skills</label>
                        <textarea class="form-control" name="skill" id="skill" rows="8"><?= $bio['skill']; ?></textarea>
                    </div>
                    <!-- Telp -->
                    <div class="form-group">
                        <label for="telepon">Telp</label>
                        <input type="text" name="telepon" class="form-control" id="telepon" value="<?= $bio['telepon']; ?>">
                    </div>
                    <!-- Github -->
                    <div class="form-group">
                        <label for="github">Github</label>
                        <input type="text" name="github" class="form-control" id="github" value="<?= $bio['github']; ?>">
                    </div>
                    <!-- Portofolio -->
                    <div class="form-group">
                        <label for="portofolio">Portofolio</label>
                        <input type="text" name="portofolio" class="form-control" id="portofolio" value="<?= $bio['portofolio']; ?>">
                    </div>
                    <!-- First Paragraf -->
                    <div class="form-group">
                        <label for="firstparagraf">First Paragraf</label>
                        <textarea class="form-control" name="first_paragraf" id="firstparagraf" rows="8"><?= $bio['first_paragraf']; ?></textarea>
                    </div>
                    <!-- Second Paragraf -->
                    <div class="form-group">
                        <label for="secondparagraf">Second Paragraf</label>
                        <textarea class="form-control" name="second_paragraf" id="secondparagraf" rows="8"><?= $bio['second_paragraf']; ?></textarea>
                    </div>
                    <!-- Pengalaman -->
                    <div class="form-group">
                        <label for="pengalaman">Pengalaman</label>
                        <textarea class="form-control" name="pengalaman" id="pengalaman" rows="8"><?= $bio['pengalaman']; ?></textarea>
                    </div>
                    <!-- IMAGE -->
                    <div class="form-group row">
                        <label for="link" class="col-form-label">Image</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>

    </div>
    <!-- CONTENT -->


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