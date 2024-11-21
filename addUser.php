<?php
include 'koneksi.php';

$user = $_POST['Username'];
$pass = $_POST['Password'];
$insert = "INSERT INTO admin VALUES ('','$user', '$pass', 'user')";
$hasil = mysqli_query($koneksi, $insert);

if($hasil){
    header("Location: Index.php");
}
?>