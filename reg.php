<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <?php
    include "css/link_user.php";
    ?>
  </head>
  <body class="login-page d-flex flex-column">
    <?php
    include "layout/user_simple_header.php";
    ?>
    <br>
    <section class="login mt-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-4">
            <?php
            if (isset($_SESSION['alert'])) {
                echo '
                <div class="mt-5 alert alert-danger" role="alert">
                    <strong>Gagal!</strong> Email Sudah Digunakan.
                </div>
                ';
                $_SESSION['alert'] = NULL;
            }
            ?>
            <form method="POST" action="reg_action.php">
              <h1>Daftar</h1>
              <div class="mb-4 mt-4 input-container">
                <input type="text" id="name" aria-describedby="nameHelp" name="name" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="this.setCustomValidity('')">
                <label for="name" class="form-label">Nama Lengkap</label>
              </div>
              <div class="mb-4 mt-4 input-container">
                <input type="email" id="email" aria-describedby="emailHelp" name="email" required oninvalid="this.setCustomValidity('Masukkan E-mail dengan format yang benar')" oninput="this.setCustomValidity('')">
                <label for="email" class="form-label">E-mail</label>
              </div>
              <div class="mb-4 input-container">
                <input type="password" id="password" name="password" required oninvalid="this.setCustomValidity('Password tidak boleh kosong')" oninput="this.setCustomValidity('')">
                <span class="eye-button"  id="eyeicon" onclick="togglePassword()">
                  <i class="bi bi-eye-fill"></i>
                </span>
                <label for="password" class="form-label">Password</label>
              </div>
              <div class="mb-4 form-check">
                <input type="checkbox" class="form-check-input" id="check" required oninvalid="this.setCustomValidity('Silakan diisi')" oninput="this.setCustomValidity('')">
                <label class="form-check-label" for="check">Dengan pembuatan akun, Anda menyetujui <a href="#">Syarat & Ketentuan</a> serta <a href="#">Kebijakan Privasi</a> SeaBook.com dan akan terdaftar sebagai membership <a href="#">MyBook</a></label>
              </div>
              <div class="d-grid gap-2">
                <button class="btn btn-secondary" type="submit">Daftar</button>
              </div>
              <p class="text-center mt-4">Sudah mendaftar? <a href="login.php">Masuk</a></p>
            </form>
          </div>
        </div>
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
      function togglePassword() {
        var eyeicon = document.getElementById("eyeicon");
        var password = document.getElementById("password");
        if (password.type == "password") {
          password.type = "text";
          document.getElementById("eyeicon").innerHTML = '<i class="bi bi-eye-slash-fill"></i>';
        } else {
          password.type = "password";
          document.getElementById("eyeicon").innerHTML = '<i class="bi bi-eye-fill"></i>';
        }
      }
    </script>
  </body>
</html>