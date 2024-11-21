<?php
include "koneksi.php";
$id = $_GET['id'];
$query = "DELETE FROM laporan WHERE id='$id'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: AdminDashboard.php");
}
?>