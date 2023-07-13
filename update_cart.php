<?php
include 'lib/connection.php';

if (isset($_POST['newValue']) && isset($_POST['id'])) {
  $id = $_POST['id'];
  $newValue = $_POST['newValue'];

  // Periksa apakah ID adalah angka
  if (!is_numeric($id)) {
    die('Invalid ID');
  }

  if (isset($newValue)) {
    $query = "UPDATE keranjang SET jumlah_buku = '$newValue' WHERE id_keranjang = $id";
  } else {
    die('Invalid action');
  }

  // Jalankan query pembaruan
  if (mysqli_query($link, $query)) {
    echo 'success';
  } else {
    echo 'error';
  }
}
?>
