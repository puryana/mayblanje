<?php 
session_start();
	$_SESSION['keranjang'];
	include 'koneksi.php';
if($_SESSION['log'] != true){
        echo '<script>window.location="login.php"</script>';
    }

if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) 
{
    echo "<script>alert('Keranjang anda kosong, mari berbelanja dulu');</script>";
    echo "<script>location='barang.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MayBlanje</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href=''>MayBlanje</a></div>
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
    
    <!-- keranjang -->
    <div class="section">
        <div class="container">
            <h3>Keranjang</h3>
            <div class="box">
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th >Nama Produk</th>
                            <th >Harga</th>
                            <th>Jumlah</th>
                            <th>Sub Total</th>
                            <th>Obsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        <?php foreach ($_SESSION ["keranjang"] as $id_barang => $jumlah) :?>
                        <!-- tampil produk pada keranjang -->
                        <?php 
                        $ambil = $koneksi->query("SELECT * FROM tb_barang WHERE id_barang='$id_barang'");
                        $pecah = $ambil->fetch_assoc();
                        $subtotal = $pecah["harga"]*$jumlah;
                            ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $pecah["nama_barang"]; ?></td>
                            <td> Rp. <?php echo number_format($pecah["harga"]); ?></td>
                            <td><?php echo $jumlah; ?></td>
                            <td>Rp. <?php echo number_format($subtotal); ?></td>
                            <td> 
                                <a href="hapus-data.php?id=<?php echo $id_barang ?>" class="btn-delete">hapus</a>
                            </td>
                        </tr>
                        <?php $no++; ?>
                    <?php endforeach ?>
                    </tbody>
                </table>
                <br><br>
                <a href="barang.php" class="btn"> Lanjutkan belanja</a>
                <a href="checkout.php" class="btn">Checkout</a>
            </div>
        
        </div>
        </div>
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