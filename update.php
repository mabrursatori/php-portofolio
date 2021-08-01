<?php
require 'functions.php';
session_start();
if (update($_POST) > 0) {
    echo "<script>alert('berhasil');</script>";
    header('Location: admin.php');
} else {
    echo "<script>alert('gagal');</script>";
    header('Location: admin.php');
}
