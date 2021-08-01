<?php
$conn = mysqli_connect("sql307.epizy.com", "epiz_27436096", "DFnq7SLwbZxnea", "epiz_27436096_portofolio");


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;
    $number = $data['number'];
    $name = $data['name'];
    $technology = $data['technology'];
    $type = $data['type'];
    $link = $data['link'];
    $youtube = $data['youtube'];
    $developer = $data['developer'];
    $description = $data['description'];


    $image = upload();
    if (!$image) {
        return false;
    }

    $query = "INSERT INTO portofolios (number, name, technology, type, link, youtube, image, developer, description)
    VALUES ($number, '$name', '$technology', '$type', '$link', '$youtube', '$image', '$developer', '$description')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function upload()
{
    $namaFile = $_FILES['image']['name'];
    $ukuranFile = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];

    if ($error === 4) {
        echo "<script>
    alert('pilih gambar terlebih dahulu');
    </script>";
        return null;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('yang anda upload bukan gambar');
        </script>";
        return false;
    }



    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'images/' . $namaFileBaru);

    return $namaFileBaru;
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM portofolios WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function update($data)
{

    global $conn;
    $id = $data['id'];
    $number = $data['number'];
    $name = $data['name'];
    $technology = $data['technology'];
    $type = $data['type'];
    $link = $data['link'];
    $youtube = $data['youtube'];
    $developer = $data['developer'];
    $description = $data['description'];
    $oldImage = $data['oldImage'];

    if ($_FILES['image']['error'] === 4) {
        $image = $oldImage;
    } else {
        $image = upload();
    }

    $query = "UPDATE portofolios SET number = $number, name = '$name', technology = '$technology',
     type = '$type', image = '$image', link = '$link', youtube = '$youtube', developer = '$developer',
     description = '$description' WHERE id = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function updateBio($data)
{
    global $conn;
    $id = $data['id'];
    $nama = $data['nama'];
    $email = $data['email'];
    $password = $data['password'];
    $ttl = $data['ttl'];
    $jabatan = $data['jabatan'];
    $skill = $data['skill'];
    $telepon = $data['telepon'];
    $github = $data['github'];
    $portofolio = $data['portofolio'];
    $first_paragraf = $data['first_paragraf'];
    $second_paragraf = $data['second_paragraf'];
    $pengalaman = $data['pengalaman'];
    $oldImage = $data['oldImage'];

    if ($_FILES['image']['error'] === 4) {
        $image = $oldImage;
    } else {
        $image = upload();
    }

    $query = "UPDATE users SET nama = '$nama', email = '$email',
     password = '$password', ttl = '$ttl', jabatan = '$jabatan', skill = '$skill', telepon = '$telepon',
     github = '$github', portofolio = '$portofolio', first_paragraf = '$first_paragraf', second_paragraf = '$second_paragraf', 
     pengalaman = '$pengalaman', image = '$image' WHERE id = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function cari($keyword)
{

    $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR nrp LIKE '%$keyword%' OR email LIKE '%$keyword%' OR jurusan LIKE '%$keyword%'";

    return query($query);
}

function registrasi($data)
{
    global $conn;
    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('username yang anda masukan sudah terpakai');
        </script>";
        return false;
    }

    if ($password !== $password2) {
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
