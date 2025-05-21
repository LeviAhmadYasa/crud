<?php
include 'config.php';
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
?>

<a href="tambah_film.php">Tambah Film</a> | <a href="genre.php">Kelola Genre</a> | <a href="logout.php">Logout</a>
<h3>Data Film</h3>
<table border="1" cellpadding="5">
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Tahun</th>
        <th>Poster</th>
        <th>Genre</th>
        <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    $data = mysqli_query($koneksi, "SELECT film.*, genre.nama as genre FROM film JOIN genre ON film.id_genre=genre.id");
    while ($d = mysqli_fetch_array($data)) {
        echo "<tr>
            <td>$no</td>
            <td>$d[judul]</td>
            <td>$d[tahun_rilis]</td>
            <td><img src='poster/$d[poster]' width='70'></td>
            <td>$d[genre]</td>
            <td><a href='edit_film.php?id=$d[id]'>Edit</a> | <a href='hapus_film.php?id=$d[id]'>Hapus</a></td>
        </tr>";
        $no++;
    }
    ?>
</table>