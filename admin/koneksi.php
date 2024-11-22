<?php

#Deklarasi Variable
$hostname="localhost";
$Username="root";
$Password="";
$database="mayblanje";

#Koneksi ke server database
$koneksi =mysqli_connect($hostname,$Username,$Password,$database) or die("koneksi gagal");

#Memilih Database
if (mysqli_connect_error()){
	echo "koneksi database mysqli gagal!!!:".mysqli_connect_error();
}
?>