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
			<h3>Tambah Data Barang</h3>
			<div class="boxx">
				<form action="" method="POST" enctype="multipart/form-data">
					<input type="text" name="nama_barang" placeholder="Nama Barang" class="input-control"  required>
					<input type="text" name="harga" placeholder="Harga" class="input-control"  required>
					<input type="file" name="gambar" class="input-control" required>
					<input type="text" name="deskripsi" placeholder="Deskripsi" class="input-control"  required>
					<input type="submit" name="proses" value="Tambah Data" class="btn-tombol">
					<a href="data-barang.php" class="back">Kembali</a>
				</form>
				<?php 
					if (isset($_POST['proses'])) {

						$nama_barang = ucwords($_POST['nama_barang']);
						$harga   	 = $_POST['harga'];
						$deskripsi   = $_POST['deskripsi'];

						// menampung data file yang diupload
						$filename = $_FILES['gambar']['name'];
						$tmp_name = $_FILES['gambar']['tmp_name'];

						$type1 = explode('.', $filename);
						$type2 = $type1[1];

						$newname = 'produk'.time().'.'.$type2;

						// menampung data format file yang diizinkan
						$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

						// validasi format file
						if(!in_array($type2, $tipe_diizinkan)){
							// jika format file tidak ada di dalam tipe diizinkan
							echo '<script>alert("Format file tidak diizinkan")</scrtip>';

						}else{
							// jika format file sesuai dengan yang ada di dalam array tipe diizinkan
							// proses upload file sekaligus insert ke database
							move_uploaded_file($tmp_name, '../admin/produk/'.$newname);

						$insert = mysqli_query($koneksi, "INSERT INTO tb_barang VALUES(
											null,
											'".$nama_barang."',
											'".$harga."',
											'".$newname."',
											'".$deskripsi."'
											) ");
						if($insert){
							echo '<script>alert("Tambah data berhasil")</script>';
							echo '<script>window.location="data-barang.php"</script>';
						}else{
							echo 'gagal'.mysqli_error($koneksi);
						}
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