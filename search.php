<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Search</title>
	<?php
	include 'css/link_user.php';
	?>
</head>
<body class="d-flex flex-column" style="min-height: 39.05rem;">
	<?php
	include 'layout/user_header.php';
	include 'lib/connection.php';

	$header = '';
	if (isset($_GET['kat'])) {
		$kategori = $_GET['kat'];
		if ($kategori == 'Best') {
			$header = 'Best Seller';
			$query = "SELECT gambar, judul_buku, harga, penulis, buku.id_buku FROM keranjang RIGHT JOIN transaksi ON keranjang.id_transaksi=transaksi.id_transaksi LEFT JOIN buku ON keranjang.id_buku=buku.id_buku GROUP BY buku.id_buku ORDER BY SUM(jumlah_buku) DESC;";
		} else {
			$header = 'Kategori: '.$kategori;
			$query = "SELECT * FROM buku WHERE kategori = '".$kategori."' ORDER BY RAND()";
		}
	} else if (isset($_GET['search'])) {
		$search = $_GET['search'];
		if ($search == '') {
			$query = "SELECT * FROM buku;";
		} else {
			$query = "SELECT * FROM buku WHERE judul_buku LIKE '%$search%' ORDER BY RAND()";
		}
		$header = 'Hasil Search: '.$search;
	} else {}

	$empty = true;
	$result = mysqli_query($link, $query);
	if (mysqli_num_rows($result)==0) {
		$empty = false;
	}
	?>
	<br><br>
	<section class="content mt-5 mb-5 flex-grow-1">
		<div class="container">
			<h5 class="rak mb-4"><?php echo $header; ?></h5>
			<div class="row">
	              <?php 
	              if ($empty) {
	              while ($row = mysqli_fetch_assoc($result)) { ?>
	              <div class="col-lg-2 col-6 mb-4">
	                <a href="detail.php?id=<?php echo $row['id_buku'] ?>">
	                  <div class="card">
	                    <img src="
	                    <?php
	                    if (($row['gambar'] == NULL)||($row['gambar']=='../assets/img/buku/')) {
	                        echo 'assets/img/buku/def.png';
	                    } else {
	                        $url = str_replace("../", "", $row['gambar']);
	                        echo $url;
	                    }
	                    ?>
	                    " class="card-img-top" width="164px">
	                    <div class="card-body">
	                      <p class="writter shorten-text"><?php echo $row['penulis']; ?></p>
	                      <p class="card-text book-title shorten-text" style="font-size: 14px;"><?php echo $row['judul_buku']; ?></p>
	                      <p class="price text-primary" style="font-size: 14px;">Rp <?php echo number_format($row['harga'], 0, ",", "."); ?></p>
	                    </div>
	                  </div>
	                </a>
	              </div>
	              <?php } } else {
	              	echo '
		              <div class="justify-content-center d-flex">
		                <img src="assets/img/nodata.png" class="mt-5" width="360px">
		              </div>
		            ';
	              }?>
	        </div>
		</div>
	</section>

    <?php include 'layout/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
      const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
      const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>
</html>