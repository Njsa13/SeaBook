<?php
session_start();
if (!empty($_SESSION['email'])) {
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Keranjang</title>
    <?php
    include 'css/link_user.php';
    ?>
  </head>
  <body class="d-flex flex-column" style="min-height: 39.05rem;">
    <?php
    include 'layout/user_header.php';
    include 'lib/connection.php';

    $total = 0;
    $buku_habis = array();
    $email = $_SESSION['email'];
    $query = "SELECT keranjang.id_buku, id_keranjang, gambar, judul_buku, harga, jumlah_buku*harga AS subtotal, jumlah_buku, stok_buku FROM keranjang LEFT JOIN buku USING(id_buku) LEFT JOIN user USING(id_user) WHERE email = '$email' AND id_transaksi IS NULL;";
    $result = mysqli_query($link, $query);
    ?>
    <br><br>
    <section class="cart flex-grow-1">
      <div class="container mt-5">
        <div class="row mb-4">
          <div class="col-11 col-lg-12 ms-3">
            <h5 class="fw-bold">Keranjang Belanja</h5>
          </div>
        </div>

        <div class="row justify-content-around">
          <div class="col-11 col-lg-8 mb-5">
            <?php
              if (mysqli_num_rows($result)!=0) {
              while ($row = mysqli_fetch_assoc($result)) { 
              $total = $total + $row['subtotal'];
                if ($row['stok_buku'] < $row['jumlah_buku']) {
                  $buku_habis[] = $row['judul_buku'];
                }
            ?>
            <div class="row mb-3">
              <div class="card border border-0">
                <div class="card-body d-flex justify-content-between">
                  <div class="col-2 me-2">
                    <img src="
                    <?php
                    if (($row['gambar'] == NULL)||($row['gambar']=='../assets/img/buku/')) {
                        echo 'assets/img/buku/def.png';
                    } else {
                        $url = str_replace("../", "", $row['gambar']);
                        echo $url;
                    }
                    ?>
                    " width="50px">
                  </div>
                  <div class="col-3 col-lg-4 d-flex flex-column me-lg-5 me-3">
                    <a href="detail.php?id=<?php echo $row['id_buku']; ?>" style="text-decoration: none;">
                      <strong class="mb-1 shorten-text" style="font-size: 12px;"><?php
                          echo $row['judul_buku']; 
                      ?></strong>
                    </a>
                    <span class="mb-1 harga" style="font-size: 12px;">Rp. <?php echo number_format($row['harga'], 0, ",", "."); ?></span>
                    <span style="font-size: 12px; color: #2FA0D0;" class="subtotal" data-harga="<?php echo $row['harga']; ?>">Rp. <?php echo number_format($row['subtotal'], 0, ",", "."); ?></span>
                  </div>
                  <div class="col-lg-3 col-5 d-flex align-items-center me-1 me-lg-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" data-id="<?php echo $row['id_keranjang']; ?>" class="minus bi bi-dash-circle-fill <?php echo 'minus'.$row['id_keranjang']; ?>" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"/>
                    </svg>
                    <input type="text" id="<?php echo 'counter'.$row['id_keranjang']; ?>" name="qty" class="form-control counter ms-2 me-2" value="<?php echo $row['jumlah_buku']; ?>" disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" data-id="<?php echo $row['id_keranjang']; ?>" class="me-3 plus bi bi-plus-circle-fill <?php echo 'plus'.$row['id_keranjang']; ?>" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                    </svg>
                  </div>
                  <div class="col-lg-2 col-1 d-flex align-items-center justify-content-center">
                    <a href="delete_cart_action.php?id=<?php echo $row['id_keranjang']; ?>" style="color: black;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <?php } } else
            echo '
              <div class="justify-content-center d-flex">
                <img src="assets/img/nodata.png" class="mt-5" width="360px">
              </div>
            ';
            ?>
          </div>
          <div class="col-8 col-lg-3 mb-4">
            <div class="card border border-0 mb-5">
              <div class="card-body mt-3 text-center">
                <h5>Total Harga</h5>
                <hr>
                <h5 class="text-info mb-3 totalHarga">Rp. <?php echo number_format($total, 0, ",", "."); ?></h5>
                <a href="checkout.php" class="btn btn-primary 
                <?php
                if (($total == 0)||!empty($buku_habis)) {
                  echo 'disabled';
                }
                ?>
                ">Bayar Sekarang</a>
              </div>
            </div>
            <?php if (!empty($buku_habis)) { ?>
            <div class="alert alert-danger text-center">
              <strong style="color: black;">Perhatian!</strong>
              <span> Stok Terbatas</span><br><br>
              <?php
              $tanda = '<strong style="color: black;">Judul Buku : </strong>';
              foreach ($buku_habis as $value) {
                echo '<span>'.$tanda.$value.'</span>';
                $tanda = ', ';
              }
              ?>
            </div>
            <?php } else {echo '';} ?>
          </div>
        </div>

      </div>
    </section>
    <?php include 'layout/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script>
      const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
      const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

      $(document).on('click', '.plus, .minus', function() {
        var button = $(this);
        var id = button.data('id');
        var action = button.hasClass('plus') ? 'plus' : 'minus';
        var counter = button.siblings('.counter');
        var harga = button.closest('.card-body').find('.subtotal').data('harga');
        var subtotalElement = button.closest('.card-body').find('.subtotal');
        var totalHargaElement = $('.totalHarga');

        var newValue = parseInt(counter.val());
        var oldValue = newValue;
        if (action === 'plus') {
          newValue = newValue < 15 ? newValue + 1 : newValue;
        } else if (action === 'minus') {
          newValue = newValue > 1 ? newValue - 1 : newValue;
        }
        counter.val(newValue);

        var newSubtotal = harga * newValue;
        subtotalElement.text('Rp. ' + newSubtotal.toLocaleString('id-ID'));

        var newTotalHarga = 0;
        $('.subtotal').each(function() {
          newTotalHarga += parseInt($(this).text().replace(/[^\d]/g, ''));
        });

        totalHargaElement.text('Rp. ' + newTotalHarga.toLocaleString('id-ID'));
        
        $.ajax({
          url: 'update_cart.php',
          method: 'POST',
          data: { id: id, newValue: newValue },
          success: function(response) {
            if (response === 'success') {
              if (((oldValue!=1)&&(action==='minus'))||((oldValue!=15)&&(action==='plus'))) {
                setTimeout(function() {
                  location.reload();
                }, 1000);
              }
                
            } else {
              console.log('Error:', response);
            }
          },
          error: function(xhr, status, error) {
            console.log('AJAX Error:', error);
          }
        });
      });


    </script>

  </body>
</html>

<?php
} else {
  header('location: login.php');
}
?>