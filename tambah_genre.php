<?php
include 'config.php';
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    mysqli_query($koneksi, "INSERT INTO genre (nama) VALUES ('$nama')");
    header("Location: genre.php");
}
?>
<form method="POST">
    Nama Genre: <input type="text" name="nama"><br>
    <button name="tambah">Tambah</button>
</form>