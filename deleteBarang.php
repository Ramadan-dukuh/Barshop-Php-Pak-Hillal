<?php
include 'koneksi.php';
$KodeBarang = $_GET ['KodeBarang'];
$sql = "DELETE FROM barang WHERE KodeBarang = '$KodeBarang' ";
$result = mysqli_query($koneksi,$sql);

if($result){
    echo "Delete data berhasil";
    header("Location: AdminDashboard.php");
}else {
    echo "Delete data gagal";
}
?>