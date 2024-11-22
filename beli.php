<?php 
session_start();
//mendapatkan id_barang dari url
$id_barang = $_GET['id'];

//jika sudah ada produk di keranjang, maka produk itu di + 1
if (isset($_SESSION['keranjang'][$id_barang]))
{
	$_SESSION['keranjang'][$id_barang]+=1;
}

//selain itu (blm ada di keranjang), maka produk dianggap beli 1
else
{
	$_SESSION['keranjang'][$id_barang] = 1;
}

//bawa ke halaman keranjang
echo "<script>alert('Produk telah ditambahkan ke keranjang');</script>";
echo "<script>location='keranjang.php';</script>";
?>