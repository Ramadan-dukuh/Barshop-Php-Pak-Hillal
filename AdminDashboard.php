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
    <link rel="stylesheet" href="AdminDB.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

:root {
    --primary-color: #4a98f7;
    --secondary-color: #ffffff;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}


/* Navbar */
.nav {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 15px 200px;
    background: var(--primary-color);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 1000;
}

.nav a {
    color: var(--secondary-color);
    text-decoration: none;
}

.nav li:hover {
    transition: all 0.2s ease-in-out;
    font-weight: 700;
    text-shadow: 0 0 8px var(--secondary-color);
}

.nav .logo {
    font-size: 22px;
    font-weight: 500;
}

.nav .nav-links {
    list-style: none;
    display: flex;
    gap: 20px;
}

.nav .nav-links a {
    transition: all 0.2s linear;
}

.navOpenBtn, .navCloseBtn {
    display: none;
}

/* Responsive Navigation */
@media screen and (max-width: 768px) {
    .navOpenBtn, .navCloseBtn {
        display: block;
        color: #fff;
        font-size: 20px;
        cursor: pointer;
    }
    .nav .nav-links {
        position: fixed;
        top: 0;
        left: -100%;
        height: 100%;
        width: 280px;
        background-color: #11101d;
        flex-direction: column;
        padding-top: 100px;
        gap: 30px;
        transition: 0.4s ease;
    }
    .nav.openNav .nav-links {
        left: 0;
    }
}
.title{
    text-align: center;
    margin-top: 80px;
}

/* Sections */
section {
    margin-top: 80px;
    padding: 20px;    
}

/* Pesanan Section */
.pesanan h1,
.pelanggan h1,
.inventory h1,
.pemasok h1 {
    font-size: 24px;
    color: #333;
    margin-bottom: 10px;
}

.btn-add{
    color: var(--primary-color);
    text-decoration: none;
    padding: 5px;
}
.btn-add a:hover{
    transition: all 0.2s ease-in-out;
    font-weight: 700;
    text-shadow: 0 0 8px var(--secondary-color);
}

.card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 10px;
        }
        .card {
            width: calc(100% / 3 - 20px);
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }       
        .card h3 {
            margin: 0 0 10px;
            font-size: 18px;
            color: #333;
        }
        .card p {
            margin: 8px 0;
            font-size: 14px;
            color: #555;
        }
        .card .actions a {
            margin-right: 10px;
            text-decoration: none;
            color: #007bff;
        }
        .card .actions a:hover {
            transition: all 0.2s ease-in-out;
    font-weight: 700;
    text-shadow: 0 0 8px var(--primary-color);
    color: var(--primary-color);
        }
    

/* Pelanggan Section */
.pelanggan table,
.inventory table,
.pemasok table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
    box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
}

.pelanggan th,
.inventory th,
.pemasok th {
    background-color: #f2f2f2;
    padding: 10px;
    border: 1px solid #ddd;
    color: black; /* Ensure header text is always black */
}

.pelanggan td,
.inventory td,
.pemasok td {
    padding: 10px;
    border: 1px solid #ddd;
}

/* Apply alternating row color */
.pelanggan tr:nth-child(even),
.inventory tr:nth-child(even),
.pemasok tr:nth-child(even) {
    background-color: #f9f9f9;
}

/* Row hover effect, affecting only table cells */
.pelanggan tr:hover td,
.inventory tr:hover td,
.pemasok tr:hover td {
    background-color: var(--primary-color);  
    color: var(--secondary-color);
}

/* Style links and link hover effect */
.actions a {
    color: var(--primary-color); /* Ensure links have primary color */
    text-decoration: none;
    padding: 5px;
}

.actions a:hover {
    transition: all 0.2s ease-in-out;
    font-weight: 700;
    text-shadow: 0 0 8px var(--secondary-color);
    color: var(--secondary-color); /* Ensure text color changes on hover */
}

/* Maintain link color on row hover */
.pelanggan tr:hover .actions a,
.inventory tr:hover .actions a,
.pemasok tr:hover .actions a {
    color: var(--secondary-color); /* Keep link text visible on row hover */
}


/* Styles for each user role */
.admin {
    color: #ff6347; /* Tomato color for admin */
}

.owner {
    color: #32cd32; /* Lime Green color for owner */
}

.user {
    color: #1e90ff; /* Dodger Blue color for regular user */
}
footer {
    display: block;
    justify-content: center;
    bottom: 0; 
    margin-top: 80px;
}

footer .container {
    display: grid;
    justify-content: center;
    align-items: center;
    position: relative;
    grid-template-columns: 50% 50%;
    background: var(--primary-color);
    padding: 15px 0 15px 0;
    height: auto;
    width: 100%;
    left: 0;
}

footer .container .coloumn-1 .theme h1 {
    display: flex;
    justify-content: start;
    font-size: 1.5em;
    text-align: left;
    color: #fff;
    margin-left: 20px;
    margin-top: 20px;
}

footer .container .coloumn-1 .paragraph p {
    display: flex;
    justify-content: left;
    align-items: start;
    color: #fff;
    font-size: 0.9em;
    text-align: justify;
    margin: 10px 20px;
}

footer .container .coloumn-1 .social-icon,
footer .container .coloumn-1 .menu {
    position: relative;
    display: flex;
    justify-content: start;
    align-items: center;
    margin: 20px 0 10px 10px;
    flex-wrap: wrap;
}

footer .container .coloumn-1 .social-icon li,
footer .container .coloumn-1 .menu li {
    list-style: none;
}

footer .container .coloumn-1 .social-icon li a {
    display: grid;
    border-radius: 50px;
    align-content: center;
    justify-content: center;
    color: #fff;
    background: #758694;
    font-size: 1.5em;
    text-decoration: none;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    margin: 0 10px;
    transition: 0.3s ease;
}

footer .container .coloumn-1 .social-icon li .link {
    background: #426782;
}

footer .container .coloumn-1 .social-icon li .twitter {
    background: #1da1f2;
}

footer .container .coloumn-1 .social-icon li .instagram {
    background-image: linear-gradient(to right, #833ab4, #fd1d1d, #fcb045);
}

footer .container .coloumn-1 .social-icon li .youtube {
    background: #ff0000;
}

footer .container .coloumn-1 .social-icon li a:hover {
    color: #000;
    background: #fff;
    border-radius: 50%;
    transform: translateY(-10px);
}

footer .container .coloumn-2 {
    margin: 0 20px 0 20px;
}

footer .container .coloumn-2 .theme h1 {
    display: flex;
    justify-content: start;
    font-size: 1.5em;
    text-align: left;
    color: #fff;
    margin-left: 20px;
    margin-bottom: 10px;
}

footer .container .coloumn-2 .info {
    position: relative;
}

footer .container .coloumn-2 .info li {
    display: grid;
    grid-template-columns: 30px 1fr;
    margin-bottom: 10px;
}

footer .container .coloumn-2 .info li span {
    color: #fff;
    margin-top: 4px;
    font-size: 1.1em;
}

footer .container .coloumn-2 .info li p a {
    color: #fff;
    text-decoration: none;
    font-size: 0.9em;
    transition: 0.3s ease-in-out;
}

footer .container .coloumn-2 .info li p a:hover {
    transition: all 0.2s ease-in-out;
    font-weight: 700;
    text-shadow: 0 0 8px var(--secondary-color);
}

footer .container hr {
    width: 50%;
    text-align: center;
    margin-left: 0;
}

footer .coloumn-3 {
    position: relative;
    display: flex;
    justify-content: center;
    padding: 20px 0 20px 0;
    background: var(--primary-color);
    bottom: 0;
    left: 0;
}

footer .coloumn-3 p {
    color: #fff;
    font-size: 0.8em;
}

/* footer */

    </style>
    <title>Admin | Barshop</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="nav">
        <i class="uil uil-bars navOpenBtn" onclick="openNav()"></i>
        <a href="#" class="logo">Barshop</a>
        <ul class="nav-links">
            <i class="uil uil-times navCloseBtn" onclick="closeNav()"></i>
            <li><a href="#pesanan">Transaksi</a></li>
            <?php if ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'owner') { ?>
            <li><a href="#pelanggan">Pelanggan</a></li>
            <li><a href="#inventory">Barang</a></li>
            <li><a href="#pemasok">Pemasok</a></li>
            <?php } ?>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <!-- Main Content -->
    <h1 class="title">Hai 
    <span class="<?php echo $_SESSION['level']; ?>"><b><?= $_SESSION['user']; ?></b></span>
    Selamat Datang Di Barshop
</h1>


<section id="pesanan" class="pesanan">
    <h1>Transaksi</h1>
    <?php
    include "koneksi.php";

    // Query untuk mendapatkan data lengkap termasuk nama pelanggan, pemasok, dan barang
    $sql = "SELECT 
                transaksi.*, 
                pelanggan.NamaPelanggan, 
                pemasok.NamaPemasok, 
                barang.NamaBarang 
            FROM transaksi
            JOIN pelanggan ON transaksi.KodePelanggan = pelanggan.KodePelanggan
            JOIN pemasok ON transaksi.KodePemasok = pemasok.KodePemasok
            JOIN barang ON transaksi.KodeBarang = barang.KodeBarang";

    $result = mysqli_query($koneksi, $sql);
    ?>

    <!-- Tampilkan link "Tambah data" hanya untuk admin dan operator -->
    <?php
    echo '<a class="btn-add" href="formTransaksi.php">Tambah data</a>';
    ?>

    <div class="card-container">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='card'>
                    <h3>Nomor Order: " . htmlspecialchars($row['NomorOrder']) . "</h3>
                    <p><strong>Tanggal Order:</strong> " . htmlspecialchars($row['TanggalOrder']) . "</p>
                    <p><strong>Kode Pelanggan:</strong> " . htmlspecialchars($row['KodePelanggan']) . "</p>
                    <p><strong>Nama Pelanggan:</strong> " . htmlspecialchars($row['NamaPelanggan']) . "</p>
                    <p><strong>Kode Pemasok:</strong> " . htmlspecialchars($row['KodePemasok']) . "</p>
                    <p><strong>Nama Pemasok:</strong> " . htmlspecialchars($row['NamaPemasok']) . "</p>
                    <p><strong>Kode Barang:</strong> " . htmlspecialchars($row['KodeBarang']) . "</p>
                    <p><strong>Nama Barang:</strong> " . htmlspecialchars($row['NamaBarang']) . "</p>
                    <p><strong>Nomor PO:</strong> " . htmlspecialchars($row['NomorPO']) . "</p>
                    <p><strong>Tanggal PO:</strong> " . htmlspecialchars($row['TanggalPO']) . "</p>
                    <div class='actions'>";

            // Display action buttons based on user level
            if (isset($_SESSION['level']) && $_SESSION['level'] == 'admin') {
                echo "<a href='editTransaksi.php?NomorOrder=" . urlencode($row['NomorOrder']) . "'>Edit</a> | 
                      <a href='deleteTransaksi.php?NomorOrder=" . urlencode($row['NomorOrder']) . "' onclick=\"return confirm('Anda yakin ingin menghapus data ini?')\">Delete</a>";
            } elseif (isset($_SESSION['level']) && $_SESSION['level'] == 'operator') {
                echo "<a href='editTransaksi.php?NomorOrder=" . urlencode($row['NomorOrder']) . "'>Edit</a>";
            }

            echo "</div>
                  </div>";
        }
        ?>
    </div>
</section>


<?php if ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'owner') { ?>

<section id="pelanggan" class="pelanggan">
    <h1>Manajemen Pelanggan</h1>
    <?php        
    include "koneksi.php";
    $sql = "SELECT * FROM pelanggan";
    $result = mysqli_query($koneksi, $sql);
    ?>
    <table>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Telpon</th>                
            <th>Aksi</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>" . htmlspecialchars($row['KodePelanggan']) . "</td>
                <td>" . htmlspecialchars($row['NamaPelanggan']) . "</td>
                <td>" . htmlspecialchars($row['AlamatPelanggan']) . "</td>
                <td>" . htmlspecialchars($row['NoTelpPelanggan']) . "</td>
                <td class='actions'>";
            
            // Display action links based on user level
            if (isset($_SESSION['level']) && $_SESSION['level'] == 'admin') {
                echo "<a href='editRegis.php?KodePelanggan=" . urlencode($row['KodePelanggan']) . "'>Edit</a> | 
                      <a href='deleteRegis.php?KodePelanggan=" . urlencode($row['KodePelanggan']) . "' onclick=\"return confirm('Anda yakin ingin menghapus data ini?')\">Delete</a> | 
                      <a href='formRegis.php'>Tambah</a>";
            } elseif (isset($_SESSION['level']) && $_SESSION['level'] == 'operator') {
                echo "<a href='formEdit.php?KodePelanggan=" . urlencode($row['KodePelanggan']) . "'>Edit</a>";
            } else {
                echo "Aksi tidak tersedia";
            }

            echo "</td></tr>";
        }
        ?>
    </table>
</section>


<section id="inventory" class="inventory">
    <h1>Inventaris & Permintaan Pembelian</h1>
    <?php        
    include "koneksi.php";
    $sql = "SELECT * FROM barang";
    $result = mysqli_query($koneksi, $sql);
    ?>
    <table>
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Satuan</th>
                <th>Harga Beli</th>
                <th>Total Harga</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>" . htmlspecialchars($row['KodeBarang']) . "</td>
                <td>" . htmlspecialchars($row['NamaBarang']) . "</td>
                <td>" . htmlspecialchars($row['JenisBarang']) . "</td>
                <td>" . htmlspecialchars($row['Satuan']) . "</td>
                <td>Rp " . number_format($row['HargaBeli'], 0, ',', '.') . "</td>
                <td>Rp " . number_format($row['TotalHarga'], 0, ',', '.') . "</td>
                <td>" . htmlspecialchars($row['Qty/Jumlah']) . "</td>
                <td class='actions'>";
            
            if (isset($_SESSION['level']) && $_SESSION['level'] == 'admin') {
                echo "<a href='editBarang.php?KodeBarang=" . urlencode($row['KodeBarang']) . "'>Edit</a> | 
                      <a href='deleteBarang.php?KodeBarang=" . urlencode($row['KodeBarang']) . "' onclick=\"return confirm('Anda yakin ingin menghapus data ini?')\">Delete</a> | 
                      <a href='formbarang.php'>Tambah</a>";
            } elseif (isset($_SESSION['level']) && $_SESSION['level'] == 'operator') {
                echo "<a href='formEditBarang.php?KodeBarang=" . urlencode($row['KodeBarang']) . "'>Edit</a>";
            } else {
                echo "Aksi tidak tersedia";
            }

            echo "</td></tr>";
        }
        ?>
        </tbody>
    </table>
</section>

<section id="pemasok" class="pemasok">
    <h1>Pemasok</h1>
    <?php        
    include "koneksi.php";
    $sql = "SELECT * FROM pemasok";
    $result = mysqli_query($koneksi, $sql);
    ?>
    <table>
        <thead>
            <tr>
                <th>Kode Pemasok</th>
                <th>Nama Pemasok</th>
                <th>Alamat</th>
                <th>No Telpon</th>
                <th>Email</th>   
                <th>Aksi</th>                         
            </tr>
        </thead>
        <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>" . htmlspecialchars($row['KodePemasok']) . "</td>
                <td>" . htmlspecialchars($row['NamaPemasok']) . "</td>
                <td>" . htmlspecialchars($row['Alamat']) . "</td>
                <td>" . htmlspecialchars($row['NoTelp']) . "</td>
                <td>" . htmlspecialchars($row['Email']) . "</td>
                <td class='actions'>";
            
            if (isset($_SESSION['level']) && $_SESSION['level'] == 'admin') {
                echo "<a href='editPemasok.php?KodePemasok=" . urlencode($row['KodePemasok']) . "'>Edit</a> | 
                      <a href='deletePemasok.php?KodePemasok=" . urlencode($row['KodePemasok']) . "' onclick=\"return confirm('Anda yakin ingin menghapus data ini?')\">Delete</a> | 
                      <a href='formPemasok.php'>Tambah</a>";
            } elseif (isset($_SESSION['level']) && $_SESSION['level'] == 'operator') {
                echo "<a href='formEditPemasok.php?KodePemasok=" . urlencode($row['KodePemasok']) . "'>Edit</a>";
            } else {
                echo "Aksi tidak tersedia";
            }

            echo "</td></tr>";
        }
    }
        ?>
        </tbody>
    </table>
</section>

<footer id="footer">
        <div class="container">

            <!-- Coloumn-01 -->
            <div class="coloumn-1">
                <ul class="theme">
                    <h1>Barshop</h1>
                </ul>
                <ul class="paragraph">
                    <p>Our Media Sosial</p>
                </ul>
                <ul class="social-icon">
                    <li>
                        <a href="" class="link">
                            <i class='bx bx-link-alt'></i>
                        </a>
                    </li>
                    <li>
                        <a href="" class="twitter">
                            <i class='bx bxl-twitter'></i>
                        </a>
                    </li>
                    <li>
                        <a href="" class="youtube">
                            <i class='bx bxl-youtube'></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="instagram">
                            <i class='bx bxl-instagram'></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Coloumn-01 -->

            <!-- Coulumn-02 -->
            <div class="coloumn-2">
                <ul class="theme">
                    <h1>Meet us at</h1>
                </ul>
                <ul class="info">
                    <li>
                        <span>
                            <i class='bx bx-location-plus'></i>
                        </span>
                        <p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3185.94090105738!2d106.86404917387829!3d-6.3103563617520235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed7636461889%3A0xa26c6e6181e00473!2sJl.%20Makmur%2C%20Susukan%2C%20Kec.%20Ciracas%2C%20Kota%20Jakarta%20Timur%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2013750!5e1!3m2!1sid!2sid!4v1731241900810!5m2!1sid!2sid" width="200" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </p>
                    </li>                    
                    <li>
                    <span>
                            <i class='bx bx-envelope'></i>
                        </span>
                        <p>
                            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=ramadan2609062gmail.com"
                                target="_blank">BarokGanteng@Barshop.co.id</a>
                        </p>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Coulumn-02 -->

        <!-- Coulumn-03 -->
        <hr>
        <div class="coloumn-3">
            <p>&copy Copyright 2024 | Barshop</p>
        </div>
        <!-- Coulumn-03 -->

    </footer>

    <script>
        const nav = document.querySelector(".nav"),
      navOpenBtn = document.querySelector(".navOpenBtn"),
      navCloseBtn = document.querySelector(".navCloseBtn");

function openNav() {
    nav.classList.add("openNav");
}

function closeNav() {
    nav.classList.remove("openNav");
}

    </script>    
</body>
</html>
