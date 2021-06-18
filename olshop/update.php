<?php
include 'koneksi_olshop.php';
$mysqli = new mysqli($host, $user, $pass , $db );
// menyimpan data kedalam variabel
$barang_kode   	= $_POST['barang_kode'];
$barang_nama   	= $_POST['barang_nama'];
$barang_jumlah   = $_POST['barang_jumlah'];
$barang_harga   = $_POST['barang_harga'];
// query SQL untuk insert data
$query="UPDATE barang SET barang_nama='$barang_nama',barang_jumlah='$barang_jumlah',barang_harga='$barang_harga' where barang_kode='$barang_kode'";
mysqli_query($mysqli, $query);
// mengalihkan ke halaman index.php
header("location:admin_barang.php");
?>