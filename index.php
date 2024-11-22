<?php  
    session_start();
    include 'koneksi.php';
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
                    <li><a href="login.php">Home</a></li>
                    <li><a href="login.php">Barang</a></li>
                    <li><a href="login.php">Keranjang</a></li>
                    <li><a href="login.php">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <!-- untuk home -->
        <section id="home">
            <img src="./img/icon1.jpg "/>
            <div class="kolom">
                <p class="deskripsi">Belanja #dirumahaja</p>
                <h2>Tetap Sehat, Tetap Semangat</h2>
                <p>MayBlanje adalah toko online yang fokus pada penjualan produk fashion. Berlokasi di daerah Negara, MayBlanje menawarkan berbagai jenis fashion untuk pria dan wanita. Kunjungi website kami untuk mengeksplor koleksi fashion terbaru. Segera lengkapi gaya Anda dengan berbelanja di toko online kami.</p>
                <p><a href="login.php" class="tbl-pink">Ayo Kepo</a></p>
            </div>
        </section>
        
    </div>

   <!--  footer -->
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
                    <p><b>Instagram: </b>@may_blaje</p>
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