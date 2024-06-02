<?php
include "headerAdmin.php";
global $db;

if (isset($_POST['reg'])){
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    $keterangan = $_POST['keterangan'];

    $sql = "INSERT INTO kamar (jenis, harga, keterangan) VALUES ('$jenis', '$harga', '$keterangan')";

    if ($db->query($sql)) {
        echo "<script> alert('Berhasil Menambah Data');
        document.location='Kamar.php';</script>";
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
    <title>Tambah Data kamar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container p-3 text-left">
    <div class="row">
        <div class="col">
            <h1>Tambah Data Kamar</h1>
        </div>
    </div>
    <form method="post">
        <div class="form-floating mb-3">
            <input type="text" class="form-control form-control-lg bg-light fs-6" name="jenis" placeholder="Jenis Kamar">
            <label for="floatingInput">Jenis Kamar</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control form-control-lg bg-light fs-6" name="harga" placeholder="Harga kamar">
            <label for="floatingInput">Harga</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control form-control-lg bg-light fs-6" name="keterangan" placeholder="Keterangan">
            <label for="floatingInput">Keterangan</label>
        </div>
        <div class="input-group mb-3">
            <button class="btn btn-lg btn-warning w-100 fs-6 m-3" name="reg">Tambah Data kamar</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
