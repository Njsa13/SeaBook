<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Pesanan</title>
    <?php
    include 'css/link_user.php';
    ?>
</head>
<body>
    <?php
        include 'layout/user_header.php';
    ?>
    <br>
    <div class="container mt-5">
        <h3>CheckOut</h3>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="ms-2 me-2">Alamat Tujuan</p>
                <textarea name="" id="" cols="30" rows="5" class="form-control ms-2 me-5 mb-5" ></textarea>
                    <div class="card ms-2 me-2">
                        <div class="card-body">
                               <?php
                                    $data = array(); // Define empty array
                                    if (isset($_GET['id'])) {
                                        $id_buku = $_GET['id'];
                                        $sql =  "SELECT * FROM keranjang JOIN buku ON buku.id_buku=keranjang.id_buku WHERE keranjang.id_buku='$id_buku'";
                                        $result = mysqli_query($link, $sql);
                                        $data = mysqli_fetch_assoc($result);
                                    }
                                ?>
                            <div class="row">
                                <div class="col-2">
                                    <img src="
                                    <?php
                                        if (($data['gambar'] == NULL)||($data['gambar']=='../assets/img/buku/')) {
                                            echo 'assets/img/buku/def.png';
                                        } else {
                                            $url = str_replace("../", "", $data['gambar']);
                                            echo $url;
                                        }
                                    ?>">
                                </div>
                                <div class="col">
                                    <p>
                                        <?php
                                            echo $data['judul_buku']
                                        ?>
                                    </p>
                                    <p>
                                        <?php
                                            echo $data['harga']
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
            <div class="col">
                <div class="row">
                    <p>Metode pengiriman</p>
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            -- Pilih Metode Pengiriman --
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">JNE</a></li>
                            <li><a class="dropdown-item" href="#">Pos Indonesia</a></li>
                            <li><a class="dropdown-item" href="#">SiCepat</a></li>
                        </ul>
                    </div>
                    <p>Metode Pembayaran</p>
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            -- Pilih Metode Pembayaran --
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Trasnfer Bank BRI</a></li>
                            <li><a class="dropdown-item" href="#">Transfer Bank BNI</a></li>
                            <li><a class="dropdown-item" href="#">DANA</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>