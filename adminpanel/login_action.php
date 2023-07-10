<?php
if (isset($_POST['username'])&&isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	include '../lib/connection.php';

	$query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password';";
	$result = mysqli_query($link, $query);
	session_start();
	if ($result) {
		if (mysqli_num_rows($result) == 1) {
			$_SESSION['status'] = 'login';
			$_SESSION['username'] = $username;
			$_SESSION['alert'] = NULL;
			header('location: dashboard.php');
		} else {
			$_SESSION['alert'] = 'gagal';
			header('location: index.php');
		}
	} else {
		$_SESSION['alert'] = 'gagal';
		header('location: index.php');
	}
} else {
	echo "Invalid parameter";
}
mysqli_close($link);
?>