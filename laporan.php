<?php

include "koneksi.php";

$nama = $_POST['nama'];
$id_penerima = $_POST['id_penerima'];
$judul = $_POST['judul'];
$pesan = $_POST['pesan'];

$sql = "INSERT INTO laporan (nama, id_penerima, judul, pesan) VALUES ('$nama', '$id_penerima', '$judul', '$pesan')";

if (mysqli_query($koneksi, $sql)) {
    header("Location: AdminDashboard.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}
?>