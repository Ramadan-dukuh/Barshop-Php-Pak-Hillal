<?php
include 'koneksi.php';
session_start();
if ($_SESSION['user'] == "") {
    header("location:index.php");
    exit();
}
if ($_SESSION['level'] != 'vendor' ) {
    header("location:AdminDashboard.php");
    exit();
}

$id = $_GET['id'];

$sql = "UPDATE `laporan` SET `status` = 'Confirm' WHERE `laporan`.`id` = $id";
$result = mysqli_query($koneksi, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Order</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        /* Styles are the same as before */
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

        form input[type="text"],
        form input[type="number"],
        select, input[type="date"] {
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
        select:focus {
            border-color: var(--primary-color);
            background-color: #ffffff;
            outline: none;
        }

        form input[type="submit"] {
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
        }

        form input[type="submit"]:hover {
            background-color: var(--primary-dark);
        }
        .btn-back{
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
    </style>
</head>
<body>
       
    <form action="addBeli.php" method="post">
        <h2>Tambah Barang | Barshop</h2>        

        <label for="TangalPO">Tangal PO:</label>
        <input type="date" id="TangalPO" name="TangalPO" required>

        <label for="KodePemasok">Kode Pemasok:</label>
        <select id="KodePemasok" name="KodePemasok" required>
            <option value="">Pilih Kode Pemasok</option>
            <?php
            include 'koneksi.php';
            $Query = "SELECT KodePemasok, NamaPemasok FROM pemasok";
            $Result = mysqli_query($koneksi, $Query);
            while ($pemasok = mysqli_fetch_assoc($Result)) {
                echo "<option value='" . $pemasok['KodePemasok'] . "'>" . $pemasok['NamaPemasok'] . "</option>";
            }
            ?>
        </select>

        <label for="KodeBarang">Kode Barang:</label>
        <select id="KodeBarang" name="KodeBarang" required>
            <option value="">Pilih Kode Barang</option>
            <?php
            include 'koneksi.php';
            $barangQuery = "SELECT KodeBarang, NamaBarang FROM barang";
            $barangResult = mysqli_query($koneksi, $barangQuery);
            while ($barang = mysqli_fetch_assoc($barangResult)) {
                echo "<option value='" . $barang['KodeBarang'] . "'>" . $barang['NamaBarang'] . "</option>";
            }
            ?>
        </select>


        <label for="jumlah">Jumlah:</label>
        <input type="number" id="jumlah" name="jumlah" min="1" required>

        <a class="btn-back" href="AdminDashboard.php" ">Kembali</a>
        <input type="submit" value="Beli">
    </form>
</body>
</html>
