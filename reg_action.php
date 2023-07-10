<?php
if (isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['password'])) {
	include 'lib/connection.php';

	$email = $_POST['email'];
	$query = "SELECT * FROM user WHERE email='$email';";
	$result = mysqli_query($link, $query);
	session_start();
	if ($result) {
		if (mysqli_num_rows($result) >= 1) {
			$_SESSION['alert'] = 'gagal';
			header('location: reg.php');
		} else {
			$name = $_POST['name'];
			$password = $_POST['password'];

			$query = "INSERT INTO user (nama, email, password) VALUES ('$name', '$email', '$password');";
			$result = mysqli_query($link, $query);

			if ($result) {
				$_SESSION['alert'] = 'daftar';
				header('location: login.php');
			}
		}
	}
} else {
	echo "Invalid parameter";
}
mysqli_close($link);
?>