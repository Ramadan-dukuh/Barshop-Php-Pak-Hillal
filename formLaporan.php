<?php
session_start();
if ($_SESSION['user'] == "") {
    header("location:index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <title>Form Laporan Pesan</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f9;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      width: 100%;
      max-width: 600px;
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    label {
      margin-bottom: 5px;
      color: #555;
    }

    input, textarea {
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 14px;
    }

    textarea {
      resize: none;
      height: 100px;
    }

    button {
      padding: 10px 15px;
      border: none;
      background: #5cb85c;
      color: #fff;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
    }

    button:hover {
      background: #4cae4c;
    }

    .message-list {
      margin-top: 20px;
      border-top: 1px solid #ddd;
      padding-top: 20px;
    }

    .message {
      margin-bottom: 15px;
      padding: 10px;
      background: #f9f9f9;
      border: 1px solid #ddd;
      border-radius: 4px;
    }

    .message p {
      margin: 0;
      color: #555;
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
  <div class="container">
    <h2>Form Pesan Laporan</h2>
    <?php
    include 'koneksi.php';
    $kode = $_GET['KodeBarang'];
    $sql = "SELECT * FROM barang WHERE KodeBarang='$kode'";
    $result = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($result);
    ?>
    <form id="messageForm" action="addLaporan.php" method="post">
    <input type="hidden" name="KodeBarang" value="<?php echo $data['KodeBarang']; ?>">
      <label for="kodeBarang">Kode Barang</label>
      <span><?php echo $data['KodeBarang']; ?></span>
    
      <label for="">Nama Barang</label>
      <span><?php echo $data['NamaBarang']; ?></span>

      <label for="">Jumlah</label>
      <input type="number" placeholder="Masukan Jumlah" name="jumlah" required>

      <label for="pesan">Pesan</label>
      <textarea id="pesan" placeholder="Tuliskan pesan Anda" name="pesan" required ></textarea>

      <a class="btn-back" href="index.php" ">Kembali</a>
      <button type="submit">Kirim Pesan</button>
    </form>

  </div>
</body>
</html>
