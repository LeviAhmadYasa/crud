<?php
include 'config.php';
if (isset($_POST['tambah'])) {
    $judul = $_POST['judul'];
    $tahun = $_POST['tahun'];
    $genre = $_POST['genre'];
    $poster = $_FILES['poster']['name'];
    $tmp = $_FILES['poster']['tmp_name'];
    move_uploaded_file($tmp, "poster/" . $poster);
    mysqli_query($koneksi, "INSERT INTO film (judul, tahun_rilis, poster, id_genre) VALUES ('$judul', '$tahun', '$poster', '$genre')");
    header("Location: index.php");
}
?>
<form method="POST" enctype="multipart/form-data">
    Judul: <input type="text" name="judul"><br>
    Tahun Rilis: <input type="number" name="tahun"><br>
    Poster: <input type="file" name="poster"><br>
    Genre:
    <select name="genre">
        <?php
        $g = mysqli_query($koneksi, "SELECT * FROM genre");
        while ($d = mysqli_fetch_array($g)) {
            echo "<option value='$d[id]'>$d[nama]</option>";
        }
        ?>
    </select><br>
    <button name="tambah">Tambah</button>
</form>