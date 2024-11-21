<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Order dan Pelanggan | Barshop</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4a98f7;
            --primary-dark: #3a7dd4;
            --secondary-color: #ffffff;
            --background-color: #f3f4f6;
            --text-color: #333333;
            --border-color: #e1e5eb;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: var(--background-color);
            color: var(--text-color);
            padding: 20px;
        }

        form {
            background-color: var(--secondary-color);
            padding: 20px;
            width: 100%;
            max-width: 600px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border: 1px solid var(--border-color);
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        form h2 {
            grid-column: span 2;
            margin-bottom: 10px;
            color: var(--primary-color);
            font-size: 20px;
            text-align: center;
            font-weight: 600;
        }

        form label {
            font-weight: 500;
            color: var(--text-color);
            font-size: 14px;
        }

        form input[type="text"],
        form input[type="number"],
        form input[type="date"],
        form select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 14px;
            background-color: #f9f9f9;
            transition: border-color 0.3s;
        }

        form input[type="text"]:focus,
        form input[type="number"]:focus,
        form input[type="date"]:focus,
        form select:focus {
            border-color: var(--primary-color);
            background-color: #ffffff;
            outline: none;
        }

        form input[type="submit"],
        .btn-back {
            grid-column: span 1;
            padding: 10px;
            background-color: var(--primary-color);
            color: var(--secondary-color);
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 10px;
            text-align: center;
            text-decoration: none;
        }

        form input[type="submit"]:hover,
        .btn-back:hover {
            background-color: var(--primary-dark);
        }

        .btn-back {
            display: inline-block;
            text-align: center;
        }
    </style>
</head>
<body>
    <form action="addTransaksi.php" method="post">
        <h2>Tambah Order dan Pelanggan</h2>

        <!-- Input Pelanggan -->
        <label for="Nama">Nama Lengkap:</label>
        <input type="text" id="Nama" name="Nama" placeholder="Nama Lengkap" required>

        <label for="Alamat">Alamat:</label>
        <input type="text" id="Alamat" name="Alamat" placeholder="Alamat Lengkap" required>

        <label for="Telpon">No Telepon:</label>
        <input type="text" id="Telpon" name="Telpon" placeholder="Nomor Telepon" required>

        <!-- Input Order -->
        <!-- <label for="KodePelanggan">Kode Pelanggan:</label>
        <select id="KodePelanggan" name="KodePelanggan" required>
            <option value="">Pilih Kode Pelanggan</option>
            <?php
            include 'koneksi.php';
            $pelangganQuery = "SELECT KodePelanggan, NamaPelanggan FROM pelanggan";
            $pelangganResult = mysqli_query($koneksi, $pelangganQuery);
            while ($pelanggan = mysqli_fetch_assoc($pelangganResult)) {
                echo "<option value='" . $pelanggan['KodePelanggan'] . "'>" . $pelanggan['NamaPelanggan'] . "</option>";
            }
            ?>
        </select> -->

        <label for="KodeBarang">Kode Barang:</label>
        <select id="KodeBarang" name="KodeBarang" required>
            <option value="">Pilih Kode Barang</option>
            <?php
            $barangQuery = "SELECT KodeBarang, NamaBarang FROM barang";
            $barangResult = mysqli_query($koneksi, $barangQuery);
            while ($barang = mysqli_fetch_assoc($barangResult)) {
                echo "<option value='" . $barang['KodeBarang'] . "'>" . $barang['NamaBarang'] . "</option>";
            }
            ?>
        </select>

        <label for="Quantity">Jumlah:</label>
        <input type="number" id="Quantity" name="Quantity" min="1" placeholder="Jumlah Barang" required>

        <a class="btn-back" href="index.php">Kembali</a>
        <input type="submit" value="Simpan">
    </form>
</body>
</html>
