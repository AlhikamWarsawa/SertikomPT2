<?php
include "headerAdmin.php";
global $db;

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
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
