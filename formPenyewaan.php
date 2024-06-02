<?php
include "headerAdmin.php";
global $db;

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $no_identitas = $_POST['no_identitas'];
    $no_hp = $_POST['no_hp'];
    $id_kamar = $_POST['id_kamar'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $jumlah_kamar = $_POST['jumlah_kamar'];

    // Ambil harga kamar dari tabel kamar berdasarkan id kamar yang dipilih
    $sql_get_price = "SELECT harga FROM kamar WHERE id = $id_kamar";
    $result_price = $db->query($sql_get_price);
    $row_price = $result_price->fetch_assoc();
    $harga_per_malam = $row_price['harga'];

    $total = $harga_per_malam * $jumlah_kamar;

    $sql = "INSERT INTO penyewa (id_kamar, nama, no_identitas, no_hp, checkin, checkout, jumlah, Total) 
            VALUES ('$id_kamar', '$nama', '$no_identitas', '$no_hp', '$checkin', '$checkout', '$jumlah_kamar', '$total')";

    if ($db->query($sql)) {
        echo "<script> alert('Berhasil Menyimpan Transaksi');
        document.location='List.php';</script>";
        exit();
    } else {
        echo "Gagal menyimpan transaksi.";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penyewaan Kamar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container p-3 text-left">
    <div class="row">
        <div class="col">
            <h1>Penyewaan Kamar</h1>
        </div>
    </div>
    <form method="post">
        <div class="form-floating mb-3">
            <input type="text" class="form-control form-control-lg bg-light fs-6" name="nama" placeholder="Nama Lengkap">
            <label for="nama">Nama Lengkap</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control form-control-lg bg-light fs-6" name="no_identitas" placeholder="No Identitas">
            <label for="no_identitas">No Identitas</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control form-control-lg bg-light fs-6" name="no_hp" placeholder="No Handphone">
            <label for="no_hp">No Handphone</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select form-select-lg bg-light fs-6" name="id_kamar" aria-label="Jenis Kamar">
                <option selected disabled>Pilih Jenis Kamar</option>
                <?php
                $sql_kamar = "SELECT * FROM kamar";
                $result_kamar = $db->query($sql_kamar);
                while ($row_kamar = $result_kamar->fetch_assoc()) {
                    echo "<option value='" . $row_kamar['id'] . "'>" . $row_kamar['jenis'] . "</option>";
                }
                ?>
            </select>
            <label for="id_kamar">Jenis Kamar</label>
        </div>
        <div class="form-floating mb-3">
            <input type="date" class="form-control form-control-lg bg-light fs-6" name="checkin" placeholder="Check-in">
            <label for="checkin">Check-in</label>
        </div>
        <div class="form-floating mb-3">
            <input type="date" class="form-control form-control-lg bg-light fs-6" name="checkout" placeholder="Check-out">
            <label for="checkout">Check-out</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control form-control-lg bg-light fs-6" name="jumlah_kamar" placeholder="Jumlah Kamar">
            <label for="jumlah_kamar">Jumlah Kamar</label>
        </div>
        <div class="input-group mb-3">
            <button class="btn btn-lg btn-warning w-100 fs-6 m-3" name="submit">Simpan Transaksi</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
