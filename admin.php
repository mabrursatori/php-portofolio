<?php
require 'functions.php';
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: index.php');
}

$bio = query("SELECT * FROM users")[0];
$portofolios = query("SELECT * FROM portofolios");
if (isset($_GET['param'])) {
    if ($_GET['param'] == "edit") {
        $edit = query("SELECT * FROM portofolios WHERE id = " . $_GET['id'])[0];
    } else if ($_GET['param'] == "hapus") {
        if (hapus($_GET['id']) > 0) {
            header('Location: admin.php');
        } else {
            echo "<script>alert('gagal');</script>";
            header('Location: admin.php');
        }
    }
}

if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0) {
        echo "<script>alert('berhasil');</script>";
        header('Location: admin.php');
    } else {
        echo "<script>alert('gagal');</script>";
        header('Location: admin.php');
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
    <main>
        <section class="portofolio" id="about">
            <div class="container-fluid">
                <div class="row mx-2 my-3">
                    <!-- FORM -->
                    <div class="col-sm-2">

                        <h4>Tambah Data</h4>
                        <form action="<?= (isset($edit)) ? 'update.php' : ''; ?>" method="post" enctype="multipart/form-data">
                            <!-- NO -->
                            <input name="id" type="hidden" value="<?= (isset($edit['id'])) ? $edit['id'] : ''; ?>">
                            <input name="oldImage" type="hidden" value="<?= (isset($edit['image'])) ? $edit['image'] : ''; ?>">
                            <div class="form-group row">
                                <label for="number" class=" col-form-label">Number</label>

                                <input type="number" name="number" class="form-control" id="number" value="<?= (isset($edit['number'])) ? $edit['number'] : ''; ?>">

                            </div>
                            <!-- NAME -->
                            <div class="form-group row">
                                <label for="name" class="col-form-label">App Name</label>

                                <input type="text" name="name" class="form-control" id="name" value="<?= (isset($edit['name'])) ? $edit['name'] : ''; ?>">

                            </div>
                            <!-- TECHNOLOGY -->
                            <div class="form-group row">
                                <label for="technology" class=" col-form-label">Technology</label>

                                <input type="text" name="technology" class="form-control" id="technology" value="<?= (isset($edit['technology'])) ? $edit['technology'] : ''; ?>">

                            </div>
                            <!-- TYPE -->
                            <div class="form-group row">
                                <label for="type" class="col-form-label">Type</label>

                                <input type="text" name="type" class="form-control" id="type" value="<?= (isset($edit['type'])) ? $edit['type'] : ''; ?>">

                            </div>
                            <!-- LINK -->
                            <div class="form-group row">
                                <label for="link" class=" col-form-label">Link</label>

                                <input type="text" name="link" class="form-control" id="link" value="<?= (isset($edit['link'])) ? $edit['link'] : ''; ?>">

                            </div>
                            <!-- YOUTUBE -->
                            <div class="form-group row">
                                <label for="youtube" class=" col-form-label">Youtube</label>

                                <input type="text" name="youtube" class="form-control" id="youtube" value="<?= (isset($edit['youtube'])) ? $edit['youtube'] : ''; ?>">

                            </div>
                            <!-- IMAGE -->
                            <div class="form-group row">
                                <label for="link" class="col-form-label">Image</label>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                            <!-- DEVELOPERS -->
                            <div class="form-group row">
                                <label for="developer" class=" col-form-label">Developers</label>

                                <textarea class="form-control" id="developer" name="developer" rows="3"><?= (isset($edit['developer'])) ? $edit['developer'] : ''; ?></textarea>

                            </div>
                            <div class="form-group row">
                                <label for="description" class=" col-form-label">Description</label>

                                <textarea class="form-control" id="description" name="description" rows="3"><?= (isset($edit['description'])) ? $edit['description'] : ''; ?></textarea>

                            </div>
                            <div class="row text-right">
                                <button type="submit" name="submit" class="btn btn-primary"><?= (isset($edit)) ? 'Update' : 'Tambahkan'; ?></button>
                            </div>

                        </form>

                    </div>

                    <!-- TABLE -->
                    <div class="col-sm-10">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Technology</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Youtube</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Developers</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($portofolios as $portofolio) : ?>
                                    <tr>
                                        <th scope="row"><?= $portofolio['number']; ?></th>
                                        <td><?= $portofolio['name']; ?></td>
                                        <td><?= $portofolio['technology']; ?></td>
                                        <td><?= $portofolio['type']; ?></td>
                                        <td><?= $portofolio['link']; ?></td>
                                        <td><?= $portofolio['youtube']; ?></td>
                                        <td>
                                            <img src="images/<?= $portofolio['image']; ?>" width="80px" alt="">
                                        </td>
                                        <td><?= $portofolio['developer']; ?>
                                        <td><?= $portofolio['description']; ?>
                                        <td>
                                            <a href="admin.php?param=edit&id=<?= $portofolio['id']; ?>" class="btn btn-warning">Edit</a>

                                            <a href="admin.php?param=hapus&id=<?= $portofolio['id']; ?>" class="btn btn-danger">Hapus</a>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mb-5" style="height: 200px;"></div>
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