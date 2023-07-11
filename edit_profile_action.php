<?php
if (isset($_POST['email'])) {
	include 'lib/connection.php';

	$name = $_POST['name'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$tanggal_lahir = date("Y-m-d", strtotime($_POST['birthdate']));
	$nomor_telepon = $_POST['notelp'];
	$email = $_POST['email'];

	$query = "UPDATE user SET  nama='$name', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', nomor_telepon = '$nomor_telepon' WHERE email='$email';";

	$result = mysqli_query($link, $query);
	session_start();
	if ($result) {
		$_SESSION['alert'] = 'berhasil';
		header('location: profile.php');
	} else {
		echo "Gagal Menambahkan";
	}
} else {
	echo "Invalid parameter";
}
mysqli_close($link);
?>