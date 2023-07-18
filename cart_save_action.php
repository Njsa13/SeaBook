<?php
session_start();
if (isset($_SESSION['email'])) {	
	if (isset($_GET['id'])) {
		include 'lib/connection.php';

		$id_buku = $_GET['id'];
		$harga = $_GET['harga'];

		$email = $_SESSION['email'];
		$query = "SELECT id_user FROM user WHERE email = '$email';";
		$result = mysqli_query($link, $query);
		$data = mysqli_fetch_assoc($result);
		$id_user = $data['id_user'];

		$query = "SELECT id_buku FROM user LEFT JOIN keranjang ON keranjang.id_user = user.id_user WHERE email = '$email' AND keranjang.id_transaksi IS NULL AND keranjang.id_buku = '$id_buku';";
		$result = mysqli_query($link, $query);

		if (mysqli_num_rows($result)==0) {
			$query = "INSERT INTO keranjang (jumlah_buku, harga_beli, id_user, id_buku) VALUES (1, '$harga', '$id_user', '$id_buku');";
			$result = mysqli_query($link, $query);

			if ($result) {
				header('location: shopping_cart.php');
			} else {
				echo 'Gagal Memasukan';
			}
		} else {
			header('location: shopping_cart.php');
		}

	} else {
		echo 'Invalid parameter id';
	}
} else {
	header('location: login.php');
}
?>