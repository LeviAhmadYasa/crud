<?php
include 'config.php';
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
?>

<a href="index.php">Kembali ke Film</a> | <a href="tambah_genre.php">Tambah Genre</a>
<h3>Data Genre</h3>
<table border="1" cellpadding="5">
    <tr>
        <th>No</th>
        <th>Nama Genre</th>
        <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    $data = mysqli_query($koneksi, "SELECT * FROM genre");
    while ($d = mysqli_fetch_array($data)) {
        echo "<tr>
            <td>$no</td>
            <td>$d[nama]</td>
            <td>
                <a href='edit_genre.php?id=$d[id]'>Edit</a> | 
                <a href='hapus_genre.php?id=$d[id]'>Hapus</a>
            </td>
        </tr>";
        $no++;
    }
    ?>
</table>