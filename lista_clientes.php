<?php
include "config.php";
$conecta = mysqli_connect($host, $user, $pass, $banco);
if (mysqli_connect_errno())
  {
  echo "Falha ao conectar o MySQL: " . mysqli_connect_error();
  }
?>
<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistema de pedidos NPA</title>

    <!-- Meta -->
    <link rel="shortcut icon" href="assets/images/favicon.svg" />
    <!-- Icomoon Font Icons css -->
    <link rel="stylesheet" href="assets/fonts/icomoon/style.css" />
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/main.min.css" />
    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="assets/vendor/overlay-scroll/OverlayScrollbars.min.css" />
     <!-- Data Tables -->
    <link rel="stylesheet" href="assets/vendor/datatables/dataTables.bs5.css" />
    <link rel="stylesheet" href="assets/vendor/datatables/dataTables.bs5-custom.css" />
    <link rel="stylesheet" href="assets/vendor/datatables/buttons/dataTables.bs5-custom.css" />

  </head>

  <body>
    <!-- Page wrapper start -->
    <div class="page-wrapper">

      <!-- App container starts -->
      <div class="app-container">

        <!-- App header starts -->
        <?php include "../pedidos/include/app_header.php"; ?> 
        <!-- App header ends -->

        <!-- App navbar starts -->
        <nav class="navbar navbar-expand-lg">
          <div class="container">
            <div class="offcanvas offcanvas-end" id="MobileMenu">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title semibold">Navigation</h5>
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="offcanvas">
                  <i class="icon-clear"></i>
                </button>
              </div>
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item ">
                  <a class="nav-link" href="inicial.php" ><i class="icon-stacked_line_chart"></i> Dashboards</a>
                </li>
            
                <li class="nav-item dropdown active-link">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                  <i class="icon-supervised_user_circle"></i> Clientes
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="lista_clientes.php"><span>Lista de clientes</span></a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="cadastro_clientes.php"><span>Cadastrar cliente</span></a>
                    </li>
                  </ul>
                </li>
          
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="icon-drive_file_rename_outline"></i>Pedidos
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="lista_pedidos.php"><span>Lista de pedidos</span></a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="pedido.php"><span>Cadastrar pedido</span></a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item ">
                  <a class="nav-link" href="index.php"><i class="icon-login"></i>Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </nav> 
        <!-- App Navbar ends -->

        <!-- App body starts -->
        <div class="app-body">

          <!-- Container starts -->
          <div class="container">

            <!-- Row start -->
            <div class="row gx-3">
              <div class="col-12 col-xl-6">
                <!-- Breadcrumb start -->
                <ol class="breadcrumb mb-3">
                  <li class="breadcrumb-item">
                    <i class="icon-house_siding lh-1"></i>
                    <a href="inicial.php" class="text-decoration-none">Inicio</a>
                  </li>
                  <li class="breadcrumb-item">Clientes</li>
                </ol>
                <!-- Breadcrumb end -->
              </div>
            </div>
            <!-- Row end -->

            <!-- Row start -->            
              <div class="card mb-3">
                <div class="card-header">
                    <div class="card-title">Lista dos clientes</div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="scrollVertical" class="table table-striped">
                        <thead>
                          <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Tipo</th>
                            <th>Endereço</th>
                            <th>CEP</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $cmd = "SELECT * FROM `e085cli` WHERE 1";
                            $rs=mysqli_query($conecta,$cmd);								
                            while($row=mysqli_fetch_array($rs,MYSQLI_ASSOC)){
                            echo "<tr><td>".$row['CodCli']."</td>";
                            echo "<td style=\"width: 35%\">".$row['NomCli']."</td>";
                            echo "<td>".$row['TipCli']."</td>";
                            echo "<td>".$row['EndCli']."</td>";
                            echo "<td>".$row['CepCli']."</td>";
                            echo "<td>".$row['CidCli']."</td>";
                            echo "<td>".$row['SigUfs']."</td></tr>";                           
                            }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>  
            <!-- Row end -->

          </div>
          <!-- Container ends -->

        </div>
        <!-- App body ends -->

        <!-- App footer start -->
        <?php include "../pedidos/include/app_footer.html"; ?> 
        <!-- App footer end -->

      </div>
      <!-- App container ends -->

    </div>
    <!-- Page wrapper end -->

    <!-- ************************* JavaScript Files ************************** -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- ************************* Vendor Js Files ************************** -->

    <!-- Data Tables -->
    <script src="assets/vendor/datatables/dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap.min.js"></script>
    <script src="assets/vendor/datatables/custom/custom-datatables.js"></script>

    <!-- DataTable Buttons -->	
    <script src="assets/vendor/datatables/buttons/dataTables.buttons.min.js"></script>
    <script src="assets/vendor/datatables/buttons/jszip.min.js"></script>
    <script src="assets/vendor/datatables/buttons/dataTables.buttons.min.js"></script>
    <script src="assets/vendor/datatables/buttons/pdfmake.min.js"></script>
    <script src="assets/vendor/datatables/buttons/vfs_fonts.js"></script>
    <script src="assets/vendor/datatables/buttons/buttons.html5.min.js"></script>
    <script src="assets/vendor/datatables/buttons/buttons.print.min.js"></script>
    <script src="assets/vendor/datatables/buttons/buttons.colVis.min.js"></script>

    <!-- Overlay Scroll JS -->
    <script src="assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
    <script src="assets/vendor/overlay-scroll/custom-scrollbar.js"></script>

    <!-- Rating -->
    <script src="assets/vendor/rating/raty.js"></script>
    <script src="assets/vendor/rating/raty-custom.js"></script>

    <!-- Custom JS files -->
    <script src="assets/js/custom.js"></script>
  </body>

</html>