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
	<div class="section">
		<div class="container">
			<h3>Tambah Pegawai</h3>
			<div class="boxx">
				<form action="" method="POST">
					<input type="text" name="nama_pegawai" placeholder="Nama Lengkap" class="input-control"  required>
					<input type="text" name="username" placeholder="Username" class="input-control"  required>
					<input type="no" name="no_hp" placeholder="No Hp" class="input-control"  required>
					<input type="text" name="alamat" placeholder="Alamat" class="input-control"  required>
					<input type="text" name="password" placeholder="Password" class="input-control"  required>
					<input type="submit" name="proses" value="Tambah Data" class="btn-tombol">
					<a href="data-pegawai.php" class="back">Kembali</a>
				</form>
				<?php 
					if (isset($_POST['proses'])) {

						$nama_pegawai = ucwords($_POST['nama_pegawai']);
						$username     = $_POST['username'];
						$no_hp        = $_POST['no_hp'];
						$alamat       = $_POST['alamat'];
						$password     = $_POST['password'];

						$insert = mysqli_query($koneksi, "INSERT INTO tb_pegawai VALUES(
											null,
											'".$nama_pegawai."',
											'".$username."',
											'".$no_hp."',
											'".$alamat."',
											'".$password."'
											) ");
						if($insert){
							echo '<script>alert("Tambah data berhasil")</script>';
							echo '<script>window.location="data-pegawai.php"</script>';
						}else{
							echo 'gagal'.mysqli_error($koneksi);
						}
					}
				?>
			</div>
		</div>
	</div>


	<!-- footer -->
	<footer>
		<div class="container">
			<small> Copyright &copy; 2023 - Admin MayBlanje.</small>
		</div>
	</footer>
</body>
</html>