<?php 
	include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pembelian</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <script>window.print();</script>
	<nav>
        <div class="wrapper">
            <div class="logo"><a>MayBlanje</a></div>
            <div class="menu">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="barang.php">Barang</a></li>
                    <li><a href="keranjang.php">Keranjang</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper">

	<section class="content">
		<div class="container">
			
			<!-- nota -->
			<h3>Detail Pembelian</h3>
			<?php 
			$ambil = $koneksi->query("SELECT * FROM tb_pembelian JOIN tb_user
				ON tb_pembelian.id_user=tb_user.id_user
				WHERE tb_pembelian.id_pembelian='$_GET[id]'");
			$detail = $ambil->fetch_assoc();
			?>

			
			<div class="row">
				<div class="col-md4">
					<h4>Pembelian</h4>
					<p>No Pembelian : <?php echo $detail['id_pembelian'] ?><br>
					Tanggal : <?php echo $detail['tanggal_pembelian']; ?><br>
					Total : Rp. <?php echo number_format($detail['total_pembelian']); ?>
					</p>
				</div>
				<div class="col-md4">
					<h4>Pelanggan</h4>
					<p><?php echo $detail["username"]; ?><br>
					
						<?php echo $detail["no_hp"]; ?> <br>
						<?php echo $detail["email"];?> <br>
						<?php echo $detail["alamat"]; ?>
					</p>
				</div>
				<div class="col-md4">
					<h4>Pengiriman</h4>
					<p> <?php echo $detail['nama_kecamatan'] ?><br>
					Ongkos kirim : Rp. <?php echo number_format($detail['tarif']); ?>
					</p>
				</div>
			</div>
			<table border="1" cellspacing="0" class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Barang</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Subtotal</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; ?>
					<?php $ambil = $koneksi->query("SELECT * FROM pembelian_barang JOIN tb_barang ON 
					pembelian_barang.id_barang=tb_barang.id_barang
					WHERE pembelian_barang.id_pembelian='$_GET[id]'"); ?>
					<?php while ($pecah=$ambil->fetch_assoc()) {?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $pecah['nama_barang']; ?></td>
						<td><?php echo $pecah['harga']; ?></td>
						<td><?php echo $pecah['jumlah_barang']; ?></td>
						<td><?php echo $pecah['harga']*$pecah['jumlah_barang']; ?></td>	
					</tr>
					<?php $no++; ?>
				<?php } ?>
				</tbody>
			</table>
			<div class="row">
				<div class="col-md">
					<p>
						Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> ke <br>
						<strong>BANK BRI 132-002055-3276 AN. MayBlanje</strong>
					</p>
				</div>
			</div>
			<!--  <a href="print.php" target="blank">Print Nota</a> -->
		</div>
    </section>
</div>

    <!-- footer -->
    <div id="contact">
        <div class="wrapper">
            <div class="footer">
                <div class="footer-section">
                    <h3>About</h3>
                    <p>Ayo segera tambah koleksi fashion dengan berbelanja ditoko kami ini</p>
                </div>
                <div class="footer-section">
                    <h3>Addres</h3>
                    <p>Jl.Sahadewa, Br. Rening, Ds.Baluk, Negara</p>
                    <p>Kode Pos: 82218</p>
                </div>
                <div class="footer-section">
                    <h3>Social</h3>
                    <p><b>Instagram: </b>@mayblanje</p>
                </div>
            </div>
        </div>
    </div>

    <div id="copyright">
        <div class="wrapper">
            &copy; 2023. <b>MayBlanje.</b> 
        </div>
    </div>

</body>
</html>