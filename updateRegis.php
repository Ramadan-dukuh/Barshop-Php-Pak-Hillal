<?php
include 'koneksi.php';
session_start();

$kodePelanggan = $_POST['KodePelanggan'];
$Nama = $_POST['Nama'];
$Alamat = $_POST['Alamat'];
$telp = $_POST['Telpon'];

// Query SQL yang benar
$sql = "UPDATE pelanggan 
        SET NamaPelanggan='$Nama', 
            AlamatPelanggan='$Alamat', 
            NoTelpPelanggan='$telp' 
        WHERE KodePelanggan='$kodePelanggan'";

$result = mysqli_query($koneksi, $sql);

if ($result) {
    header("Location: AdminDashboard.php?message=success");
    exit();
} else {
    // Tambahkan debugging untuk melihat kesalahan
    header("Location: editRegis.php?error=update_failed&details=" . mysqli_error($koneksi));
    exit();
}
?>
