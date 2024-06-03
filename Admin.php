<?php
include "headerAdmin.php";
global $db;
if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $sql = "DELETE FROM Admin WHERE id = $id";
    $hasil = $db->query($sql);

    if ($hasil) {
        echo "<script> alert('Hapus Data Sukses');
        document.location='Admin.php';</script>";
    } else {
        echo 'Gagal Menghapus Data';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container p-3 text-center">
    <div class="row">
        <div class="col">
            <h1>Data Admin</h1>
        </div>
    </div>
</div>
<hr>
<button type="button" class="m-3 btn-sm" style="color:white; background-color: green; border: green; border-radius: 5px"><a href="tambahDataadmin.php" style="color: white; text-decoration: none;">Tambah Data Admin</a></button>
<table class="table">
    <tr>
        <th scope="col">No</th>
        <th style="background-color: lightgray" scope="col">Nama</th>
        <th scope="col">Username</th>
        <th style="background-color: lightgray" scope="col">Password</th>
        <th scope="col">Aksi</th>
    </tr>
    <?php
    $sql = "SELECT * FROM Admin";
    $result = $db->query($sql);
    $no = 1;

    foreach ($result as $row) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td style="background-color: lightgray"><?php echo $row['nama']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td style="background-color: lightgray"><?php echo $row['password']; ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-info" style="color: white;">Edit</a>
                <form action="" method="post" style="display: inline;">
                    <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalHapus<?= $row['id']; ?>">Delete</a>
                </form>
            </td>
        </tr>

        <!-- Modal -->
        <div class="modal fade" id="ModalHapus<?php echo $row['id']; ?>" <?= $no ?> tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus Data Admin</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda Yakin Akan Menghapus Data Ini?
                        <br>
                        <?php $css = $row["username"]; ?>
                        Username: <a style="color:red"><?= $css ?></a>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form action="" method="post" style="display: inline;">
                            <input type="hidden" name="delete" value="<?= $row['id']; ?>">
                            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
    ?>

</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>