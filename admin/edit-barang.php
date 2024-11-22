<?php	
	session_start();
	include 'koneksi.php';

	$barang = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id_barang = '".$_GET['id']."' ");
	if(mysqli_num_rows($barang) == 0){
		echo '<script>window.location="data-barang.php"</script>';
	}
	$b = mysqli_fetch_object($barang);
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
			<h3>Edit Data Barang</h3>
			<div class="boxx">
				<form action="" method="POST">
					<input type="text" name="nama_barang" placeholder="Nama Barang" class="input-control" value="<?php echo $b->nama_barang ?>" required>
					<input type="text" name="harga" placeholder="Harga" class="input-control" value="<?php echo $b->harga ?>" required>
					<img src="../admin/produk/<?php echo $b->foto ?>" width="100px">
					<input type="hidden" name="foto" value="<?php echo $b->foto ?>">
					<input type="file" name="gambar" class="input-control">
					<input type="text" name="deskripsi" placeholder="Deskripsi" class="input-control" value="<?php echo $b->deskripsi ?>" required>
					<input type="submit" name="submit" value="Edit Data" class="btn-tombol">
					<a href="data-barang.php" class="back">Kembali</a>
				</form>
				<?php 
					if (isset($_POST['submit'])) {

						$nama_barang     = ucwords($_POST['nama_barang']);
						$harga    = $_POST['harga'];
						$deskripsi = $_POST['deskripsi'];
						$foto   =$_POST['foto'];

						// data gambar yang baru
						$filename = $_FILES['gambar']['name'];
						$tmp_name = $_FILES['gambar']['tmp_name'];

						// jika admin ganti gambar
						if($filename != ''){
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
								unlink('./admin/produk/'.$foto);
								move_uploaded_file($tmp_name, './admin/produk/'.$newname);
								$namagambar = $newname;
							}

						}else{
							// jika admin tidak ganti gambar
							$namagambar = $foto;
							
						}

						// query update data produk
						$update = mysqli_query($koneksi, "UPDATE tb_barang SET
											
											nama_barang = '".$nama_barang."',
											harga     = '".$harga."',
											foto      = '".$namagambar."',
											deskripsi     = '".$deskripsi."'
											WHERE id_barang = '".$b->id_barang."'
											");
						if($update){
							echo '<script>alert("Edit data berhasil")</script>';
							echo '<script>window.location="data-barang.php"</script>';
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