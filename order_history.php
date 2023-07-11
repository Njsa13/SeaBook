<?php
session_start();
if (!empty($_SESSION['email'])) {
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesanan</title>
    <?php
    include 'css/link_user.php';
    ?>
</head>
<body>
    <?php
    include 'layout/user_header.php';
    ?>
    <br><br>
    <section class="profile-menu">
        <div class="container mt-5">
            <div class="row justify-content-around">
                <?php
                include 'layout/menu_profile.php';
                include 'lib/connection.php';

                $email = $_SESSION['email'];
                $query = "SELECT transaksi.id_transaksi, SUM(harga_beli * jumlah_buku) + biaya_kirim AS total_harga, tanggal_transaksi, waktu_transaksi, virtual_account, alamat, metode_pengiriman, biaya_kirim, status_transaksi FROM transaksi LEFT JOIN pembayaran USING(id_transaksi) LEFT JOIN keranjang USING(id_transaksi) LEFT JOIN user ON user.id_user=keranjang.id_user WHERE email = '$email' GROUP BY id_transaksi ORDER BY tanggal_transaksi DESC;";

                $result = mysqli_query($link, $query);
                ?>
                <div class="col-lg-6 mb-5 mb-lg-0 col-10">
                    <h1 class="mb-4">Pesanan</h1>
                    <div class="accordion" id="accordionExample">
                      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $row['id_transaksi'] ?>" aria-expanded="true" aria-controls="<?php echo $row['id_transaksi'] ?>">
                                <div class="col-3">
                                    <strong class="ms-3" style="font-size: 14px;"><?php echo date("d-m-Y", strtotime($row['tanggal_transaksi'])); ?></strong>
                                </div>
                                <div class="col-3">
                                    <span style="font-size: 12px; color: #2FA0D0;" class="ms-4"><?php echo $row['waktu_transaksi']; ?></span>
                                </div> 
                                <div class="col">
                                    <span style="font-size: 12px;" class="ms-1">No. VA : <?php echo $row['virtual_account']; ?></span>  
                                </div> 
                                
                                
                                
                          </button>
                        </h2>

                        <div id="<?php echo $row['id_transaksi'] ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <?php
                            $id_transaksi = $row['id_transaksi'];
                            $query2 = "SELECT judul_buku, harga, gambar, jumlah_buku FROM transaksi LEFT JOIN keranjang USING(id_transaksi) LEFT JOIN buku USING(id_buku) WHERE transaksi.id_transaksi = '$id_transaksi';";
                            $result2 = mysqli_query($link, $query2);
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                            ?>
                            <div class="row">
                                <div class="col-2 ms-3">
                                    <img src="
                                    <?php
                                    if (($row2['gambar'] == NULL)||($row2['gambar']=='../assets/img/buku/')) {
                                        echo 'assets/img/buku/def.png';
                                    } else {
                                        $url = str_replace("../", "", $row2['gambar']);
                                        echo $url;
                                    }
                                    ?>
                                    " width="50px">
                                </div>
                                <div class="col">
                                    <strong style="font-size: 13px;"><?php if (strlen($row2['judul_buku']) > 32) {
                                        echo substr($row2['judul_buku'], 0, 32).'...'; 
                                      } else {
                                        echo $row2['judul_buku']; 
                                      } 
                                    ?></strong><br>
                                    <span style="font-size: 13px;">Rp. <?php echo number_format($row2['harga'], 0, ",", "."); ?></span><br>
                                    <span style="font-size: 13px;">Jumlah : <?php echo $row2['jumlah_buku']; ?></span>
                                </div>
                                <div class="col text-end me-3">
                                    <span style="font-size: 13px; color: #2FA0D0;">Rp. <?php echo number_format($row2['harga']*$row2['jumlah_buku'], 0, ",", "."); ?></span>
                                </div>
                            </div>
                            <hr>
                            <?php } ?>
                            <div class="row border-top mt-3 pt-3">
                                <div class="col">
                                    <strong style="font-size: 13px;" class="ms-3"><?php echo $row['metode_pengiriman']; ?></strong>
                                    <span style="font-size: 13px;" class="ms-2">: Rp. <?php echo number_format($row['biaya_kirim'], 0, ",", "."); ?></span>
                                </div>
                                <div class="col text-end">
                                    <strong style="font-size: 13px;" class="me-2">Total</strong>
                                    <span style="font-size: 13px;" class="me-3">: Rp. <?php echo number_format($row['total_harga'], 0, ",", "."); ?></span>
                                </div>
                            </div>
                            <div class="row border-top mt-3 pt-3 px-3">
                                <div class="col d-grid gap-2">
                                    <span style="font-size: 13px;">Alamat Pengiriman : <?php echo $row['alamat']; ?></span>
                                </div>
                            </div>
                            <div class="row border-top mt-3 pt-3">
                                <div class="col d-grid gap-2">
                                    <?php
                                    if ($row['status_transaksi']=='Menunggu') {
                                        echo '<span class="btn btn-warning">'.$row['status_transaksi'].'</span>';
                                    } elseif ($row['status_transaksi']=='Dikemas') {
                                        echo '<span class="btn btn-info">'.$row['status_transaksi'].'</span>';
                                    } elseif ($row['status_transaksi']=='Dikirim') {
                                        echo '<a href="order_confirm.php?status_transaksi=Sampai" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"data-bs-title="Tekan Untuk Konfirmasi Bahwa Paket Sudah Sampai">'.$row['status_transaksi'].'</a>';
                                    } else {
                                        echo '<span class="btn btn-success">'.$row['status_transaksi'].'</span>';
                                    }
                                    ?>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>
</html>

<?php
} else {
  header('location: index.php');
}
?>