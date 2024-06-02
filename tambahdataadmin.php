<?php
include "koneksi.php";
global $db;

if (isset($_POST['reg'])){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO Admin (nama, username, password) VALUES ('$nama', '$username', '$password')";

    if ($db->query($sql)) {
        echo "<script> alert('Berhasil Menambah Data');
        document.location='Admin.php';</script>";
        exit();
    } else {
        echo "Data Gagal";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<?php include "headerAdmin.php"; ?>
<body>
<div class="container p-3 text-left">
    <div class="row">
        <div class="col">
            <h1>Tambah Data Admin</h1>
        </div>
    </div>
    <form method="post">
        <div class="form-floating mb-3">
            <input type="text" class="form-control form-control-lg bg-light fs-6" name="nama" placeholder="Nama">
            <label for="floatingInput">Nama</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control form-control-lg bg-light fs-6" name="username" placeholder="Username">
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control form-control-lg bg-light fs-6" name="password" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="input-group mb-3">
            <button class="btn btn-lg btn-warning w-100 fs-6 m-3" name="reg">Tambah Data</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
