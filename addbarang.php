<?php
include 'koneksi.php';
session_start();
if ($_SESSION['user'] == "") {
    header("location:index.php");
    exit();
}
if ($_SESSION['level'] != 'admin' && $_SESSION['level'] == 'owner') {
    header("location:AdminDashboard.php");
    exit();
}

$kodeBarang = $_POST['KodeBarang'];
$namaBarang = $_POST['NamaBarang'];
$jenisBarang = $_POST['JenisBarang'];
$satuan = $_POST['Satuan'];
$hargaBeli = $_POST['HargaBeli'];
$totalHarga = $_POST['TotalHarga'];
$jumlah = $_POST['Jumlah'];

$insert = "INSERT INTO barang VALUES ('$kodeBarang', '$namaBarang', '$jenisBarang', '$satuan', '$hargaBeli', '$totalHarga', '$jumlah')";
$insert_query = mysqli_query($koneksi,$insert);
if($insert_query){
    echo "Berhasi di input coy";
    header("Location: AdminDashboard.php");
}else {
    echo "Gagal di insert njir";
}
?>