<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../admin/css/stylelogin.css">
    <title>Login Admin</title>
</head>
<body>

<!-- header -->
<center>
    <div class="alert alert-warning" role="alert">
        
    </div>

    <div class="container">
        <form action="proseslogin.php" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800; color: white">Login Admin</p>
            <div class="input-group">
                <input type="username" placeholder="Username" name="username">
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password">
            </div>
            <div class="input-group">
              <button name="submit" class="btn">Login</button>
            </div>
          
        </form>
    </div>
  </center>
</body>
</html>