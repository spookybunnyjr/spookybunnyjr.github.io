<?php
    include'db.php';
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
            <h1><a href="index.php">LACOL</a></h1>
            <ul>
                <li><a href="produk.php">Produk</a></li>
            </ul>
            </div>
        </header>

        <!--search-->
        <div class="search">
            <div class="container">
                <form action="produk.php">
                    <input type="text" name="search" placeholder="Cari Produk">
                    <input type="submit" name="cari" value="cari produk">
                </form>
            </div>
        </div>
        <!--category-->
        <div class="section">
            <div class="container">
                <h3>Kategori</h3>
                <div class ="box">
                    <?php
                        $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                        if(mysqli_num_rows($kategori) > 0 ){
                            while($k = mysqli_fetch_array($kategori)){
                    ?>
                            <a href="produk.php?kat=<?php echo $k['category_id']?>">
                            <div class="col-5">
                                <img src="img/index.png" width="50px" style="margin-bottom: 5px;">
                                <p><?php echo $k['category_name']?></p>
                            </div>
                            </a>
                    <?php }} else { ?>
                        <p>Kategori Tidak Ditemukan</p>
                        <?php } ?>
                </div>
            </div>
        </div>
        <!--new produk-->
        <div class="section">
            <div class="container">
                <h3>Produk Baru</h3>
                <div class="box">
                    <?php 
                        $produk = mysqli_query($conn, "SELECT * FROM tb_product ORDER BY product_id  DESC LIMIT 8");
                        if(mysqli_num_rows($produk) > 0){
                            while($p = mysqli_fetch_array($produk)){

                    ?>
                    <a href="detail-produk.php?id=<?php echo $p['product_id'] ?>">
                            <div class="col-4">
                                <img src="produk/<?php echo $p['product_image']?>">
                                <p class="nama"><?php echo $p['product_name']?></p>
                                <p class="harga">Rp. <?php echo $p['product_price']?></p>
                            </div>
                        </a>
                        <?php }}else{ ?>
                            <p>Produk Tidak Ada</p>
                        <?php } ?>
                </div>
            </div>
        </div>

        <!--footer-->
        <div class="footer">
            <div class="container">
                <h4>TIM PENGEMBANG</h4>
                <p>Nur Habibie IK, Faiq Bayu R, Mutafaqih KR, Erika Agung S, Nadya Sadira V</p>
                <small>Copyright &copy; 2022 - LACOL</small>
            </div>
        </div>
    </body>
</html>