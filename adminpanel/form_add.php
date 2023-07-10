<?php
session_start();
if (!empty($_SESSION['status'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <?php
    include "../css/link.php";
    ?>
</head>
<body>
    <?php
    include "../layout/admin_header.php";
    ?>
    <br><br>
    <section class="mt-5 shift-main">
        <?php
        if (isset($_SESSION['alert'])) {
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> Menambahkan data buku berhasil.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
            $_SESSION['alert'] = NULL;
        }
        ?>
        <div class="container">
            <form method="POST" action="save_action.php" enctype="multipart/form-data" class="mb-3 add-form">
                <div class="mb-3">
                    <label for="judul_buku" class="form-label">Judul Buku</label>
                    <input type="text" class="form-control" id="judul_buku" name="judul_buku" required>
                </div>

                <div class="mb-3">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input type="text" class="form-control" id="penulis" name="penulis" required>
                </div>

                <div class="mb-3">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" class="form-control" id="penerbit" name="penerbit" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal_terbit" class="form-label">Tanggal Terbit</label>
                    <input type="date" class="form-control" id="tanggal_terbit" name="tanggal_terbit" required>
                </div>

                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <input type="text" class="form-control" id="kategori" name="kategori" required>
                </div>

                <div class="mb-3">
                    <label for="bahasa" class="form-label">Bahasa</label>
                    <input type="text" class="form-control" id="bahasa" name="bahasa" required>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" required>
                </div>

                <div class="mb-3">
                    <label for="stok_buku" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stok_buku" name="stok_buku" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"show_data.php></textarea>
                </div>
                
                <div class="mb-4">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                </div>

                <button type="submit" class="btn btn-primary btn-sm" name="submit">Simpan</button>
            </form>
        </div>
    </section>
    <br>
    <?php
    include "../layout/footer.php";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>

<?php
} else {
  header('location: index.php');
}
?>