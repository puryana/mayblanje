<?php 
session_start();
	$_SESSION['keranjang'];
	include 'koneksi.php';
if($_SESSION['log'] != true){
        echo '<script>window.location="login.php"</script>';
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
    
    <!-- keranjang -->
    <div class="section">
        <div class="container">
            <h3>Checkout</h3>
            <div class="box">
            <table border="1" cellspacing="0" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th >Nama Produk</th>
                        <th >Harga</th>
                        <th>Jumlah</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    <?php $total = 0; ?>
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
                    </tr>
                    <?php $no++; ?>
                    <?php $total+=$subtotal; ?>
                <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total Belanja</th>
                        <th class="total">Rp. <?php echo number_format($total) ?> </th>
                    </tr>
                </tfoot>
            </table>
            <br>
            
                <form method="post">
                    <div class="row"> 
                        <div class="col-md4">
                            <div class="form-group">
                                <input type="text" class="form-control" readonly value="<?php echo $_SESSION["user_global"]->username;?>">
                            </div>
                        </div>
                        <div class="col-md4">
                            <div class="form-group">
                                <input type="text" class="form-control" readonly value="<?php echo $_SESSION["user_global"]->no_hp;?>">
                            </div>
                        </div>
                        <div class="col-md4">
                            <div class="form-group">
                                <input type="text" class="form-control" readonly value="<?php echo $_SESSION["user_global"]->alamat;?>">
                            </div>
                        </div>
                        <div class="col-md4">
                            <select class="form-control" name="id_ongkir">
                                <option value="">Pilih Ongkos Kirim</option>
                                <?php
                                $ambil = $koneksi->query("SELECT * FROM ongkir");
                                while ($ongkir = $ambil->fetch_assoc()){
                                ?>
                                <option value="<?php echo $ongkir['id_ongkir']?>" >
                                    <?php echo $ongkir['nama_kecamatan'] ?> -
                                    Rp. <?php echo number_format($ongkir['tarif']) ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <button class="btn" name="buat_pesanan" target="blank">Buat Pesanan</button>
                </form>
                    <?php 
                    if (isset($_POST['buat_pesanan']))
                    {
                        $id_user = $_SESSION["user_global"]->id_user;
                        $id_ongkir = $_POST["id_ongkir"];
                        $tanggal_pembelian = date("y-m-d");

                        $ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
                        $arrayongkir = $ambil->fetch_assoc(); 
                        $nama_kecamatan = $arrayongkir['nama_kecamatan'];                    
                        $tarif = $arrayongkir['tarif'];

                        $total_pembelian = $total + $tarif;

                        //menyimpan data pembelian
                        $koneksi->query("INSERT INTO tb_pembelian (
                            id_user, id_ongkir, tanggal_pembelian, total_pembelian, nama_kecamatan, tarif )
                            VALUES ('$id_user', '$id_ongkir', '$tanggal_pembelian', '$total_pembelian','$nama_kecamatan', '$tarif')"
                        );

                        //mendapatkan id pembelian
                        $id_pembelian_new = $koneksi->insert_id;

                        foreach ($_SESSION["keranjang"] as $id_barang => $jumlah) 
                        {
                            $koneksi->query("INSERT INTO pembelian_barang (id_pembelian, id_barang, jumlah_barang) VALUES ('$id_pembelian_new', '$id_barang', '$jumlah')");
                        }

                        //keranjanga belanja kosong setelah buat pesanan
                        unset($_SESSION['keranjang']);

                        //tampilan ke halaman nota
                        echo "<script>alert('Pembelian Sukses');</script>";
                        echo "<script>location='nota.php?id=$id_pembelian_new';</script>";
                    }
                    ?>

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