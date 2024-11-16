<?php
session_start();
if ($_SESSION['user'] == "") {
    header("location:index.php");
    exit();
}
if ($_SESSION['level'] != 'admin' && $_SESSION['level'] != 'owner') {
    header("location:AdminDashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        }

        form {
            background-color: var(--secondary-color);
            padding: 20px;
            width: 100%;
            max-width: 600px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border: 1px solid var(--border-color);
            transition: transform 0.3s ease;
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

        form span {
            display: inline-block;
            padding: 8px;
            background-color: #f9f9f9;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 14px;
            width: 100%;
            box-sizing: border-box;
        }

        form input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 14px;
            background-color: #f9f9f9;
            transition: border-color 0.3s;
        }

        form input:focus, select:focus {
            border-color: var(--primary-color);
            background-color: #ffffff;
            outline: none;
        }

        form input[type="submit"] {
            grid-column: span 2;
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
        }

        form input[type="submit"]:hover {
            background-color: var(--primary-dark);
        }
    </style>
    <title>Edit Transaksi | Barshop</title>
</head>
<body>
    <form action="updateTransaksi.php" method="POST">
        <h2>Edit Transaksi</h2>
        <?php
        include 'koneksi.php';
        $kode = $_GET['NomorOrder'];
        $sql = "SELECT * FROM transaksi WHERE NomorOrder='$kode'";
        $result = mysqli_query($koneksi, $sql);

        if (!$result) {
            die("Query failed: " . mysqli_error($koneksi));
        }

        $data = mysqli_fetch_array($result);

        if (!$data) {
            echo "<p>Data not found. Please go back and try again.</p>";
            exit();
        }
        ?>
        
        <input type="hidden" name="NomorOrder" value="<?php echo $data['NomorOrder']; ?>">

        <label for="NomorOrder">Nomor Order:</label>
        <span><?php echo htmlspecialchars($data['NomorOrder']); ?></span>

        <label for="KodePelanggan">Kode Pelanggan:</label>
        <select id="KodePelanggan" name="KodePelanggan" required>
            <option value="">Pilih Kode Pelanggan</option>
            <?php
            $pelangganQuery = "SELECT KodePelanggan, NamaPelanggan FROM pelanggan";
            $pelangganResult = mysqli_query($koneksi, $pelangganQuery);
            while ($pelanggan = mysqli_fetch_assoc($pelangganResult)) {
                $selected = $pelanggan['KodePelanggan'] == $data['KodePelanggan'] ? 'selected' : '';
                echo "<option value='" . $pelanggan['KodePelanggan'] . "' $selected>" . $pelanggan['NamaPelanggan'] . "</option>";
            }
            ?>
        </select>

        <label for="KodePemasok">Kode Pemasok:</label>
        <select id="KodePemasok" name="KodePemasok" required>
            <option value="">Pilih Kode Pemasok</option>
            <?php
            $pemasokQuery = "SELECT KodePemasok, NamaPemasok FROM pemasok";
            $pemasokResult = mysqli_query($koneksi, $pemasokQuery);
            while ($pemasok = mysqli_fetch_assoc($pemasokResult)) {
                $selected = $pemasok['KodePemasok'] == $data['KodePemasok'] ? 'selected' : '';
                echo "<option value='" . $pemasok['KodePemasok'] . "' $selected>" . $pemasok['NamaPemasok'] . "</option>";
            }
            ?>
        </select>

        <label for="NomorPO">Nomor PO:</label>
        <input type="number" id="NomorPO" name="NomorPO" value="<?php echo $data['NomorPO']; ?>" min="1" required>

        <label for="TanggalPO">Tanggal PO:</label>
        <input type="date" id="TanggalPO" name="TanggalPO" value="<?php echo $data['TanggalPO']; ?>" required>

        <label for="KodeBarang">Kode Barang:</label>
        <select id="KodeBarang" name="KodeBarang" required>
            <option value="">Pilih Kode Barang</option>
            <?php
            $barangQuery = "SELECT KodeBarang, NamaBarang FROM barang";
            $barangResult = mysqli_query($koneksi, $barangQuery);
            while ($barang = mysqli_fetch_assoc($barangResult)) {
                $selected = $barang['KodeBarang'] == $data['KodeBarang'] ? 'selected' : '';
                echo "<option value='" . $barang['KodeBarang'] . "' $selected>" . $barang['NamaBarang'] . "</option>";
            }
            ?>
        </select>

        <label for="Quantity">Jumlah:</label>
        <input type="number" id="Quantity" name="Quantity" value="<?php echo $data['quantity']; ?>" min="1" required>

        <input type="submit" value="Ubah">
    </form>
</body>
</html>
