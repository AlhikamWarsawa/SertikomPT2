<?php

include "koneksi.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $new_jenis = $_POST['jenis'];
    $new_harga = $_POST['harga'];
    $new_keterangan = $_POST['keterangan'];

    $sql = "UPDATE kamar SET jenis = ?, harga = ?, keterangan = ? WHERE id = ?";
    global $db;
    $stmt = $db->prepare($sql);
    $stmt->bind_param("sssi", $new_jenis, $new_harga, $new_keterangan, $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<script> alert('Ubah Data Sukses');
        document.location='Kamar.php';</script>";
    } else {
        echo 'Gagal mengupdate data.';
    }
} else {
    echo 'Data tidak lengkap.';
}
?>
