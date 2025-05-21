<?php
include 'config.php';
session_start();

if (isset($_POST['login'])) {
    $u = $_POST['username'];
    $p = $_POST['password'];
    $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$u' AND password='$p'");
    if (mysqli_num_rows($cek) > 0) {
        $_SESSION['login'] = true;
        header("Location: index.php");
    } else {
        echo "Login gagal!";
    }
}
?>
<form method="POST">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <button name="login">Login</button>
</form>