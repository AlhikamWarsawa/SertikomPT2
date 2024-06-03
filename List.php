<?php
include "headerAdmin.php";
global $db;

if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $sql = "DELETE FROM kamar WHERE id = $id";
    $hasil = $db->query($sql);
}

$sql = "SELECT penyewa.*, kamar.jenis, 
               DATEDIFF(penyewa.checkout, penyewa.checkin) AS jumlah_hari, 
               penyewa.jumlah * DATEDIFF(penyewa.checkout, penyewa.checkin) * kamar.harga AS total_harga
        FROM penyewa 
        INNER JOIN kamar ON penyewa.id_kamar = kamar.id";
$result = $db->query($sql);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Penyewaan Kamar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container p-3 text-center">
    <div class="row">
        <div class="col">
            <h1>Data Penyewaan Kamar</h1>
        </div>
    </div>
    <hr>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">No Identitas</th>
            <th scope="col">No HP</th>
            <th scope="col">Jenis Kamar</th>
            <th scope="col">Check-in</th>
            <th scope="col">Check-out</th>
            <th scope="col">Jumlah Kamar</th>
            <th scope="col">Total</th>
            <th scope="col">Ban</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        foreach ($result as $row) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['no_identitas']; ?></td>
                <td><?php echo $row['no_hp']; ?></td>
                <td><?php echo $row['jenis']; ?></td>
                <td><?php echo $row['checkin']; ?></td>
                <td><?php echo $row['checkout']; ?></td>
                <td><?php echo $row['jumlah']; ?></td>
                <td><?php echo "Rp " . number_format($row['total_harga'], 0, ',', '.'); ?></td>
                <td>
                    <form action="" method="post" style="display: inline;">
                        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalHapus<?= $row['id_kamar']; ?>">BAN</a>
                    </form>
                </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="ModalHapus<?php echo $row['id_kamar']; ?>" <?= $no ?> tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus Data Penyewa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda Yakin Akan Menghapus Data Ini?
                            <br>
                            <?php $css = $row["nama"]; ?>
                            Username: <a style="color:red"><?= $css ?></a>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="" method="post" style="display: inline;">
                                <input type="hidden" name="delete" value="<?= $row['id_kamar']; ?>">
                                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
            ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
