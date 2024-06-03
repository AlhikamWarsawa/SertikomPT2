<?php
include "koneksi.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['logoutt'])) {
    session_destroy();
    header('Location: beranda.php');
    exit;
}

if ($_SESSION['username'] == null){
    header ('location: beranda.php');
    exit();
}
?>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-header">
    <div class="container-fluid">
        <a class="navbar-brand">Expro</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="Admin.php">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="Kamar.php">Kamar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="formPenyewaan.php">Penyewaan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="List.php">List</a>
                </li>
            </ul>
            <form class="d-flex" role="search" method="post" action="beranda.php">
                <p class="m-3">Selamat Datang <?= $_SESSION["username"]; ?></p>
                <button class="btn btn-outline-success" type="submit" name="logoutt" formmethod="post">Logout</button>
            </form>
        </div>
    </div>
</nav>
</body>
</html>
