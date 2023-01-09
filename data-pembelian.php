<!DOCTYPE html>
<html lang="en">
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
<table border="1" cellspacing="0" class="table">
                    <thead>
                        <?php $GET=$conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan");?>
                        <?php while ($conn = $GET ->fetch_assoc()){ ?>
                        <tr>
                            <th width="60px">No</th>
                            <th><?php echo $pecah['nama_pelanggan']; ?></th>
                            <th><?php echo $pecah ['tanggal_pembelian']; ?></th>
                            <th><?php echo $pecah ['total_pembelian']; ?></th>
                            <th width="150px">
                                <a href="" class="btn btn-info">Detail info</a>
                            </th>
                        </tr>
                        <?php } ?>
                    </thead>
</body>
</html>