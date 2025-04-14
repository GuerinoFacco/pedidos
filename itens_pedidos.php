<?php
include "config.php";
$conecta = mysqli_connect($host, $user, $pass, $banco);
if (mysqli_connect_errno())
  {
  echo "Falha ao conectar o MySQL: " . mysqli_connect_error();
  }
  $numped = $_GET['numped'];
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
                    <i class="icon-house_siding lh-1"></i>Inicio
                  </li>
                  <li class="breadcrumb-item">Pedidos</li>
                  <li class="breadcrumb-item">Ítens de pedidos</li>
                </ol>
                <!-- Breadcrumb end -->
              </div>
            </div>
            <!-- Row end -->

            <!-- Row start -->
            <div class="row gx-3">
              <div class="col-12">

                <!-- Card start -->
                <div class="row gx-3">
                  <div class="col-12">
                    <div class="card mb-3">
                      <div class="card-body">
                        <div class="mb-2 d-flex align-items-end justify-content-between">
                          <h5 class="card-title">Itens do pedido </h5>
                        </div>
                        <div class="table-outer">
                          <div class="table-responsive">
                            <table class="table table-striped align-middle m-0">
                              <thead>
                                <tr>
                                  <th>
                                    <div class="d-flex align-items-center">
                                      <span class="icon-calendar me-2 fs-4"></span>
                                      Número
                                    </div>
                                  </th>
                                  <th>
                                    <div class="d-flex align-items-center">
                                      <span class="icon-add_task me-2 fs-4"></span>
                                      Produto
                                    </div>
                                  </th>
                                  <th>
                                    <div class="d-flex align-items-center">
                                      <span class="icon-playlist_add_check me-2 fs-4"></span>
                                      Qtd Pedido
                                    </div>
                                  </th>
                                  <th>
                                    <div class="d-flex align-items-center">
                                      <span class="icon-playlist_add_check me-2 fs-4"></span>
                                      Qtd Faturado
                                    </div>
                                  </th>
                                  <th>
                                    <div class="d-flex align-items-center">
                                      <span class="icon-playlist_add_check me-2 fs-4"></span>
                                      Qtd Cancelado
                                    </div>
                                  </th>
                                  <th>
                                    <div class="d-flex align-items-center">
                                      <span class="icon-playlist_add_check me-2 fs-4"></span>
                                      Preço unitário
                                    </div>
                                  </th>
                                  <th>
                                    <div class="d-flex align-items-center">
                                      <span class="icon-playlist_add_check me-2 fs-4"></span>
                                      Total do ítem
                                    </div>
                                  </th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                  $cmd = "SELECT * FROM `e120ipd` WHERE NumPed = '$numped'";
                                  $rs=mysqli_query($conecta,$cmd);								
                                  while($row=mysqli_fetch_array($rs,MYSQLI_ASSOC)){
                                  echo "<tr><td>".$row['NumPed']."</td>";
                                  echo "<td style=\"width: 35%\">".$row['CodPro']." - ".$row['DesPro']."</td>";
                                  echo "<td>".$row['QtdPed']."</td>";
                                  echo "<td>".$row['QtdFat']."</td>";
                                  echo "<td>".$row['QtdCan']."</td>";
                                  echo "<td>".$row['PreUni']."</td>";
                                  echo "<td>".$row['TotIte']."</td></tr>";                           
                                  }
                                ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Card end -->

              </div>
            </div>
            <!-- Row end -->

          </div>
          <!-- Container ends -->

        </div>
        <!-- App body ends -->

        <!-- App footer start -->
        <div class="app-footer">
          <div class="container">
            <span>© NPA - GUE - 2025</span>
          </div>
        </div>
        <!-- App footer end -->

      </div>
      <!-- App container ends -->

    </div>
    <!-- Page wrapper end -->

    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Overlay Scroll JS -->
    <script src="assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
    <script src="assets/vendor/overlay-scroll/custom-scrollbar.js"></script>

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

    <!-- Custom JS files -->
    <script src="assets/js/custom.js"></script>
  </body>

</html>