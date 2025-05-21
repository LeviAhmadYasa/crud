<?php
include 'config.php';
$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM film WHERE id=$id"));

if (isset($_POST['edit'])) {
    $judul = $_POST['judul'];
    $tahun = $_POST['tahun'];
    $genre = $_POST['genre'];

    // Jika ganti poster
    if ($_FILES['poster']['name'] != '') {
        $poster = $_FILES['poster']['name'];
        $tmp = $_FILES['poster']['tmp_name'];
        move_uploaded_file($tmp, "poster/" . $poster);
        mysqli_query($koneksi, "UPDATE film SET judul='$judul', tahun_rilis='$tahun', poster='$poster', id_genre='$genre' WHERE id=$id");
    } else {
        mysqli_query($koneksi, "UPDATE film SET judul='$judul', tahun_rilis='$tahun', id_genre='$genre' WHERE id=$id");
    }
    header("Location: index.php");
}
?>
<form method="POST" enctype="multipart/form-data">
    Judul: <input type="text" name="judul" value="<?= $data['judul'] ?>"><br>
    Tahun Rilis: <input type="number" name="tahun" value="<?= $data['tahun_rilis'] ?>"><br>
    Ganti Poster: <input type="file" name="poster"><br>
    Genre:
    <select name="genre">
        <?php
        $g = mysqli_query($koneksi, "SELECT * FROM genre");
        while ($d = mysqli_fetch_array($g)) {
            $sel = $data['id_genre'] == $d['id'] ? 'selected' : '';
            echo "<option value='$d[id]' $sel>$d[nama]</option>";
        }
        ?>
    </select><br>
    <button name="edit">Simpan</button>
</form>