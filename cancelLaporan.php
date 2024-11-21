<?php
include 'koneksi.php';
session_start();

$id = $_GET['id'];

$sql = "UPDATE `laporan` SET `status` = 'Cancel' WHERE `laporan`.`id` = $id";
$result = mysqli_query($koneksi, $sql);
if($result){
    header("Location: AdminDashboard.php");
}
?>