<?php
session_start();
if (!empty($_SESSION['status'])) {
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konfirmasi Pembayaran</title>
    <?php
    include "../css/link.php";
    ?>
  </head>
  <body class="d-flex flex-column" style="min-height: 39.09rem;">
    <?php
    include "../layout/admin_header.php";
    ?>
    <br><br>
    <section class="mt-5 flex-grow-1 shift-main">
        <div class="container table-responsive">
          <span>Klik tombol <span class="btn btn-primary" style="--bs-btn-padding-y: .10rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .70rem;">Konfirmasi</span> untuk mengonfirmasi pembayaran buku, & tombol <span class="btn btn-warning" style="--bs-btn-padding-y: .10rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .70rem;">Konfirmasi</span> untuk mengonfirmasi pengemasan buku.</span>
          <?php
            include "../lib/connection.php";

            $sql = "SELECT DISTINCT(transaksi.id_transaksi), nama, email, virtual_account, SUM(harga_beli * jumlah_buku) AS total_harga, tanggal_transaksi, waktu_transaksi, status_transaksi FROM transaksi LEFT JOIN pembayaran USING(id_transaksi) LEFT JOIN keranjang USING(id_transaksi) LEFT JOIN user ON user.id_user=keranjang.id_user GROUP BY id_transaksi ORDER BY transaksi.id_transaksi DESC;";

            $result = mysqli_query($link, $sql);
            ?>
          <table class="table table-bordered shadow-sm mt-4">
            <thead>
              <tr class="table-info">
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Virtual Account</th>
                <th>Tanggal Transaksi</th>
                <th>Total Harga</th>
                <th>Waktu Transaksi</th>
                <th>Status Transaksi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = mysqli_fetch_assoc($result)) { ?>
              <tr>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['virtual_account']; ?></td>
                <td><?php echo $row['tanggal_transaksi']; ?></td>
                <td><?php echo $row['total_harga']; ?></td>
                <td><?php echo $row['waktu_transaksi']; ?></td>
                <td><?php echo $row['status_transaksi']; ?></td>
                <td>
                  <?php
                    $link = 'confirm_action.php?id='.$row['id_transaksi'].'&status='.$row['status_transaksi'];

                    if ($row['status_transaksi']=='Menunggu') {
                      echo '<a href="'.$link.'" class="btn btn-primary btn-sm">Konfirmasi</a>';
                    } else if ($row['status_transaksi']=='Dikemas') {
                      echo '<a href="'.$link.'" class="btn btn-warning btn-sm">Konfirmasi</a>';
                    } else {
                      echo "----";
                    }
                  ?>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
    </section>
    <?php
    include "../layout/footer.php";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>

<?php
} else {
  header('location: index.php');
}
?>