<?php
include "koneksi.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}

if ($_SESSION['username'] == null) {
    header("location: login.php");
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
        <a class="navbar-brand" href="beranda.php">Expro</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            </ul>
            <form class="d-flex" role="search" method="post" action="beranda.php">
                <button class="btn btn-outline-success me-3 mt-3" type="submit" formmethod="post">Beranda</button>
            </form>
            <form class="d-flex" role="search" method="post" action="login.php">
                <button class="btn btn-outline-success mt-3" type="submit" name="logout" formmethod="post">Login</button>
            </form>
        </div>
    </div>
</nav>
</body>
</html>
