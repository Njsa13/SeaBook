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
    include "../css/link.php";
    ?>
    <script>
      function showPassword() {
      var passwordInput = document.getElementById("password");
      var toggleCheckbox = document.getElementById("showpass");

      if (toggleCheckbox.checked) {
        passwordInput.type = "text";
      } else {
        passwordInput.type = "password";
      }
    }
    </script>
  </head>
  <body class="login-page d-flex flex-column">
    <?php
    include "../layout/simple_header.php";
    ?>
    <br>
    <section class="login mt-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-4">
            <?php
            if (isset($_SESSION['alert'])) {
                echo '
                <div class="alert alert-danger" role="alert">
                    <strong>Gagal!</strong> Username atau Password Salah.
                </div>
                ';
                $_SESSION['alert'] = NULL;
            }
            ?>
            <form method="POST" action="login_action.php">
              <h1>Masuk</h1>
              <div class="mb-4 mt-4 input-container">
                <input type="text" id="username" aria-describedby="usernameHelp" name="username" required oninvalid="this.setCustomValidity('Username tidak boleh kosong')" oninput="this.setCustomValidity('')">
                <label for="username" class="form-label">Username</label>
              </div>
              <div class="mb-4 input-container">
                <input type="password" id="password" name="password" required oninvalid="this.setCustomValidity('Password tidak boleh kosong')" oninput="this.setCustomValidity('')">
                <span class="eye-button"  id="eyeicon" onclick="togglePassword()">
                  <i class="bi bi-eye-fill"></i>
                </span>
                <label for="password" class="form-label">Password</label>
              </div>
              <div class="d-grid gap-2">
                <button class="btn btn-secondary" type="submit">Masuk</button>
              </div>
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