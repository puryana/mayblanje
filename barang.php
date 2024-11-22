<?php   
    error_reporting(0);
    session_start();
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
        <!-- untuk barang -->
    <div class="section">
    <div class="container">
    <h3>
        New Products In Store
        </h3>
    <!-- <p>
        Featured Product Just Arrived
    </p> -->
        <div class="box">
            <?php 


                $barang = mysqli_query($koneksi, "SELECT * FROM tb_barang ORDER BY id_barang DESC");
                if(mysqli_num_rows($barang) > 0){
                while($b = mysqli_fetch_array($barang)){
            ?>  
                <div class="col-4">
                    <img src="./admin/produk/<?php echo $b['foto'] ?>" alt="" />
                    <p class="nama"><?php echo substr($b['nama_barang'], 0, 30) ?></p>
                    <p class="harga">Rp. <?php echo number_format($b['harga']) ?></p>
                    <a href="detail-barang.php?id=<?php echo $b['id_barang'] ?>" class="btn btn-primary">Beli</a>
                </div>

        <?php }}else{ ?>
                    <p>Produk tidak ada</p>
                <?php } ?>

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