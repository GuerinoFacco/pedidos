<?php
include "config.php";
	$conecta = mysqli_connect($host, $user, $pass, $banco);
		if (mysqli_connect_errno()){
		echo "Falha ao conectar o MySQL: " . mysqli_connect_error();
									}
session_start();
$usu=$_SESSION['nome'];	
$foto=$_SESSION['foto'];
?>
<div class="app-header d-flex align-items-center">

    <!-- Container starts -->
    <div class="container">

      <!-- Row starts -->
      <div class="row gx-3">
        <div class="col-md-3 col-2">

          <!-- App brand starts -->
          <div class="app-brand">
            <a href="index.php" class="d-lg-block d-none">
              <img src="assets/images/logo-npa.svg" class="logo" alt="Bootstrap Gallery" />
            </a>
          </div>
          <!-- App brand ends -->

        </div>

        <div class="col-md-9 col-10">

          <!-- App header actions start -->
          <div class="header-actions col">

            <div class="dropdown ms-3">
              <a id="userSettings" class="dropdown-toggle d-flex py-2 align-items-center text-decoration-none"
                href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo '<img src="assets/images/'.$foto.'" class="rounded-2 img-3x" alt="Bootstrap Gallery" />';?>
                
                <div class="ms-2 text-truncate d-lg-block d-none text-white">
                  <span class="d-flex opacity-50 small">Admin</span>
                  <span><?php echo $usu;?></span>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end">
                <div class="mx-3 mt-2 d-grid">
                  <a href="index.php" class="btn btn-outline-danger">Logout</a>
                </div>
              </div>
            </div>

            <!-- Toggle Menu starts -->
            <button class="btn btn-warning btn-sm ms-3 d-lg-none d-md-block" type="button"
              data-bs-toggle="offcanvas" data-bs-target="#MobileMenu">
              <i class="icon-menu"></i>
            </button>
            <!-- Toggle Menu ends -->

          </div>
          <!-- App header actions end -->

        </div>
      </div>
      <!-- Row ends -->

    </div>
    <!-- Container ends -->

  </div>