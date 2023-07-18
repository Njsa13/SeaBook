<?php
	if (isset($_POST['alamat'])) {
		session_start();
		include 'lib/connection.php';

		$query = "SELECT MAX(id_transaksi)+1 AS id_new FROM transaksi;";
		$result = mysqli_query($link, $query);
		$data = mysqli_fetch_assoc($result);
		$id_new = $data['id_new'];

		$email = $_SESSION['email'];
		$query = "SELECT id_user FROM user WHERE email = '$email';";
		$result = mysqli_query($link, $query);
		$data = mysqli_fetch_assoc($result);
		$id_user = $data['id_user'];
		

		$alamat = $_POST['alamat'];
		$metodeKirim = $_POST['metodeKirim'];
		$metodeBayar = $_POST['metodeBayar'];
		$biayaKirim = $_POST['biayaKirim'];
		$tanggal_transaksi = date("Y-m-d");
		$waktu_transaksi = date("H:i:s");
		$virtual_account = $_POST['virtual_account'];
		$query = "INSERT INTO transaksi (id_transaksi, alamat, tanggal_transaksi, waktu_transaksi, metode_pengiriman, biaya_kirim) VALUES ('$id_new', '$alamat', '$tanggal_transaksi', '$waktu_transaksi', '$metodeKirim', '$biayaKirim');";
		mysqli_query($link, $query);

		$query = "INSERT INTO pembayaran (metode_pembayaran, tanggal_pembayaran, waktu_pembayaran, virtual_account, id_transaksi) VALUES ('$metodeBayar', '$tanggal_transaksi', '$waktu_transaksi', '$virtual_account', '$id_new')";
		mysqli_query($link, $query);
		

		if (isset($_GET['id'])) {
			$id_buku = $_GET['id'];
			$harga = $_GET['harga'];

			$query = "SELECT * FROM buku WHERE id_buku = '$id_buku';";
			$result = mysqli_query($link, $query);
			$data = mysqli_fetch_assoc($result);
			$stok_buku = $data['stok_buku'];
			$new_stok = $stok_buku - 1;

			$query = "INSERT INTO keranjang (jumlah_buku, harga_beli, id_user, id_buku) VALUES (1, '$harga', '$id_user', '$id_buku');";
			mysqli_query($link, $query);

			$query = "UPDATE keranjang SET id_transaksi = '$id_new' WHERE id_transaksi IS NULL AND id_user = '$id_user' AND id_buku = '$id_buku';";
			mysqli_query($link, $query);

			$query = "UPDATE buku SET stok_buku = '$new_stok' WHERE id_buku = '$id_buku';";
			mysqli_query($link, $query);

			header('location: order_history.php');
		}

		$query = "SELECT id_transaksi, stok_buku, jumlah_buku, id_buku FROM keranjang LEFT JOIN buku USING(id_buku) WHERE id_transaksi IS NULL AND id_user = '$id_user';";
		$result = mysqli_query($link, $query);

		$row = mysqli_fetch_assoc($result);
		$query1 = "UPDATE keranjang SET id_transaksi = '$id_new' WHERE id_transaksi IS NULL AND id_user = '$id_user';"; 
		mysqli_query($link, $query1);

		while ($row = mysqli_fetch_assoc($result)) {
			$id_buku = $row['id_buku'];
			$stok_buku = $row['stok_buku'];
			$jumlah_buku = $row['jumlah_buku'];
			$new_stok = $stok_buku - $jumlah_buku;
			$query1 = "UPDATE buku SET stok_buku = '$new_stok' WHERE id_buku = '$id_buku';";
			mysqli_query($link, $query1);
		}

		header('location: order_history.php');

	}
?>