<?php
include "headerAdmin.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM kamar WHERE id=?";
    global $db;
    $ff = $db->prepare($sql);
    $ff->bind_param("i", $id);
    $ff->execute();
    $result = $ff->get_result();

    if ($result) {
        $data = $result->fetch_assoc();
    } else {
        echo "Gagal Mengganti Data";
    }
}

if (isset($_POST['reg'])) {
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    $keterangan = $_POST['keterangan'];

    $sql = "UPDATE kamar SET jenis=?, harga=?, keterangan=? WHERE id=?";
    $ff = $db->prepare($sql);
    $ff->bind_param("sssi",$jenis, $harga, $keterangan, $id);
    $ff->execute();

    if ($ff->affected_rows > 0) {
        echo "<script> alert('Ubah Data Berhasil');
        document.location='Kamar.php';</script>";
    } else {
        echo "Data Gagal Diubah";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data Kamar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container p-3 text-left">
    <div class="row">
        <div class="col">
            <h1>Ubah Data Kamar</h1>
        </div>
    </div>
    <form method="post" action="prosesEditKamar.php">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <div class="form-floating mb-3">
            <input type="text" class="form-control form-control-lg bg-light fs-6" name="jenis" placeholder="Jenis Kamar" value="<?= $data['jenis']; ?>">
            <label for="floatingInput">Jenis Kamar</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control form-control-lg bg-light fs-6" name="harga" placeholder="Harga Kamar" value="<?= $data['harga']; ?>">
            <label for="floatingInput">Harga Kamar</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control form-control-lg bg-light fs-6" name="keterangan" placeholder="Keterangan" value="<?= $data['keterangan']; ?>">
            <label for="floatingInput">Keterangan</label>
        </div>
        <div class="input-group mb-3">
            <button class="btn btn-lg btn-warning w-100 fs-6 m-3" name="reg">Ubah Data</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
