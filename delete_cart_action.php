<?php
if (isset($_GET['id'])) {
	$id_keranjang = $_GET['id'];

	include "lib/connection.php";

	$query = "DELETE FROM keranjang WHERE id_keranjang = '$id_keranjang'";
	if (mysqli_query($link, $query)) {
		header('location: shopping_cart.php');
	} else {
		echo 'Gagal Menghapus';
	}
} else {
	echo "Invalid ID parameter.";
}
?>