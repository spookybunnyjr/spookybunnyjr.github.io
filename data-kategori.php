<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }
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
            <h1><a href="">LACOL | CATEGORY</a></h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profile.php">Profil</a></li>
                <li><a href="data-kategori.php">Data Kategori</a></li>
                <li><a href="data-produk.php">Data Produk</a></li>
                <li><a href="data-pembelian.php">Data Pembelian</a></li>
                <li><a href="keluar.php">Keluar</a></li>
            </ul>
            </div>
        </header>
        <!--konten-->
        <div class="section">
            <div class="container">
                <h3>Data Kategori</h3>
                <div class="Box">
                    <div class ="btn"><a href="tambah-data.php">Tambah Data</a></div>
                  <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Kategori</th>
                            <th width="150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                            if(mysqli_num_rows($kategori) > 0){
                            while($row = mysqli_fetch_array($kategori)){
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row ['category_name']?></td>
                            <td>
                                <a href="edit-kategori.php?id=<?php echo $row['category_id'] ?>">edit</a> || <a href="proses-hapus.php?idk=<?php echo $row['category_id']?>" onclick="return confirm('yakin ingin menghapus data ini ?')">hapus</a>
                            </td>
                        </tr>
                        <?php } } else { ?>
                            <tr>
                                <td colspan="3"> Tidak Ada Data Untuk Saat Ini</td>
                            </tr>
                            <?php } ?>
                    </tbody>
                  </table>
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