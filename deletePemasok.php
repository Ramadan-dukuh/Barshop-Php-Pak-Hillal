<?php
include 'koneksi.php';
$KodePemasok = $_GET ['KodePemasok'];
$sql = "DELETE FROM pemasok WHERE KodePemasok = '$KodePemasok' ";
$result = mysqli_query($koneksi,$sql);

if($result){
    echo "Delete data berhasil";
    header("Location: AdminDashboard.php");
}else {
    echo "Delete data gagal";
}
?>