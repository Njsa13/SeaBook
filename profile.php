<?php
session_start();
if (!empty($_SESSION['email'])) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <?php
    include 'css/link_user.php';
    ?>
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#birthdate" ).datepicker();
        } );
    </script>
</head>
<body>
	<?php
    include 'layout/user_header.php';
    ?>
    <br><br>
    <section class="profile-menu" style="margin-bottom: 2.82rem;">
        <div class="container mt-5">
            <div class="row justify-content-around">
                <?php
                include 'layout/menu_profile.php';
                include 'lib/connection.php';

                $email = $_SESSION['email'];
                $query = "SELECT * FROM user WHERE email = '$email';";
                $result = mysqli_query($link, $query);
                $row = mysqli_fetch_assoc($result);
                ?>
                <div class="col-lg-8 mb-5 mb-lg-0 col-10">
                    <?php
                    if (isset($_SESSION['alert'])) {
                        echo '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> Data berhasil dikirim.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        ';
                        $_SESSION['alert'] = NULL;
                    }
                    ?>
                    <h1 class="mb-4">Profile</h1>
                    <form action="edit_profile_action.php" method="POST">
                        <div class="mb-2 input-container">
                            <input type="text" id="name" aria-describedby="nameHelp" name="name" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong')" oninput="this.setCustomValidity('')" value="<?php echo $row['nama']; ?>">
                            <label for="name" class="form-label">Nama Lengkap</label>
                        </div>
                        <div class="mb-2 input-container">
                            <label for="email" class="form-label email-label">E-mail</label>
                            <input type="email" id="email" aria-describedby="emailHelp" style="margin-top: 18px; color: #BBB;" name="email" required oninvalid="this.setCustomValidity('Email tidak boleh kosong')" oninput="this.setCustomValidity('')" value="<?php echo $row['email']; ?>" readonly>
                        </div>
                        <label class="jk-label mb-2">Jenis Kelamin</label>
                        <div class="d-flex mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" <?php if ($row['jenis_kelamin']=='Laki-laki') echo 'checked'?> name="jenis_kelamin" id="laki-laki" value="Laki-laki" required oninvalid="this.setCustomValidity('Jenis kelamin tidak boleh kosong')" oninput="this.setCustomValidity('')">
                                <label class="form-check-label" for="laki-laki">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="ms-4 form-check">
                                <input class="form-check-input" type="radio" <?php if ($row['jenis_kelamin']=='Perempuan') echo 'checked'?> name="jenis_kelamin" id="perempuan" value="Perempuan">
                                <label class="form-check-label" for="perempuan">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                        <div class="mb-4 input-container">
                            <input type="" id="birthdate" aria-describedby="birthdateHelp" value="<?php echo date("m/d/Y", strtotime($row['tanggal_lahir'])); ?>" name="birthdate" required oninvalid="this.setCustomValidity('Tanggal lahir tidak boleh kosong')" oninput="this.setCustomValidity('')">
                            <label for="birthdate" class="form-label">Tanggal Lahir (mm/dd/yyyy)</label>
                        </div>
                        <div class="mb-4 input-container">
                            <input type="tel" id="notelp" aria-describedby="notelpHelp" value="<?php echo $row['nomor_telepon']; ?>" name="notelp" required oninvalid="this.setCustomValidity('No. Telp tidak boleh kosong')" oninput="this.setCustomValidity('')">
                            <label for="notelp" class="form-label">No. Telp Anda</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php include 'layout/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>
</html>

<?php
} else {
  header('location: index.php');
}
?>