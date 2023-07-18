<?php
session_start();
if (!empty($_SESSION['email'])) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Checkout</title>
	<?php
	include 'css/link_user.php';
	?>
	<style>
		.checkout .card {
		    box-shadow: 0px 0px 10px rgba(0, 0, 0, .15);
		}
	</style>
</head>
<body>
	<?php
	include 'layout/user_simple_header.php';
	include 'lib/connection.php';

	$total = 0;
    $email = $_SESSION['email'];
    if (isset($_GET['id'])) {
    	$id_buku = $_GET['id'];
    	$query = "SELECT gambar, judul_buku, harga, harga*1 AS subtotal FROM buku WHERE id_buku = '$id_buku';";
    } else {
    	$query = "SELECT keranjang.id_buku, id_keranjang, gambar, judul_buku, harga, jumlah_buku*harga AS subtotal, jumlah_buku FROM keranjang LEFT JOIN buku USING(id_buku) LEFT JOIN user USING(id_user) WHERE email = '$email' AND id_transaksi IS NULL;";
    }
    $result = mysqli_query($link, $query);
	?>
	<br><br>
	<section class="checkout mt-5">
		<div class="container">
			<form method="POST" action="checkout_action.php<?php if (isset($_GET['id'])) { echo '?id='.$_GET['id'].'&harga='.$_GET['harga']; } ?>">
				<div class="row">
					<div class="row mb-4">
		    	      <div class="col-11 col-lg-12">
		            	<h5 class="fw-bold">Keranjang Belanja</h5>
		        	  </div>
		        	</div>
				</div>
				<div class="row justify-content-around mb-5">
					<div class="col-6 me-5">
						<div>
							<label for="alamat" class="form-label">Alamat Tujuan</label>
							<textarea id="alamat" name="alamat" class="form-control" style="height: 132px; resize: none;" placeholder="Alamat Anda" required></textarea>
						</div>
					</div>
					<div class="col-5">
						<div class="mb-4">
							<label class="form-label" for="metodeKirim">Metode Pengiriman</label>
							<select id="metodeKirim" class="mySelect1 form-select" name="metodeKirim">
								<option selected data-harga = "0" value="kosong">-- Pilih Metode Pengiriman --</option>
								<option value="JNE" data-harga = "10000">JNE (Rp 10.000)</option>
								<option value="Sicepat" data-harga = "20000">Sicepat (Rp 20.000)</option>
								<option value="Pos Indonesia" data-harga = "30000">Pos Indonesia (Rp 30.000)</option>
							</select>
						</div>
						<div>
							<label class="form-label" for="metodeBayar">Metode Pembayaran</label>
							<select id="metodeBayar" class="mySelect2 form-select" name="metodeBayar">
								<option selected value="kosong">-- Pilih Metode Pembayaran --</option>
								<option value="Transfer Bank BRI" data-va = "8372645391">Transfer Bank BRI</option>
								<option value="Transfer Bank Mandiri" data-va = "8018563391">Transfer Bank Mandiri</option>
								<option value="Transfer Bank BNI" data-va = "8379362539">Transfer Bank BNI</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row justify-content-between">
					<div class="col-6">
						<?php
				            if (mysqli_num_rows($result)!=0) {
				              	while ($row = mysqli_fetch_assoc($result)) {
				              		$total = $total + $row['subtotal'];
				            ?>
							<div class="row mb-3">
				              <div class="card border border-0">
				                <div class="card-body d-flex justify-content-between">
				                  <div class="col-2">
				                    <img src="
				                    <?php
				                    if (($row['gambar'] == NULL)||($row['gambar']=='../assets/img/buku/')) {
				                        echo 'assets/img/buku/def.png';
				                    } else {
				                        $url = str_replace("../", "", $row['gambar']);
				                        echo $url;
				                    }
				                    ?>
				                    " width="50px">
				                  </div>
				                  <div class="col d-flex flex-column">
				                    <strong class="mb-1 shorten-text" style="font-size: 12px;"><?php
				                        echo $row['judul_buku']; 
				                     ?></strong>
				                    <span class="mb-1" style="font-size: 12px;">Rp. <?php echo number_format($row['harga'], 0, ",", "."); ?></span>
				                    <span style="font-size: 12px; color: #2FA0D0;">Rp. <?php echo number_format($row['subtotal'], 0, ",", "."); ?></span>
				                  </div>
				                  <div class="col-2 d-flex align-items-center">			                    
				                    <input type="text" name="qty" class="form-control counter ms-2 me-2" value="<?php if (isset($_GET['id'])) { echo '1'; } else {echo $row['jumlah_buku']; } ?>" disabled>
				                  </div>
				                </div>
				              </div>
				            </div>
				        <?php } } else
				        echo '
				        <div class="justify-content-center d-flex">
				            <img src="assets/img/nodata.png" class="mt-5" width="150px">
				        </div>
				        ';
				        ?>
					</div>
					<div class="col-4 me-5">
						<div class="card border border-0">
			              <div class="card-body mt-3 text-center">
			              	<input type="hidden" name="biayaKirim" class="biayaKirim">
			              	<input type="hidden" name="virtual_account" class="virtual_account">
			              	
			                <h5>Total Harga</h5>
			                <hr>
			                <h6 class="praTotalHarga">Rp. <?php echo number_format($total, 0, ",", "."); ?> + Biaya Pengiriman</h6>
			                <hr>
			                <h5 class="text-info mb-3 totalHarga">1000000</h5>
			                <button class="btn btn-primary" type="submit">Checkout</button>
			              </div>
			            </div>
					</div>
				</div>
			</form>
		</div>
	</section>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
	<script>
	  $(document).ready(function() {
	    // Ambil elemen yang diperlukan
	    var praTotalHargaElement = $(".praTotalHarga");
	    var totalHargaElement = $(".totalHarga");
	    var metodeKirimSelect = $("#metodeKirim");
	    var metodeBayarSelect = $("#metodeBayar");

	    function updateTotalHarga() {
	      var total = parseInt(praTotalHargaElement.text().replace(/[^0-9]/g, ""));
	      var harga = parseInt(metodeKirimSelect.find("option:selected").data("harga"));
	      var virtual_account = parseInt(metodeBayarSelect.find("option:selected").data("va"));
	      var totalHarga = total + harga;

	      $(".biayaKirim").val(harga);
	      $(".virtual_account").val(virtual_account);
	      totalHargaElement.text("Rp. " + totalHarga.toLocaleString('id-ID'));
	    }

	    updateTotalHarga();
	    metodeKirimSelect.on("change", updateTotalHarga);
	    metodeBayarSelect.on("change", updateTotalHarga);
	  });

	  $(document).ready(function() {
	      $("form").submit(function(event) {
	        var selectedOption = $(".mySelect1").val();
	        
	        if (selectedOption === "kosong") {
	          alert("Pilih Metode Pengiriman Yang Anda Inginkan");
	          event.preventDefault(); // Mencegah pengiriman form
	        } else {
	        	var selectedOption = $(".mySelect2").val();
	        
		        if (selectedOption === "kosong") {
		          alert("Pilih Metode Pembayaran Yang Anda Inginkan");
		          event.preventDefault(); // Mencegah pengiriman form
		        }
	        }
	      });
	    });
	</script>

</body>
</html>
<?php
} else {
  header('location: login.php');
}
?>