<?php
include 'config.php';
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM genre WHERE id=$id");
header("Location: genre.php");
