<?php 
include 'koneksi.php';
error_reporting(0);
session_start();
if (isset($_SESSION['log'])) {
    }
    if (isset($_POST['submit'])) {
        $username   = $_POST['username'];
        $email      = $_POST['email'];
        $no_hp    = $_POST['no_hp'];
        $alamat     = $_POST ['alamat'];
        $password   = ($_POST['password']);
        $cpassword  = ($_POST['cpassword']);

        if ($password == $cpassword) {
            $sql = "SELECT * FROM tb_user WHERE email='$email'";
            $result = mysqli_query($koneksi, $sql);
            if (!$result->num_rows > 0) {
                $sql = "INSERT INTO tb_user (username, email, no_hp, alamat, password)
                        VALUES ('$username', '$email', '$no_hp','$alamat', '$password')";
                $result = mysqli_query($koneksi, $sql);
                if ($result) {
                    echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                    $username           = "";
                    $email              = "";
                    $no_hp              = "";
                    $alamat             = "";
                    $_POST['password']  = "";
                    $_POST['cpassword'] = "";
                    echo "<script>window.location.href='login.php';</script>";
                    exit;
                } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
              }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
      } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
      }
  }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | MayBlanje </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/stylogin.css">

</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="no_hp" placeholder="No Hp" name="no_hp" value="<?php echo $no_hp; ?>" required>
            </div>
            <div class="input-group">
                <input type="alamat" placeholder="Alamat" name="alamat" value="<?php echo $alamat; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Anda sudah punya akun? <a href="login.php">Login </a></p>
        </form>
    </div>
</body>
</html>
