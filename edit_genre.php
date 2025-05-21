<?php
include 'config.php';
$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM genre WHERE id=$id"));

if (isset($_POST['edit'])) {
    $nama = $_POST['nama'];
    mysqli_query($koneksi, "UPDATE genre SET nama='$nama' WHERE id=$id");
    header("Location: genre.php");
}
?>
<form method="POST">
    Nama Genre: <input type="text" name="nama" value="<?= $data['nama'] ?>"><br>
    <button name="edit">Simpan</button>
</form>