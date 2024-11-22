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
			<h3>Data Pegawai</h3>
			<div class="box">
				<div class="table-container">
				<table class="table">
					<thead>
						<tr>
							<th>No</th>
							<th class="long">Nama Pegawai</th>
							<th>Username</th>
							<th>No Hp</th>
							<th>Alamat</th>
							<th>Obsi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							$pegawai = mysqli_query($koneksi, "SELECT * FROM tb_pegawai ORDER BY id_pegawai DESC");
							while($row = mysqli_fetch_array($pegawai)){
						?>
						<tr>
							<td data-th="No"><?php echo $no ++ ?></td>
							<td data-th="Nama Pegawai" class="long2"><?php echo $row['nama_pegawai'] ?></td>
							<td data-th="Username"><?php echo $row['username'] ?></td>
							<td data-th="No Hp"><?php echo $row['no_hp'] ?></td>
							<td data-th="Alamat"><?php echo $row['alamat'] ?></td>
							<td data-th="Obsi">
								<a class="btn" href="edit-pegawai.php?id=<?php echo $row['id_pegawai'] ?>"> Edit</a> ||
								<a class="btn" href="hapus.php?idp=<?php echo $row['id_pegawai'] ?>" onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
				<br>
				<a class="btn-buttom" href="tambah-pegawai.php">Tambah Pegawai</a>
				</div>
			</div>
		</div>
	</div>


	<!-- footer -->
	<br><br><br><br><br><br>
	<footer>
		<div class="container">
			<small> Copyright &copy; 2023 - Admin MayBlanje.</small>
		</div>
	</footer>
</body>
</html>