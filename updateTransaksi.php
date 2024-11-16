<?php
include 'koneksi.php';
session_start();

// Pastikan user yang login memiliki akses admin atau owner
if (!isset($_SESSION['user']) || ($_SESSION['level'] != 'admin' && $_SESSION['level'] != 'owner')) {
    header("location:index.php");
    exit();
}

// Ambil data dari formulir
$NomorOrder = $_POST['NomorOrder'];
$TanggalOrder = $_POST['TanggalOrder'];
$KodePelanggan = $_POST['KodePelanggan'];
$KodePemasok = $_POST['KodePemasok'];
$NomorPO = $_POST['NomorPO'];
$TanggalPO = $_POST['TanggalPO'];
$KodeBarangBaru = $_POST['KodeBarang'];
$QuantityBaru = $_POST['Quantity'];

// Ambil informasi transaksi lama
$queryLama = "SELECT KodeBarang, quantity FROM transaksi WHERE NomorOrder = '$NomorOrder'";
$resultLama = mysqli_query($koneksi, $queryLama);

if ($resultLama && mysqli_num_rows($resultLama) > 0) {
    $dataLama = mysqli_fetch_assoc($resultLama);
    $KodeBarangLama = $dataLama['KodeBarang'];
    $QuantityLama = $dataLama['quantity'];

    // Periksa apakah KodeBarang berubah
    if ($KodeBarangLama != $KodeBarangBaru) {
        // Jika KodeBarang berubah, kembalikan stok barang lama
        $updateBarangLama = "UPDATE barang SET `Qty/Jumlah` = `Qty/Jumlah` + '$QuantityLama' WHERE KodeBarang = '$KodeBarangLama'";
        mysqli_query($koneksi, $updateBarangLama);

        // Kurangi stok barang baru
        $updateBarangBaru = "UPDATE barang SET `Qty/Jumlah` = `Qty/Jumlah` - '$QuantityBaru' WHERE KodeBarang = '$KodeBarangBaru'";
        mysqli_query($koneksi, $updateBarangBaru);
    } else {
        // Jika KodeBarang sama, hitung selisih quantity
        $selisih = $QuantityBaru - $QuantityLama;
        if ($selisih > 0) {
            // Jika quantity bertambah, kurangi stok barang
            $updateBarang = "UPDATE barang SET `Qty/Jumlah` = `Qty/Jumlah` - '$selisih' WHERE KodeBarang = '$KodeBarangLama'";
        } else {
            // Jika quantity berkurang, tambahkan stok barang
            $selisih = abs($selisih); // Ubah selisih jadi positif
            $updateBarang = "UPDATE barang SET `Qty/Jumlah` = `Qty/Jumlah` + '$selisih' WHERE KodeBarang = '$KodeBarangLama'";
        }
        mysqli_query($koneksi, $updateBarang);
    }

    // Update data transaksi
    $sql = "UPDATE transaksi 
            SET 
                TanggalOrder = '$TanggalOrder',
                KodePelanggan = '$KodePelanggan',
                KodePemasok = '$KodePemasok',
                NomorPO = '$NomorPO',
                TanggalPO = '$TanggalPO',
                KodeBarang = '$KodeBarangBaru',
                quantity = '$QuantityBaru'
            WHERE NomorOrder = '$NomorOrder'";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: AdminDashboard.php?message=update_success");
        exit();
    } else {
        echo "Gagal mengupdate transaksi: " . mysqli_error($koneksi);
    }
} else {
    echo "Data transaksi tidak ditemukan.";
}
?>
