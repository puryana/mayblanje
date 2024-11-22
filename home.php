<?php  
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
                    <li><a href="Keranjang.php">Keranjang</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <!-- untuk home -->
        <section id="home">
            <img src="./img/logo.jpg "/>
            <div class="kolom">
                <p class="deskripsi">Belanja #dirumahaja</p>
                <h2>Tetap Sehat, Tetap Semangat</h2>
                <p>MayBlanje adalah toko online yang fokus pada penjualan produk fashion. Berlokasi di daerah Negara, MayBlanje menawarkan berbagai jenis fashion untuk pria dan wanita. Kunjungi website kami untuk mengeksplor koleksi fashion terbaru. Segera lengkapi gaya Anda dengan berbelanja di toko online kami.</p>
                <p><a href="barang.php" class="tbl-pink">Ayo Kepo</a></p>
            </div>
        </section><br><br>

        <!-- untuk courses -->
        <section id="courses">
            <div class="kolom">
                <p class="deskripsi">MayBlanje</p>
                <h2>Online Shop No 1 Jembrana</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed deserunt voluptatibus possimus blanditiis reiciendis. Qui, facilis! Delectus exercitationem dolores sapiente?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed deserunt voluptatibus possimus blanditiis reiciendis. Qui, facilis! Delectus exercitationem dolores sapiente?</p>
                <p><a href="barang.php" class="tbl-biru">Lihat Lebih Detail</a></p>
            </div>
            <img src="./img/icon2.jpg"/>
        </section>


        <!-- untuk partners -->
        <section id="partners">
            <div class="tengah">
                <div class="kolom">
                    <p class="deskripsi">Brand Indonesia Ternama</p>
                    <h2>Partners</h2>
                    <p>Kami telah bekerja sama dengan berbagai brand trend di Indonesi.</p>
                </div>

                <div class="partner-list">
                    <div class="kartu-partner">
                        <img src="./img/brand1.jpg"/>
                    </div>
                    <div class="kartu-partner">
                        <img src="./img/brand2.jpg"/>
                    </div>
                    <div class="kartu-partner">
                        <img src="./img/brand3.jpg"/>
                    </div>
                    <div class="kartu-partner">
                        <img src="./img/brand4.jpg"/>
                    </div>
                    <div class="kartu-partner">
                        <img src="./img/brand5.jpg"/>
                    </div>
                </div>
            </div>
        </section>
    </div>

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