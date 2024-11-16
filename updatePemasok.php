<?php
include 'koneksi.php';
session_start();

$kodepemasok = $_POST['KodePemasok'];
$namapemasok = $_POST['namapemasok'];
$Alamat = $_POST['alamat'];
$notelp = $_POST['notelp']; 
$email = $_POST['email']; // Update this to match the form input name if needed

// Corrected SQL query
$sql = "UPDATE `pemasok` 
        SET `NamaPemasok`='$namapemasok', 
            `Alamat`='$Alamat', 
            `NoTelp`='$notelp', 
            `Email`='$email'
        WHERE `KodePemasok`='$kodepemasok'";

$result = mysqli_query($koneksi, $sql);
if ($result) {
    header("Location: AdminDashboard.php?message=success");
    exit();
} else {
    header("Location: editBarang.php?error=update_failed");
    exit();
}
?>
