<?php	
	session_start();
	include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MayBlanje</title>
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Pacifico&display=swap" rel="stylesheet">
</head>
<body>

	<!-- navbar -->
	<nav>
		<div class="logo">
			<img src="../admin/img/logo3.png" alt="">
		</div>

		<ul>
			<li><a href="index.php">HOME</a></li>
			<li><a href="data-pegawai.php">DATA PEGAWAI</a></li>
			<li><a href="data-barang.php">DATA BARANG</a></li>
			<li><a href="logout.php">LOGOUT</a></li>
		</ul>

		<div class="menu-toggle">
			<input type="checkbox">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</nav>
	<script src="../admin/css/script.js"></script>
	<!-- end navbar -->
	

	<!-- content -->
	<div class="container">
		<div class="pers">
			<h3>Data Barang</h3>
			<div class="box">
				<div class="table-container">
				<table class="table">
					<thead>
						<tr>
							<th width="60px">No</th>
							<th class="long">Nama Barang</th>
							<th>Harga</th>
							<th>Foto</th>
							<th class="dsk">Deskripsi</th>
							<th>Obsi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							$barang = mysqli_query($koneksi, "SELECT * FROM tb_barang ORDER BY id_barang DESC");
							while($row = mysqli_fetch_array($barang)){
						?>
						<tr>
							<td data-th="No :"><?php echo $no ++ ?></td>
							<td data-th="Nama Barang :" class="long2"><?php echo $row['nama_barang'] ?></td>
							<td data-th="Harga :">Rp. <?php echo number_format($row['harga']) ?></td>
							<td data-th="Foto :"><a href="produk/<?php echo $row['foto'] ?>" target				="_blank"> <img src="produk/<?php echo $row['foto'] ?>			" width="50px"> </a></td>
							<td data-th="Deskripsi :" class="dsk1"><?php echo $row['deskripsi'] ?></td>
							<td data-th="Obsi :">
								<a class="btn" href="edit-barang.php?id=<?php echo $row['id_barang'] ?>">Edit </a> ||
								<a class="btn" href="hapus.php?idb=<?php echo $row['id_barang'] ?>" onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
				<br>
				<a class="btn-buttom" href="tambah-barang.php">Tambah Barang</a>
			</div>
			</div>
		</div>
	</div>


	<!-- footer -->
	<br><br><br><br><br><br><br><br>
	<footer>
		<div class="container">
			<small> Copyright &copy; 2023 - Admin MayBlanje.</small>
		</div>
	</footer>
</body>
</html>