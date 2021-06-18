<!DOCTYPE HTML>

<html>
<head>
	<title>Tabel Pesanan</title>
	<link rel="stylesheet" href="stylePesanan.css">
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
				<h2>Tabel Pesanan<h2>
				<h4>Berikut adalah pesanan yang dilakukan dalam toko kami<h4>
			</div>
			<div class="right">
				<table>
				<tr>
				<th> Kode Pembelian </th>
				<th> Kode Barang </th>
				<th> Jumlah Pesanan </th>
				<th> Harga Pesanan </th>
				</tr>	
					<?php
					include 'koneksi_olshop.php';

					$mysqli = new mysqli($host, $user, $pass , $db );
					/* return name of current default database */
					if ($result = $mysqli->query("SELECT pembelian_kode,barang_kode,pesanan_jumlah,pesanan_harga FROM pesanan;")) {
						while($row = $result->fetch_row())
						{
							print "<tr>";
							print "<td>" . $row[0] . "</td>";
							print "<td>" . $row[1] . "</td>";
							print "<td>" . $row[2] . "</td>";
							print "<td>" . $row[3] . "</td>";
							print "</tr>";
						}
						$result->close();
					}
					$mysqli->close();
					?>
				<table>
			</div>
		</div>
	</div>
	
</body>
</html>