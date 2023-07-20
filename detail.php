<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <?php
    include 'lib/connection.php';

    $id_buku = $_GET['id'];
    $query = "SELECT * FROM buku WHERE id_buku = '$id_buku';";
    $result = mysqli_query($link, $query);
    $data = mysqli_fetch_assoc($result);

    $stok_buku = $data['stok_buku'];
    $disabled = '';
    $ket_stok= '';

    if ($stok_buku < 1) {
      $disabled = 'disabled';
      $ket_stok = '<div class="alert alert-danger text-center"><strong>Perhatian!</strong> Stok buku habis</div>';
    }
  ?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $data['judul_buku']; ?></title>
    <?php
      include 'css/link_user.php';
    ?>
    <style>
      .buku .card {
          box-shadow: 0px 0px 10px rgba(0, 0, 0, .15);
      }

      .book-title, .description {
        font-weight: 900;
        letter-spacing: 3px;
      }
    </style>
  </head>
  <body class="d-flex flex-column" style="min-height: 39.05rem;">
    <?php
      include 'layout/user_header.php';
    ?>
    <br><br>
    <section class="buku mt-5 mb-5 flex-grow-1">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-3 col-7 me-4 mb-5">
            <div class="card border border-0">
              <div class="card-body">
                <img src="
                <?php
                  if (($data['gambar'] == NULL)||($data['gambar']=='../assets/img/buku/')) {
                      echo 'assets/img/buku/def.png';
                  } else {
                      $url = str_replace("../", "", $data['gambar']);
                      echo $url;
                  }
                ?>" width="100%">
              </div>
            </div>
          </div>
          <div class="col-lg-5 col-10">
            <h5 class="writter" style="font-size: 20px;"><?php echo $data['penulis']; ?></h5>
            <h3 class="book-title mt-2"><?php echo $data['judul_buku']; ?></h3>
            <div class="row mt-4">
              <?php echo $ket_stok; ?>
              <div class="col-6 d-grid gap-2">
              <a href="checkout.php?id=<?php echo $id_buku.'&harga='.$data['harga']; ?>" class="btn btn-primary <?php echo $disabled; ?>">Beli Rp <?php echo number_format($data['harga'], 0, ",", "."); ?></a>
              </div>
              <div class="col-6 d-grid gap-2">
              <a href="cart_save_action.php?id=<?php echo $id_buku.'&harga='.$data['harga']; ?>" class="btn btn-outline-primary <?php echo $disabled; ?>">Keranjang</a>
              </div>
            </div>
            <div class="row mt-4">
              <h4 class="description">Deskripsi Buku</h4>
              <p style="font-family: 'Verdana'; font-size: 14px; text-align: justify;">
                <?php
                if ($data['deskripsi'] == '') {
                  echo '.............';
                } else {
                  echo $data['deskripsi'];
                }
                ?>
              </p>
            </div>
            <div class="row mt-5">
              <div class="col">
                <span style="font-size: 12px;">Tanggal Terbit</span>
                <p><?php echo date("d-m-Y", strtotime($data['tanggal_terbit'])); ?></p>
                <span style="font-size: 12px;">Kategori</span>
                <p><?php echo $data['kategori']; ?></p>
              </div>
              <div class="col">
                <span style="font-size: 12px;">Penerbit</span>
                <p><?php echo $data['penerbit']; ?></p>
                <span style="font-size: 12px;">Bahasa</span>
                <p><?php echo $data['bahasa']; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php
    include 'layout/footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
      const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
      const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
  </body>
</html>