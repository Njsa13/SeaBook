<br>
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Buku</title>
    <?php
    include "css/link_user.php";
    ?>
</head>
<body>
<?php
    include "layout/user_header.php";
    ?>
    <div class="container mt-5">
        <?php // Koneksi ke database
            include "lib/connection.php";
            // Mendapatkan data buku berdasarkan id_buku
            $data = array(); // Define empty array
            if (isset($_GET['id'])) {
                $id_buku = $_GET['id'];
                $sql =  "SELECT * FROM buku WHERE id_buku='$id_buku'";
                $result = mysqli_query($link, $sql);
                $data = mysqli_fetch_assoc($result);
            }
        ?>
        <div class="row mt-5">
            <div class="col-4 ">
                <div class="container">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <img src="
                                <?php
                                    if (($data['gambar'] == NULL)||($data['gambar']=='../assets/img/buku/')) {
                                        echo 'assets/img/buku/def.png';
                                    } else {
                                        $url = str_replace("../", "", $data['gambar']);
                                        echo $url;
                                    }
                                ?>" width="100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
            <div class="row">
                    <h6>
                        <?php
                            echo $data['penulis'];
                        ?>
                    </h6>
                    <h4>
                        <?php
                            echo $data['judul_buku']
                        ?>
                    </h4>
                </div>
                <div class="row d-flex mt-3">
                        <a href="checkout.php" type="button" class="btn btn-primary mb-2">Beli Rp. 
                            <?php
                                echo $data['harga']
                            ?>
                        </a>
                        <a href="shopping_cart.php" type="button" class="btn btn-outline-primary">keranjang</a>
                </div>
                <div class="row mt-3">
                    <h4>Deskripsi Buku</h4>
                    <p>
                        <?php
                            echo $data['deskripsi']
                        ?>
                    </p>
                </div>
                <div class="row">
                    <h6>Detail</h6>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Tanggal terbit<br>
                        <?php
                            echo $data['tanggal_terbit']
                        ?>
                        </p><br>
                        <p>Kategori<br>
                        <?php
                            echo $data['kategori']
                        ?>
                        </p>
                    </div>
                    <div class="col">
                        <p>Penerbit<br>
                        <?php
                            echo $data['penerbit']
                        ?>
                        </p><br>
                        <p>Bahasa<br>
                        <?php
                            echo $data['bahasa']
                        ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "layout/footer.php";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>