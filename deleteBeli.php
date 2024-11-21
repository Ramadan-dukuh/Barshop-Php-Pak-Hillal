<?php
include "koneksi.php";
$id = $_GET['NomorPO'];
$query = "DELETE FROM belibarang WHERE NomorPO='$id'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: AdminDashboard.php");
}
?>