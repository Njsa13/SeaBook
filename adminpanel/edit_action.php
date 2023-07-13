<?php
// Koneksi ke database
include "../lib/connection.php";

// Mendapatkan data dari form
$id_buku = $_POST['id_buku'];
$judul_buku = $_POST['judul_buku'];
$penulis = $_POST['penulis'];
$penerbit = $_POST['penerbit'];
$tanggal_terbit = $_POST['tanggal_terbit'];
$kategori = $_POST['kategori'];
$bahasa = $_POST['bahasa'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$stok_buku = $_POST['stok_buku'];

// Update data buku
$sql = "UPDATE buku SET
        judul_buku = '$judul_buku',
        penulis = '$penulis',
        penerbit = '$penerbit',
        tanggal_terbit = '$tanggal_terbit',
        kategori = '$kategori',
        bahasa = '$bahasa',
        harga = '$harga',
        stok_buku = '$stok_buku',
        deskripsi = '$deskripsi'
        WHERE id_buku = '$id_buku'";

// Eksekusi query
if (mysqli_query($link, $sql)) {
    // Jika query berhasil, cek apakah ada file gambar yang diupload
    if ($_FILES['gambar']['name']) {
        // Menghapus gambar lama dari server
        $sql_select = "SELECT gambar FROM buku WHERE id_buku = '$id_buku'";
        $result_select = mysqli_query($link, $sql_select);
        $row_select = mysqli_fetch_assoc($result_select);
        $old_image = $row_select['gambar'];
        if ($old_image != '') {
            unlink($old_image);
        }

        // Upload gambar baru
        $target_dir = "../assets/img/buku/"; // Directory to save the uploaded image
        $target_file = $target_dir . basename($_FILES['gambar']['name']);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the image file is a actual image or fake image
        $check = getimagesize($_FILES['gambar']['tmp_name']);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES['gambar']['size'] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // If everything is ok, try to upload file
            if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
                // Update the image path in the database
                $sql_update_image = "UPDATE buku SET gambar = '$target_file' WHERE id_buku = '$id_buku'";
                mysqli_query($link, $sql_update_image);
                echo "The file " . basename($_FILES['gambar']['name']) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    // Redirect to the main page
    session_start();
    $_SESSION['alert'] = 'berhasil';
    header("Location: show_data.php");
    exit();
} else {
    // If the query fails, display an error message
    echo "Error: " . mysqli_error($link);
}

// Close the database connection
mysqli_close($link);
?>