<?php
require 'functions.php';
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0) {
        echo "
        <script>
alert('Data berhasil ditambahkan');
document.location.href = 'index.php';
        </script>
        ";
    } else {
        "
        <script>
alert('Data gagal ditambahkan');
        </script>
        ";
    }
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
        <div class="row mt-3">
            <div class="col-6" style="position: relativ;">
                <h1 class="h1">Form Tambah Data Mahasiswa</h1>
                <a href="index.php" type="submit" class="btn btn-primary btn-beranda">Kembali Ke Beranda</a>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nrp">NRP</label>
                        <input type="text" class="form-control" name="nrp" id="nrp" required placeholder="Enter NRP">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" required placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" required placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" class="form-control" name="jurusan" id="jurusan" required placeholder="Enter Jurusan">
                    </div>
                    <div class="custom-file">
                        <label>Gambar</label>
                        <input type="file" class="custom-file-input" id="gambar" name="gambar">
                        <label class="custom-file-label" for="gambar">Choose Image</label>
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>