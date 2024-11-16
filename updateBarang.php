<?php
include 'koneksi.php';
session_start();

    $kodeBarang = $_POST['KodeBarang'];
    $namaBarang = $_POST['NamaBarang'];
    $jenisBarang = $_POST['JenisBarang'];
    $satuan = $_POST['Satuan'];
    $hargaBeli = $_POST['HargaBeli'];
    $totalHarga = $_POST['TotalHarga'];
    $qtyJumlah = $_POST['Jumlah']; // Update this to match the form input name if needed

    // Corrected SQL query with proper column name for QtyJumlah
    $sql = "UPDATE `barang` 
    SET `NamaBarang`='$namaBarang', 
        `JenisBarang`='$jenisBarang', 
        `Satuan`='$satuan', 
        `HargaBeli`='$hargaBeli', 
        `TotalHarga`='$totalHarga', 
        `Qty/Jumlah`='$qtyJumlah' 
    WHERE `KodeBarang`='$kodeBarang'";


    $result = mysqli_query($koneksi, $sql);
    if ($result) {
        header("Location: AdminDashboard.php?message=success");
        exit();
    } else {
        header("Location: editBarang.php?error=update_failed");
        exit();
    }

?>
