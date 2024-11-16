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

$Nama = $_POST['Nama'];
$Alamat = $_POST['Alamat'];
$Telp = $_POST['Telpon'];

$insert = "INSERT INTO pelanggan VALUES ('','$Nama', '$Alamat', '$Telp')";
$insert_query = mysqli_query($koneksi,$insert);
if($insert_query){
    echo "Berhasi di input coy";
    header("Location: AdminDashboard.php");
}else {
    echo "Gagal di insert njir";
}
?>