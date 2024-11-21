<?php
include 'koneksi.php';
session_start();

// Cek sesi dan level akses pengguna
if ($_SESSION['user'] == "") {
    header("location:index.php");
    exit();
}
if ($_SESSION['level'] != 'admin' && $_SESSION['level'] == 'owner') {
    header("location:AdminDashboard.php");
    exit();
}

// Ambil data dari form
$Nama = $_POST['Nama'] ?? null;
$Alamat = $_POST['Alamat'] ?? null;
$Telp = $_POST['Telpon'] ?? null;
$kodeBarang = $_POST['KodeBarang'] ?? null;
$quantity = $_POST['Quantity'] ?? null;

// Validasi input
if (!$Nama || !$Alamat || !$Telp || !$kodeBarang || !$quantity) {
    die("Semua field harus diisi!");
}

// Mulai transaksi database
mysqli_begin_transaction($koneksi);

try {
    // Tambahkan pelanggan baru
    $insertPelanggan = "INSERT INTO pelanggan (NamaPelanggan, AlamatPelanggan, NoTelpPelanggan) VALUES ('$Nama', '$Alamat', '$Telp')";
    if (!mysqli_query($koneksi, $insertPelanggan)) {
        throw new Exception("Gagal menambahkan pelanggan: " . mysqli_error($koneksi));
    }

    // Ambil KodePelanggan yang baru ditambahkan
    $kodePelanggan = mysqli_insert_id($koneksi);

    // Tambahkan transaksi
    $insertTransaksi = "INSERT INTO transaksi (TanggalOrder, KodePelanggan, KodeBarang, Quantity) VALUES (NOW(), '$kodePelanggan', '$kodeBarang', '$quantity')";
    if (!mysqli_query($koneksi, $insertTransaksi)) {
        throw new Exception("Gagal menambahkan transaksi: " . mysqli_error($koneksi));
    }

    // Kurangi jumlah barang
    $updateBarang = "UPDATE barang SET `Qty/Jumlah` = `Qty/Jumlah` - '$quantity' WHERE KodeBarang = '$kodeBarang'";
    if (!mysqli_query($koneksi, $updateBarang)) {
        throw new Exception("Gagal mengurangi jumlah barang: " . mysqli_error($koneksi));
    }

    // Commit transaksi jika semua berhasil
    mysqli_commit($koneksi);
    echo "Pelanggan dan transaksi berhasil ditambahkan!";
    header("Location: AdminDashboard.php");
} catch (Exception $e) {
    // Rollback transaksi jika ada kesalahan
    mysqli_rollback($koneksi);
    echo "Terjadi kesalahan: " . $e->getMessage();
}

// Tutup koneksi database
mysqli_close($koneksi);
?>
