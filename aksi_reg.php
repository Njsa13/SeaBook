<?php
include 'koneksi.php';
$sql = sprintf(
    "insert into user(nama, email, password) values ('%s', '%s', '%s')",
    $_POST['nama'],
    $_POST['email'],
    $_POST['password'],
);

if (mysqli_query($link, $sql)) {
    header('location:tampil_data.php');
} else {
    header('location:form_tambah.php');
}