<?php 
	
	include 'koneksi.php';

	if(isset($_GET['idp'])){
		$delete = mysqli_query($koneksi, "DELETE FROM tb_pegawai WHERE id_pegawai = '".$_GET['idp']."' ");
		echo '<script>window.location="data-pegawai.php"</script>';
	}

	if(isset($_GET['idb'])){
		$barang = mysqli_query($koneksi, "SELECT foto FROM tb_barang WHERE id_barang = '".$_GET['idb']."' ");
		$b = mysqli_fetch_object($barang);

		unlink('../admin/produk/'.$b->foto);

		$delete = mysqli_query($koneksi, "DELETE FROM tb_barang WHERE id_barang = '".$_GET['idb']."' ");
		echo '<script>window.location="data-barang.php"</script>';
	}

?>