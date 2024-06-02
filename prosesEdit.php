<?php

include "koneksi.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $new_name = $_POST['nama'];
    $new_username = $_POST['username'];
    $new_password = $_POST['password'];

    $sql = "UPDATE admin SET nama = ?, username = ?, password = ? WHERE id = ?";
    global $db;
    $stmt = $db->prepare($sql);
    $stmt->bind_param("sssi", $new_name, $new_username, $new_password, $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<script> alert('Ubah Data Sukses');
        document.location='Admin.php';</script>";
    } else {
        echo 'Gagal mengupdate data.';
    }
} else {
    echo 'Data tidak lengkap.';
}
?>
