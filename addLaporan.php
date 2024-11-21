<?php
include 'koneksi.php';
session_start();

$kodeBarang = $_POST['KodeBarang'];
$jumlah = $_POST['jumlah'];
$pesan = $_POST['pesan'];

$sql = "INSERT INTO laporan VALUES ('','$kodeBarang','$jumlah','$pesan','Pending',NOW())";
$result = mysqli_query($koneksi,$sql );
if($result){
    header("Location: AdminDashboard.php");
}
?>