<?php
include 'koneksi_olshop.php';
$barang_kode	= $_GET['barang_kode'];
$mysqli = new mysqli($host, $user, $pass , $db );
$barang = mysqli_query($mysqli, "SELECT * from barang where barang_kode='$barang_kode'");
$row    = mysqli_fetch_array($barang);

// membuat function untuk set aktif radio button
function active_radio_button($value,$input){
    // apabilan value dari radio sama dengan yang di input
    $result =  $value==$input?'checked':'';
    return $result;
}
?>
<!DOCTYPE HTML>

<html>
<head>
	<title>Edit Barang</title>
	<link rel="stylesheet" href="styleEdit.css">
</head>
<body>
	<div class="hero">
		<div class="navbar"> 
			<h4>OL<span>SHOP</span></h4>
			<ul>
				<li><a href="Admin.html">Home<a/></li>
				<li><a href="admin_barang.php">Barang<a/></li>
				<li><a href="Pesanan.php">Pesanan<a/></li>
				<li><a href="Pembelian.php">Pembelian<a/></li>
				<li><a href="admin.php">Admin<a/></li>
			</ul>
		</div>
		<div class="banner">
			<div class="left">
				<h2>Tabel Barang<h2>
				<h4>Berikut adalah daftar barang beserta harga dan jumlah stok dalam toko kami<h4>
			</div>
			<div class="right">
				
				<form method="post" action="update.php">
					<input type="hidden" value="<?php echo $row['barang_kode'];?>" name="barang_kode">
					<table>
						<tr><td>Nama Barang</td><td><input type="text" value="<?php echo $row['barang_nama'];?>" name="barang_nama"></td></tr>
						<tr><td>Jumlah Barang</td><td><input type="text" value="<?php echo $row['barang_jumlah'];?>" name="barang_jumlah"></td></tr>
						<tr><td>Harga Barang</td><td><input type="text" value="<?php echo $row['barang_harga'];?>" name="barang_harga"></td></tr>
						<tr><td colspan="2"><button type="submit" value="simpan">Selesai</button>
					</table>
				</form>
			
			</div>
		</div>
	</div>
	
</body>
</html>