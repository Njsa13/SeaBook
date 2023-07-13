<?php
// Lakukan validasi dan sanitasi data yang diterima dari permintaan AJAX
$transaksiId = $_POST['id_transaksi'];

// Lakukan koneksi ke database dan jalankan query UPDATE untuk memperbarui status transaksi
include 'lib/connection.php';

$statusBaru = 'Sampai'; // Status baru yang ingin diupdate
$queryUpdate = "UPDATE transaksi SET status_transaksi = '$statusBaru' WHERE id_transaksi = '$transaksiId'";
$resultUpdate = mysqli_query($link, $queryUpdate);

if ($resultUpdate) {
  // Berhasil memperbarui status transaksi
  echo "Status transaksi berhasil diperbarui menjadi 'Sampai'";
} else {
  // Gagal memperbarui status transaksi
  echo "Gagal memperbarui status transaksi";
}
?>
