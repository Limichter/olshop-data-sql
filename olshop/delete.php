<?php
include 'koneksi_olshop.php';
$barang_kode	= $_GET['barang_kode'];
$mysqli = new mysqli($host, $user, $pass , $db );
$barang = mysqli_query($mysqli, "SELECT * from barang where barang_kode='$barang_kode'");
// query SQL untuk delete data
$query="DELETE from barang where barang_kode='$barang_kode'";
mysqli_query($mysqli, $query);
// mengalihkan ke halaman index.php
header("location:admin_barang.php");
?>