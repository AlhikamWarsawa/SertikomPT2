<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM admin WHERE id=?";
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
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "UPDATE admin SET nama=?, username=?, password=? WHERE id=?";
    $ff = $db->prepare($sql);
    $ff->bind_param("sssi",$nama, $username, $password, $id);
    $ff->execute();

    if ($ff->affected_rows > 0) {
        echo "<script> alert('Ubah Data Berhasil');
        document.location='Admin.php';</script>";
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
    <title>Edit Data Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include "headerAdmin.php" ?>

<div class="container p-3 text-left">
    <div class="row">
        <div class="col">
            <h1>Ubah Data Admin</h1>
        </div>
    </div>
    <form method="post" action="prosesEdit.php">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <div class="form-floating mb-3">
            <input type="text" class="form-control form-control-lg bg-light fs-6" name="nama" placeholder="Nama" value="<?= $data['nama']; ?>">
            <label for="floatingInput">Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control form-control-lg bg-light fs-6" name="username" placeholder="Username" value="<?= $data['username']; ?>">
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control form-control-lg bg-light fs-6" name="password" placeholder="Password" value="<?= $data['password']; ?>">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="input-group mb-3">
            <button class="btn btn-lg btn-warning w-100 fs-6 m-3" name="reg">Ubah Data</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
