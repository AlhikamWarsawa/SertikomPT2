<?php
include "koneksi.php";
session_start();

$login_message = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    global $db;
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $_SESSION["username"] = $data["username"];
        header("location: Admin.php");
        exit;
    } else {
        $login_message = "Akun Tidak Ditemukan";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-signin-client_id" content="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
<div class="container" id="container">
    <div class="form-container sign-in">
        <form method="post">
            <h1>Login Account</h1>
            <div class="social-icons">
                <button class="gsi-material-button">
                    <div class="gsi-material-button-state"></div>
                    <div class="gsi-material-button-content-wrapper">
                        <div class="gsi-material-button-icon">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" xmlns:xlink="http://www.w3.org/1999/xlink" style="display: block;">
                                <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path>
                                <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path>
                                <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path>
                                <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path>
                                <path fill="none" d="M0 0h48v48H0z"></path>
                            </svg>
                        </div>
                        <span class="gsi-material-button-contents">Sign up with Google</span>
                        <span style="display: none;">Sign In With Google</span>
                    </div>
                </button>
            </div>
            <span>Or Use Your Email Password</span>
            <div class="input-container">
                <i class="fa-solid fa-user"></i>
                <input type="text" placeholder="Username" name="username">
                <i class="fa-solid fa-lock"></i>
                <input type="password" placeholder="Password" name="password" id="password">
                <i class="fa-solid fa-eye" id="togglePassword"></i>
            </div>

            <a href="https://www.youtube.com/watch?v=xvFZjo5PgG0&pp=ygUebmV2ZXIgZ29ubmEgZ2l2ZSB5b3UgdXAgbm8gYWRz"
               target="_blank">Forget Your Password?</a>
            <button name="login">Login</button>
        </form>
    </div>
    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-right">
                <h1>Welcome To Expro Hotel</h1>
                <p>    Please log in to access your account</p>
            </div>
        </div>
    </div>
</div>
<script src="script.js"></script>
</body>
</html>

