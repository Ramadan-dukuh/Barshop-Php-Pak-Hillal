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

$kodepemasok = $_POST['kodepemasok'];
$namapemasok = $_POST['namapemasok'];
$alamat = $_POST['alamat'];
$notelp = $_POST['notelp'];
$email = $_POST['email'];

$insert = "INSERT INTO pemasok VALUES ($kodepemasok, '$namapemasok', '$alamat', '$notelp', '$email')";
$insert_query = mysqli_query($koneksi,$insert);
if($insert_query){
    echo "Berhasi di input coy";
    header("Location: AdminDashboard.php");
}else {
    echo "Gagal di insert njir";
    exit;
}
?>