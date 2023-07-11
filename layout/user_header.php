    <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="index.php"><img src="assets/img/Logo.png"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse pt-4 pt-lg-0" id="navbarNav">
          <ul class="navbar-nav container-fluid justify-content-between">
            <li class="nav-item order-lg-second">
              <form class="d-flex input-group" role="search">
                <input type="search" class="form-control" placeholder="  Cari Judul Buku" aria-label="Search" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary pb-2 pe-3" type="button" id="button-addon2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg>
                </button>
              </form>
              <hr class="divider">
            </li>
            <li class="nav-item">
              <?php
              if (empty($_SESSION['email'])) {
                echo '<a class="nav-link" href="login.php">Masuk</a>';
              } else {
                echo '
                <a href="profile.php" class="nav-link d-none d-lg-block" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip"data-bs-title="'.$_SESSION['email'].'">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                  </svg>
                </a>
                <a class="nav-link d-lg-none" href="profile.php">Profile</a>
                ';
              }
              ?>
              
            </li>
            <li class="nav-item order-lg-first dropdown ms-lg-5">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Kategori
              </a>
              <ul class="dropdown-menu overflow-x-hidden">
                <li><a class="dropdown-item" href="#">Arsitektur</a></li>
                <li><a class="dropdown-item" href="#">Berkebun</a></li>
                <li><a class="dropdown-item" href="#">Bisnis & Ekonomi</a></li>
                <li><a class="dropdown-item" href="#">Fiksi</a></li>
                <li><a class="dropdown-item" href="#">Humor</a></li>
                <li><a class="dropdown-item" href="#">Komputer</a></li>
                <li><a class="dropdown-item" href="#">Matematika</a></li>
                <li><a class="dropdown-item" href="#">Sains</a></li>
              </ul>
            </li>
            <li class="nav-item bag-logo">
              <a class="nav-link d-none d-lg-inline" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                </svg>
              </a>
              <a class="nav-link d-lg-none" href="#">Keranjang</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>