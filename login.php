<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/stylogin.css">
    <title>Login | MayBlanje</title>
</head>
</head>
	<body id="bg-login">
		<div  class="container">
			<p class="login-text" style="font-size: 2rem; font-weight: 1000;">Login</p>
			<form action="" method="POST" class="login-email">
      <div class="input-group">
                  <input type="email" placeholder="Email" name="email" value="" required>
              </div>

              <div class="input-group">
                  <input type="password" placeholder="Password" name="password" value="" required>
              </div>

              <div class="input-group">
                  <button name="submit" class="btn">Login</button>
              </div>
              <p class="login-register-text">Anda belum punya akun? <a href="registrasi.php">Register</a></p>
      </form>

        <?php 
          if(isset($_POST['submit'])){
            session_start();
            include 'koneksi.php';

            $email = mysqli_real_escape_string($koneksi, $_POST['email']);
            $password = mysqli_real_escape_string($koneksi, $_POST['password']);

            $cek = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE email = '".$email."' AND password = '".($password)."'");
            if(mysqli_num_rows($cek) > 0){
              $d = mysqli_fetch_object($cek);
              $_SESSION['log'] = true;
              $_SESSION['user_global'] = $d;
              $_SESSION['id'] = $d->id_user;
              echo '<script>window.location="home.php"</script>';
            }else{
              echo '<script>alert("Username atau password Anda salah. Silahkan coba lagi!")</script>';
            }

          }
        ?>
		</div>
	</body>
	</html>