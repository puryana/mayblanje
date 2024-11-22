<?php	
	session_start();
	include 'koneksi.php';

	$pegawai = mysqli_query($koneksi, "SELECT * FROM tb_pegawai WHERE id_pegawai = '".$_GET['id']."' ");
	if(mysqli_num_rows($pegawai) == 0){
		echo '<script>window.location="data-pegawai.php"</script>';
	}
	$p = mysqli_fetch_object($pegawai);
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
			<h3>Edit Pegawai</h3>
			<div class="boxx">
				<form action="" method="POST">
					<input type="text" name="nama_pegawai" placeholder="Nama Lengkap" class="input-control" value="<?php echo $p->nama_pegawai ?>" required>
					<input type="text" name="username" placeholder="Username" class="input-control" value="<?php echo $p->username ?>" required>
					<input type="no" name="no_hp" placeholder="No Hp" class="input-control" value="<?php echo $p->no_hp ?>" required>
					<input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $p->alamat ?>" required>
					<input type="text" name="password" placeholder="Password" class="input-control" value="<?php echo $p->password ?>" required>
					<input type="submit" name="submit" value="Edit Data" class="btn-tombol">
					<a href="data-pegawai.php" class="back">Kembali</a>
				</form>
				<?php 
					if (isset($_POST['submit'])) {

						$nama_pegawai     = ucwords($_POST['nama_pegawai']);
						$username   = $_POST['username'];
						$no_hp   	= $_POST['no_hp'];
						$alamat   	= $_POST['alamat'];
						$password 	= $_POST['password'];

						$update = mysqli_query($koneksi, "UPDATE tb_pegawai SET
											
											nama_pegawai = '".$nama_pegawai."',
											username     = '".$username."',
											no_hp        = '".$no_hp."',
											alamat       = '".$alamat."',
											password     = '".$password."'
											WHERE id_pegawai = '".$p->id_pegawai."'
											");
						if($update){
							echo '<script>alert("Edit data berhasil")</script>';
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