<?php
if (isset($_POST['email'])&&isset($_POST['password'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	include 'lib/connection.php';

	$query = "SELECT * FROM user WHERE email = '$email' AND password = '$password';";
	$result = mysqli_query($link, $query);
	session_start();
	if ($result) {
		if (mysqli_num_rows($result) == 1) {
			$_SESSION['email'] = $email;
			$_SESSION['alert'] = NULL;
			header('location: dashboard.php');
		} else {
			$_SESSION['alert'] = 'gagal';
			header('location: login.php');
		}
	} else {
		$_SESSION['alert'] = 'gagal';
		header('location: login.php');
	}
} else {
	echo "Invalid parameter";
}
mysqli_close($link);
?>