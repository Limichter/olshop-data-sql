<!DOCTYPE HTML>

<html>
<head>
	<title>Tabel Barang</title>
	<link rel="stylesheet" href="styleBarang.css">
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
				<li><a href="Main.html">Log Out<a/></li>
			</ul>
		</div>
		<div class="banner">
			<div class="left">
				<h2>Tabel Barang<h2>
				<h4>Berikut adalah daftar barang beserta harga dan jumlah stok dalam toko kami<h4>
			</div>
			<div class="right">
				<table>
				<tr>
				<th> Kode Barang </th>
				<th> Nama Barang </th>
				<th> Harga Barang </th>
				<th> Jumlah Barang </th>
				<th> Action </th>
				</tr>	
					<?php
					
					include 'koneksi_olshop.php';
					$mysqli = new mysqli($host, $user, $pass , $db );
					$barang = mysqli_query($mysqli, "SELECT * from barang");
					foreach ($barang as $row) {
						echo "<tr>
					<td>" . $row['barang_kode'] . "</td>
					<td>" . $row['barang_nama'] . "</td>
					<td>" . $row['barang_harga'] . "</td>
					<td>" . $row['barang_jumlah'] . "</td>
					<td><a href='edit.php?barang_kode=$row[barang_kode]'>Edit</a>
					<a href='delete.php?barang_kode=$row[barang_kode]'>Delete</a>
					</td>
					  </tr>";
					}
					?>
				<table>
			</div>
		</div>
	</div>
	
</body>
</html>