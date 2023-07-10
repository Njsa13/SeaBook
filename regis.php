<?php
include "lib/connection.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Registrasi</title>
    <script>
    function togglePassword() {
      var passwordInput = document.getElementById("password");
      var toggleCheckbox = document.getElementById("toggle");

      if (toggleCheckbox.checked) {
        passwordInput.type = "text";
      } else {
        passwordInput.type = "password";
      }
    }
</script>
</head>
<style>
    body{
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .form-control {
        border: none!important;
        border-bottom: 2px solid black!important;
        border-radius: 0;
    }
</style>
<body>
    <?php
    include "layout/simple_header.php";
    ?>
    <div class = "container">
        <div class = "row">
            <div class = "col-sm-4 offset-sm-4">
                <h3 class = "mb-3" style = "color : blue">Masuk<h3>
                <form action = "aksi_reg.php" method = "POST">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap ">
                    </div>
                    <div class = "mb-3">
                        <input type = "text" class = "form-control" id = "email" name = "email" placeholder = "Email">
                    </div>
                    <div class = "mb-3">
                        <input type = "password" class = "form-control" id = "password" name = "password" placeholder = "Kata Sandi">
                        <input type="checkbox" id="toggle" onclick="togglePassword()">
                        <label for="toggle"><h6>Tampilkan Password</h6></label>
                    </div>
                    <div class="row ms-2 me-2 mb-2">
                        <div class="col-1 align-items-center d-flex">
                        <input type="checkbox" name="sk" id="sk" style="float: left; margin-right: 5px;">
                        </div>
                        <div class="col-11">
                        <label for="sk" style="display: inline-block;"><h6 style="margin: 0">Dengan pembuatan akun, Anda menyetujui <a href="#">Syarat & Ketentuan</a> serta <a href="#">Kebijakan Privasi</a> SeaBook.com dan akan terdaftar sebagai membership <a href="#">MyBook</a></h6></label>
                        </div>
                    </div>
                    <div class="row ms-2 me-2">
                        <a href="index.php" type = "submit" class = "btn btn-secondary">Daftar</a>
                    </div>
                    <br>
                    <h6>Sudah mendaftar? <a href="login.php">Masuk</a></h6>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
