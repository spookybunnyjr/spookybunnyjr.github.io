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
            <h1><a href="">LACOL | PRODUCT</a></h1>
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
                <h3>Data Produk</h3>

                <style>
                .button {
                    background-color: #4CAF50; /* Green */
                    border: none;
                    color: limegreen;
                    padding: 15px 32px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
                    margin: 4px 2px;
                    cursor: pointer;
                    }
                    </style>
                <div class="Box">
                    <p><button><a href="tambah-produk.php">Tambah Data</a></p></button>
                  <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Kategori</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th width="150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_category USING (category_id) ORDER BY product_id DESC");
                            if(mysqli_num_rows($produk) > 0){
                            while($row = mysqli_fetch_array($produk)){
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row ['category_name']?></td>
                            <td><?php echo $row ['product_name']?></td>
                            <td>Rp.<?php echo number_format($row ['product_price'])?></td>
                            <td><?php echo $row ['product_description']?></td>
                            <td><img src="produk/<?php echo $row ['product_image']?>" width="50px"></td>
                            <td><?php echo ($row['product_status'] == 0)? 'Habis': 'Tersedia'?></td>
                            <td>
                                <a href="edit-produk.php?id=<?php echo $row['product_id'] ?>">edit</a> || <a href="proses-hapus.php?idp=<?php echo $row['product_id']?>" onclick="return confirm('yakin ingin menghapus data ini ?')">hapus</a>
                            </td>
                        </tr>
                        <?php }}else{ ?>
                            <tr>
                                <td colspan="8"> Tidak Ada Data</td>
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