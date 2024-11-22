<?php
include 'koneksi.php';
$username=$_POST['username'];
$password=$_POST['password'];
$login= mysqli_query($koneksi,"SELECT * FROM tb_pegawai WHERE username='$username'AND password='$password'");
$ketemu = mysqli_num_rows($login);
$data = mysqli_fetch_array($login);
if($ketemu >0){
  #jika ketemu
  session_start();
 $_SESSION['id_user'] = $data['id_user'];
 $_SESSION['username'] = $data['username'];
 $_SESSION['password'] = $data['password'];
 ?>
<script language="javascript">document.location='index.php'; </script>
<?php
}else{
  #jika tidak ketemu
  ?>
<script language="javascript">alert("Username dan Password salah!");document.location='login.php';</script>
<?php
}
?>