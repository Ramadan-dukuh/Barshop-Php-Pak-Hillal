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

// Ensure the user is logged in and has the correct permission level


// Get form data
$kodePelanggan = $_POST['KodePelanggan'];
$kodeBarang = $_POST['KodeBarang'];
$quantity = $_POST['Quantity']; // Assume this is the ordered quantity

// Prepare the SQL INSERT query
$sql = "INSERT INTO transaksi
        VALUES (0,NOW(), '$kodePelanggan',  '$kodeBarang', '$quantity')";

// Execute the order insertion and then reduce the item quantity
if (mysqli_query($koneksi, $sql)) {
    // Reduce the item quantity in `barang` table
    $updateQtySql = "UPDATE barang SET `Qty/Jumlah` = `Qty/Jumlah` - '$quantity' WHERE KodeBarang = '$kodeBarang'";

    if (mysqli_query($koneksi, $updateQtySql)) {
        echo "Order berhasil ditambahkan dan jumlah barang diperbarui!";
        header("Location: AdminDashboard.php"); // Redirect to dashboard after success
    } else {
        echo "Error updating quantity: " . mysqli_error($koneksi);
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

// Close the database connection
?>
