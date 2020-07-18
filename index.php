<?php
require 'functions.php';
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}


$jumlahDataPerhalaman = 3;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerhalaman");

if (isset($_POST['cari'])) {
    $mahasiswa = cari($_POST['keyword']);
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
            <div class="col">
                <a href="logout.php" class="btn btn-danger">Logout</a> | <a href="cetak.php" target="_blank" class="btn btn-secondary">Cetak</a>
                <h1 class="h1">Daftar Mahasiswa</h1>



                <a href="tambah.php" class="btn btn-primary mb-2" id="btn-tambah">Tambahkan Mahasiswa</a>

                <form class="form-inline" action="" method="post" id="formSearch">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" id="keyword" name="keyword" autofocus autocomplete="off">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="tombol-cari" name="cari">Search</button>
                </form>

                <nav aria-label="Page navigation example" id="pagination">
                    <ul class="pagination">
                        <?php if ($halamanAktif > 1) : ?>
                            <li class="page-item">
                                <a href="?halaman=<?= $halamanAktif - 1; ?>" class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                            <?php if ($i == $halamanAktif) : ?>
                                <li class="page-item active">
                                    <a href="?halaman=<?= $i; ?>" class="page-link" href="#"><?= $i; ?><span class="sr-only">(current)</span></a>
                                </li>
                            <?php else : ?>

                                <li class="page-item"><a href="?halaman=<?= $i; ?>" class="page-link" href="#"><?= $i; ?></a></li>
                            <?php endif; ?>
                        <?php endfor; ?>
                        <?php if ($halamanAktif < $jumlahHalaman) : ?>
                            <li class="page-item">
                                <a href="?halaman=<?= $halamanAktif + 1; ?>" class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>

                <div id="container">
                    <table border="1" cellpadding="10" cellspacing="0" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr class="bg-primary">
                                <th scope="col">No.</th>
                                <th scope="col">Aksi</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">NRP</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Jurusan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($mahasiswa as $mhs) : ?>
                                <tr>
                                    <th scope="row"><?= $i + $awalData; ?></th>
                                    <td>
                                        <a class="btn btn-success" href="ubah.php?id=<?= $mhs['id']; ?>">Edit</a>
                                        <a class="btn btn-danger" href="hapus.php?id=<?= $mhs['id']; ?>" onclick=" return confirm('apakah anda yakin?');">Delete</a>
                                    </td>
                                    <td><img src="img/<?= $mhs['gambar']; ?>" width="100"></td>
                                    <td><?= $mhs['nrp']; ?></td>
                                    <td><?= $mhs['nama']; ?></td>
                                    <td><?= $mhs['email']; ?></td>
                                    <td><?= $mhs['jurusan']; ?></td>
                                    <?php $i++; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/script.js"></script>
</body>

</html>