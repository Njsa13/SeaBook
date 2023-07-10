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
          <h2 class="text-info-emphasis">Daftar Buku dengan jumlah pembelian terbanyak</h2>
          <?php
            include "../lib/connection.php";

            $sql = "SELECT buku.id_buku, judul_buku, harga, SUM(jumlah_buku) AS total_jumlah, SUM(harga_beli * jumlah_buku) AS pendapatan FROM keranjang RIGHT JOIN transaksi ON keranjang.id_transaksi=transaksi.id_transaksi LEFT JOIN buku ON keranjang.id_buku=buku.id_buku GROUP BY buku.id_buku ORDER BY SUM(jumlah_buku) DESC;";

            $result = mysqli_query($link, $sql);
            ?>
          <table class="table table-bordered shadow-sm mt-4">
            <thead>
              <tr class="table-info">
                <th>Judul Buku</th>
                <th>Harga</th>
                <th>Jumlah Terjual</th>
                <th>Pendapatan</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = mysqli_fetch_assoc($result)) { ?>
              <tr>
                <td><?php echo $row['judul_buku']; ?></td>
                <td><?php echo $row['harga']; ?></td>
                <td><?php echo $row['total_jumlah']; ?></td>
                <td><?php echo $row['pendapatan']; ?></td>
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