<?php
session_start();
if (!empty($_SESSION['status'])) {
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List Buku</title>
    <?php
    include "../css/link.php";
    ?>
  </head>
  <body class="d-flex flex-column" style="min-height: 39.09rem;">
    <?php
    include "../layout/admin_header.php";
    ?>
    
    <br><br>
    <section class="shift-main flex-grow-1 mt-5">
        <?php
        if (isset($_SESSION['alert'])) {
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> Edit data buku berhasil.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
            $_SESSION['alert'] = NULL;
        }
        ?>
        <div class="container table-responsive">
            <form class="d-flex input-group mt-2 mb-4" role="search" method="GET" action="">
                <input type="search" name="search" class="form-control" placeholder="  Cari Judul Buku" aria-label="Search" aria-describedby="button-addon2" value="<?php if(isset($_GET['search'])) echo $_GET['search'];?>">
                <button class="btn btn-outline-secondary pb-2 pe-3" type="submit" id="button-addon2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </form> 
            <?php
            include "../lib/connection.php";

            $search = '';
            if(isset($_GET['search'])){
                $search = $_GET['search'];
                $sql = "SELECT * FROM buku WHERE judul_buku LIKE '%$search%'";
            } else {
                $sql = "SELECT * FROM buku";  
            }

            $result = mysqli_query($link, $sql);
            ?>
            <table class="table table-bordered shadow-sm">
                <thead>
                    <tr class="table-info">
                        <th>Gambar</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th width="110px">Tanggal Terbit</th>
                        <th>Kategori</th>
                        <th>Bahasa</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td>
                                <img src="<?php
                                if (($row['gambar'] == NULL)||($row['gambar']=='../assets/img/buku/')) {
                                    echo '../assets/img/buku/def.png';
                                } else {
                                    echo $row['gambar'];
                                }
                                ?>" alt="" width="40px">
                            </td>
                            <td><?php echo $row['judul_buku']; ?></td>
                            <td><?php echo $row['penulis']; ?></td>
                            <td><?php echo $row['penerbit']; ?></td>
                            <td><?php echo $row['tanggal_terbit']; ?></td>
                            <td><?php echo $row['kategori']; ?></td>
                            <td><?php echo $row['bahasa']; ?></td>
                            <td><?php echo $row['harga']; ?></td>
                            <td><?php echo $row['stok_buku']; ?></td>
                            <td>
                            <?php
                                if ($row['deskripsi'] == NULL) {
                                    echo '.....';
                                } else {
                                    echo substr($row['deskripsi'], 0, 50)."...";
                                } 
                            ?>    
                            </td>
                            <td class="d-flex">
                                <a href="form_edit.php?id= <?php echo $row['id_buku']; ?>" class="btn btn-primary me-2" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .70rem;">Edit</a>
                                <a href="delete.php?id= <?php echo $row['id_buku']; ?>" class="btn btn-danger" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .70rem;">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
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