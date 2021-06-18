<!DOCTYPE HTML>

<html>
<head>
	<title>Tabel Pembelian</title>
	<link rel="stylesheet" href="stylePembelian.css">
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
				<h2>Tabel Pembelian<h2>
				<h4>Berikut adalah daftar pembeli beserta tanggal dan total harga yang dilakukan dalam toko kami<h4>
			</div>
			<div class="right">
				<table>
				<tr>
				<th> Kode Pembelian </th>
				<th> Tanggal Pembelian </th>
				<th> Total Harga </th>
				</tr>	
					<?php
					include 'koneksi_olshop.php';

					$mysqli = new mysqli($host, $user, $pass , $db );
					/* return name of current default database */
					if ($result = $mysqli->query("SELECT pembelian_kode, pembelian_tanggal, pembelian_hargatotal FROM pembelian;")) {
						while($row = $result->fetch_row())
						{
							print "<tr>";
							print "<td>" . $row[0] . "</td>";
							print "<td>" . $row[1] . "</td>";
							print "<td>" . $row[2] . "</td>";
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