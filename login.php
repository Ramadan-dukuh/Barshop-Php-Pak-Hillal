<?php
session_start();


include "koneksi.php";
$user = $_POST['Username'];
$pass = $_POST['Password'];
$query = "SELECT * FROM admin WHERE Username = '$user'";
$hasil = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($hasil);
$dbuser = $row['Username'];
$dbpass = $row['Password'];
$dblevel = $row['Level'];

if ($user == $dbuser && $pass == $dbpass && $dblevel=="admin" || $dblevel=="owner" || $dblevel=="user"){
    session_start();
    $_SESSION['user'] = $dbuser;
    $_SESSION['level']= $dblevel;
    header("Location: AdminDashboard.php");
}
?>