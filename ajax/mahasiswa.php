<?php
require '../functions.php';
$keyword = $_GET['keyword'];

$query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR nrp LIKE '%$keyword%' OR email LIKE '%$keyword%' OR jurusan LIKE '%$keyword%'";

$mahasiswa = query($query);
?>
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
                <th scope="row"><?= $i; ?></th>
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