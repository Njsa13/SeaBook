<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <?php
    include 'css/link_user.php';
    ?>
  <body>
    <?php
    include 'layout/user_header.php';
    ?>

    <!-- Jumbotron -->
    <div class="jumbotron mt-5 pt-5 bg-secondary-subtle">
      <div class="container mt-3">
        <div class="row">
          <div class="col-lg-6 text-center text-lg-start">
            <h1 class="text-primary">SeaBook</h1>
            <p class="lead">Selamat Datang di SeaBook, Toko Buku Online</p>
            <hr class="my-4">
            <p>Pilih dan Beli Buku Pilihanmu Hanya Disini.</p>
            <a class="btn mt-2 btn-primary btn-lg rounded-5" href="#content" role="button">
              Beli Sekarang
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="ms-1 bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
              </svg>
            </a>
          </div>
          <div class="col-lg-6 d-none d-lg-block">
              <img class="mt-5" src="assets/img/StackBook.png" width="500px" alt="Book">
          </div>
        </div>
      </div>
    </div>

    <?php
    include "lib/connection.php";

    $query = "SELECT * FROM buku WHERE kategori = 'Fiksi';";
    $result = mysqli_query($link, $query);
    ?>

    <section class="content mt-5 mb-5" id="content">
      <!-- Rak Buku 1 -->
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="row justify-content-between">
              <div class="col-lg-2 col-5">
                <h5 class="rak">Buku Fiksi</h5>
              </div>
              <div class="col-lg-2 col-5">
                <a href="" class="more">
                  Lebih Banyak 
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                  </svg>
                </a>
              </div>
            </div>
            <div class="row">
              <?php while ($row = mysqli_fetch_assoc($result)) { ?>
              <div class="col-lg-2 col-6 mb-4">
                <a href="">
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
                      <p class="writter"><?php
                      if (strlen($row['penulis']) > 14) {
                        echo substr($row['penulis'], 0, 14).'...';                   
                      } else {
                        echo $row['penulis'];
                      }
                         
                      ?></p>
                      <p class="card-text book-title"><?php
                      if (strlen($row['judul_buku']) > 14) {
                        echo substr($row['judul_buku'], 0, 14).'...'; 
                      } else {
                        echo $row['judul_buku']; 
                      }
                      ?></p>
                      <p class="price text-primary">Rp <?php echo number_format($row['harga'], 0, ",", "."); ?></p>
                    </div>
                  </div>
                </a>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>

        <?php
        include "lib/connection.php";

        $query = "SELECT gambar, judul_buku, harga, penulis FROM keranjang RIGHT JOIN transaksi ON keranjang.id_transaksi=transaksi.id_transaksi LEFT JOIN buku ON keranjang.id_buku=buku.id_buku GROUP BY buku.id_buku ORDER BY SUM(jumlah_buku) DESC LIMIT 6;";
        $result = mysqli_query($link, $query);
        ?>

        <!-- Rak Buku 2 -->
        <div class="row mt-5">
          <div class="col">
            <div class="row justify-content-between">
              <div class="col-lg-2 col-5">
                <h5 class="rak">Best Seller</h5>
              </div>
              <div class="col-lg-2 col-5">
                <a href="" class="more">
                  Lebih Banyak 
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                  </svg>
                </a>
              </div>
            </div>
            <div class="row">
              <?php while ($row = mysqli_fetch_assoc($result)) { ?>
              <div class="col-lg-2 col-6 mb-4">
                <a href="">
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
                      <p class="writter"><?php
                      if (strlen($row['penulis']) > 14) {
                        echo substr($row['penulis'], 0, 14).'...';                   
                      } else {
                        echo $row['penulis'];
                      }
                         
                      ?></p>
                      <p class="card-text book-title"><?php
                      if (strlen($row['judul_buku']) > 14) {
                        echo substr($row['judul_buku'], 0, 14).'...'; 
                      } else {
                        echo $row['judul_buku']; 
                      }
                      ?></p>
                      <p class="price text-primary">Rp <?php echo number_format($row['harga'], 0, ",", "."); ?></p>
                    </div>
                  </div>
                </a>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer class="pt-3 pb-1 text-center">
        <div class="container">
            <p>&copy; 2023 PT. SeaBook</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
  </body>
</html>