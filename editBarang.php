<?php
session_start();
if ($_SESSION['user'] == "") {
    header("location:index.php");
    exit();
}
if ($_SESSION['level'] != 'admin' && $_SESSION['level'] != 'owner'  &&  $_SESSION['level'] != 'vendor') {
    header("location:AdminDashboard.php");
    exit();
}
?>
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

        form input[type="text"],
        form input[type="number"],
        form input[type="email"] {
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
        form input[type="email"]:focus {
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
    <title>Barang | Barshop</title>
</head>
<body>
<form action="updateBarang.php" method="post">
    <h2>Edit Barang</h2>
    <?php
    include 'koneksi.php';
    $kode = $_GET['KodeBarang'];
    $sql = "SELECT * FROM barang WHERE KodeBarang='$kode'";
    $result = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($result);
    ?>
    
    <!-- Hidden input for KodeBarang -->
    <input type="hidden" name="KodeBarang" value="<?php echo $data['KodeBarang']; ?>">
    <input type="hidden" name="Jumlah" value="<?php echo $data['Qty/Jumlah']; ?>">

    <label for="KodeBarang">Kode Barang:</label>
    <span><?php echo $data['KodeBarang']; ?></span>
    
    <label for="NamaBarang">Nama Barang:</label>
    <input type="text" id="NamaBarang" name="NamaBarang" value="<?php echo $data['NamaBarang']; ?>" required>

    <label for="JenisBarang">Jenis Barang:</label>
    <input type="text" id="JenisBarang" name="JenisBarang" value="<?php echo $data['JenisBarang']; ?>" required>

    <label for="Satuan">Satuan:</label>
    <input type="text" id="Satuan" name="Satuan" value="<?php echo $data['Satuan']; ?>" required>

    <label for="HargaBeli">Harga Beli:</label>
    <input type="number" id="HargaBeli" name="HargaBeli" value="<?php echo $data['HargaBeli']; ?>" min="1" required>

    <label for="TotalHarga">Harga Jual:</label>
    <input type="number" id="TotalHarga" name="TotalHarga" value="<?php echo $data['TotalHarga']; ?>" min="1" required>

    <label for="Jumlah">Jumlah:</label> 
    <span><?php echo $data['Qty/Jumlah']; ?></span>

    <!-- Update button text -->
    <a class="btn-back" href="index.php" ">Kembali</a>
    <input type="submit" value="Ubah">
</form>

</body>
</html>