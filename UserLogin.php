<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LACOL.COM | LOGIN</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet"> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
  </head>
    <body id="bg-login">
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">LACOL | MENU</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="UserLogin.php">Home</a>
        </li>
        <li class ="nav-item">
        <li><a class="nav-link active" aria-current="page" href="Register.php">Register</a></li>
        <li><a class="nav-link active" aria-current="page" href="UserLogin.php">Login User</a></li>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
        <div class="box-login">
            <h2>UserLogin</h2>
            <form action="" method="POST">
                <input type="email" name="email" placeholder="Email" class="input-control">
                <input type="password" name="pass" placeholder="password" class="input-control">
                <input type="submit" name="submit" value="Login" class="button">
            </form>
            <?php
                if(isset($_POST['submit'])){
                    session_start();
                    include 'db.php';

                    $email = mysqli_real_escape_string($conn, $_POST['email']);
                    $pass = mysqli_real_escape_string($conn,$_POST['pass']);

                   $cek = mysqli_query($conn, "SELECT * FROM tb_pelanggan WHERE email_pelanggan = '".$email."'AND password_pelanggan = '".$pass."'");
                   if(mysqli_num_rows ($cek) > 0){
                    $d = mysqli_fetch_object($cek);
                    $_SESSION['status_login'] = true;
                    $_SESSION['a_global'] = $d;
                    $_SESSION['a_id'] = $d ->user_id;
                        echo '<script>window.location="halamanpelanggan.php"</script>';
                   }else{
                        echo '<script>alert("username atau password anda salah atau tidak terdaftar di database lacol.com")</script>';
                   }
            }
            ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>