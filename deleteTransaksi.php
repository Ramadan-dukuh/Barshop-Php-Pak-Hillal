<?php
include 'koneksi.php';

$NomorOrder = $_GET['NomorOrder'];

// Ambil informasi KodeBarang dan Quantity sebelum data dihapus
$query = "SELECT KodeBarang, Quantity FROM transaksi WHERE NomorOrder = '$NomorOrder'";
$result = mysqli_query($koneksi, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $kodeBarang = $row['KodeBarang'];
    $quantity = $row['Quantity'];

    // Hapus data dari tabel transaksi
    $deleteSql = "DELETE FROM transaksi WHERE NomorOrder = '$NomorOrder'";
    if (mysqli_query($koneksi, $deleteSql)) {
        // Tambahkan jumlah barang kembali ke tabel barang
        $updateQtySql = "UPDATE barang SET `Qty/Jumlah` = `Qty/Jumlah` + '$quantity' WHERE KodeBarang = '$kodeBarang'";
        if (mysqli_query($koneksi, $updateQtySql)) {
            echo "Delete data berhasil dan jumlah barang telah dikembalikan.";
            header("Location: AdminDashboard.php");
            exit();
        } else {
            echo "Error mengembalikan jumlah barang: " . mysqli_error($koneksi);
        }
    } else {
        echo "Delete data gagal: " . mysqli_error($koneksi);
    }
} else {
    echo "Data transaksi tidak ditemukan atau error: " . mysqli_error($koneksi);
}

// Tutup koneksi
?>
