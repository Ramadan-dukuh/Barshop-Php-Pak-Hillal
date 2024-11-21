<?php
include 'koneksi.php';
session_start();

$tangalPO = $_POST['TangalPO'];
$KodePemasok = $_POST['KodePemasok'];
$kodeBarang = $_POST['KodeBarang'];
$jumlah = $_POST['jumlah'];

$sql = "INSERT INTO belibarang VALUES ('','$tangalPO','$KodePemasok','$kodeBarang','$jumlah')";
$result = mysqli_query($koneksi,$sql );
if ($result) {
    // Reduce the item quantity in `barang` table
    $updateQtySql = "UPDATE barang SET `Qty/Jumlah` = `Qty/Jumlah` + '$jumlah' WHERE KodeBarang = '$kodeBarang'";

    if (mysqli_query($koneksi, $updateQtySql)) {
        echo "Order berhasil ditambahkan dan jumlah barang diperbarui!";
        header("Location: AdminDashboard.php"); // Redirect to dashboard after success
    }
}
?>