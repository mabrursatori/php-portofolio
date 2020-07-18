<?php
require 'functions.php';
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

$id = $_GET['id'];

$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];



if (isset($_POST['submit'])) {
    if (ubah($_POST) > 0) {
        echo "
        <script>
alert('Data berhasil diubah');
document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
alert('Data gagal diubah');
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
                <h1 class="h1">Form Ubah Data Mahasiswa</h1>
                <a href="index.php" type="submit" class="btn btn-primary btn-beranda">Kembali Ke Beranda</a>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $mhs['id']; ?>">
                    <input type="hidden" name="gambarLama" value="<?= $mhs['gambar']; ?>">
                    <div class="form-group">
                        <label for="nrp">NRP</label>
                        <input type="text" class="form-control" name="nrp" id="nrp" required value="<?= $mhs['nrp']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" required value="<?= $mhs['nama']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" required value="<?= $mhs['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" class="form-control" name="jurusan" id="jurusan" required value="<?= $mhs['jurusan']; ?>"="Enter Jurusan">
                    </div>
                    <div class="row ml-1">
                        <img src="img/<?= $mhs['gambar']; ?>" class="img-thumbnail col-4" width="120px">
                        <div class="custom-file col-7">
                            <input type="file" class="custom-file-input align-self-start" id="gambar" name="gambar">
                            <label class="custom-file-label" for="gambar">Choose Image</label>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary mt-2" name="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>