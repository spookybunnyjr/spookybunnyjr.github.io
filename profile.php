<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE addmin_id = '".$_SESSION['id']'');
    $d = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LACOL</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <!--header-->
        <header>
            <div class="container">
            <h1><a href="">LACOL</a></h1>
            <ul>
                <li><a href="dashboard.php">Home</a></a></li>
                <li><a href="profile.php">Profil</a></li>
                <li><a href="data-kategori.php">Data Kategori</a></li>
                <li><a href="data-produk.php">Data Produk</a></li>
                <li><a href="keluar.php">Keluar</a></li>
            </ul>
            </div>
        </header>
        <!--konten-->
        <div class="section">
            <div class="container">
                <h3>Dashboard</h3>
                <div class="Box">
                    <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->admin_name?>">
                    <input type="text" name="user" placeholder="Username" class="input-control"<?php echo $d->username ?> required>
                    <input type="text" name="Hp" placeholder="No Hp" class="input-control"<?php echo $d->admin_tlp ?> required>
                    <input type="email" name="email" placeholder="Email" class="input-control" <?php echo $d->admin_email ?>required>
                    <input type="text" name="alamat" placeholder="alamat" class="input-control"<?php echo $d->admin_address ?> required>
                    <input type="submit" name="submit" value="ubah profil" class="btn">
                    </form>
                    <?php
                    if(isset($_POST['submit'])){
                        $name   = $_POST['nama'];
                        $user   = $_POST['user'];
                        $hp     = $_POST['hp'];
                        $email  = $_POST['email'];
                        $alamat = $_POST['alamat'];

                        $update = mysqli_query($conn, "UPDATE tb_admin SET
                                    admin_name = '".$nama."',
                                    username = '".$user."',
                                    admin_tlp = '".$hp."',
                                    admin_email = '".$email."',
                                    admin_address = '".$alamat."'
                                    WHERE admin_id =  '".$d->admin_id."'");
                                
                            if($update){
                                echo '<script>alert("UBAH DATA BERHASIL BOSS")</script>';
                                echo '<acript>window.location="profile.php"</acript>';
                            }else{
                                echo 'gagal ' .mysqli_error($conn);
                            }
                    }
                    ?>
                </div>
            </div>
        </div>
        <!--Footer-->
        <footer>
            <div class="container">
                <small>Copyright &copy; 2022 - LACOL.COM</small>
            </div>
        </footer>
    </body>
</html>