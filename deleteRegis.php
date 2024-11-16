<?php
include 'koneksi.php';
$KodePelanggan = $_GET ['KodePelanggan'];
$sql = "DELETE FROM pelanggan WHERE KodePelanggan = '$KodePelanggan' ";
$result = mysqli_query($koneksi,$sql);

if($result){
    echo "Delete data berhasil";
    header("Location: AdminDashboard.php");
}else {
    echo "Delete data gagal";
}
?>