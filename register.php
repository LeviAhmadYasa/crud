<?php
include 'config.php';
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    mysqli_query($koneksi, "INSERT INTO users (username, password) VALUES ('$username', '$password')");
    echo "Registrasi berhasil. <a href='login.php'>Login</a>";
}
?>
<form method="POST">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <button name="register">Register</button>
</form>