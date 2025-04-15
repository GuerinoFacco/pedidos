<?php
include "config.php";
	$conecta = mysqli_connect($host, $user, $pass, $banco);
		if (mysqli_connect_errno()){
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
    <!-- Date Range CSS -->
    <link rel="stylesheet" href="assets/vendor/daterange/daterange.css" />
    <link rel="stylesheet" href="assets/dist/css/select2.min.css">
    <!-- script pedido novo -->
    <script>
        function addItemRow() {
            const table = document.getElementById('items-table');
            const row = table.insertRow();
            row.innerHTML = `
                <td><input type="text" name="item_description[]" required></td>
                <td><input type="number" name="item_quantity[]" step="1" min="1" required></td>
                <td><input type="number" name="item_unit_price[]" step="0.01" min="0.01" required></td>
            `;
        }
    </script>
    <!-- fim script pedido novo -->
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
                <li class="nav-item">
                  <a class="nav-link" href="inicial.php" ><i class="icon-stacked_line_chart"></i> Dashboards</a>
                </li>
            
                <li class="nav-item dropdown">
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
          
                <li class="nav-item dropdown active-link">
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
                  <li class="breadcrumb-item">Pedidos</li>
                  <li class="breadcrumb-item">Criar pedido</li>
                </ol>
                <!-- Breadcrumb end -->
              </div>
            </div>
            <!-- Row end -->

            <!-- Row start -->
            <div class="row gx-3">
              <div class="col-xl-12">
                <div class="card mb-3">
                  <div class="card-body">
                                              <?php /*include "../pedidos/cadastro_pedido.php"; */?> <!-- Pedido antigo -->

                    <!--Pedido novo -->
                    <form action="gravaropedido.php" method="POST">
                      <h3>Dados gerais do pedido</h3>
                      <label for="customer_name">Nome do Cliente:</label><br>
                        <input type="text" id="customer_name" name="customer_name" required><br><br>

                      <label for="customer_email">Email do Cliente:</label><br>
                        <input type="email" id="customer_email" name="customer_email" required><br><br>

                      <label for="invoice_date">Data da Fatura:</label><br>
                        <input type="date" id="invoice_date" name="invoice_date" required><br><br>

                      <label for="due_date">Data de Vencimento:</label><br>
                        <input type="date" id="due_date" name="due_date" required><br><br>

                      <label for="total_amount">Valor Total:</label><br>
                        <input type="number" step="0.01" id="total_amount" name="total_amount" required><br><br>

                      <h3>Itens do pedido</h3>
                        <table id="items-table" border="1">
                            <tr>
                                <th>Descrição</th>
                                <th>Quantidade</th>
                                <th>Preço Unitário</th>
                            </tr>
                            <tr>
                                <td><input type="text" name="item_description[]" required></td>
                                <td><input type="number" name="item_quantity[]" step="1" min="1" required></td>
                                <td><input type="number" name="item_unit_price[]" step="0.01" min="0.01" required></td>
                            </tr>
                        </table>
                      
                        <button type="button" onclick="addItemRow()">Adicionar Item</button><br><br>

                    <button type="submit">Salvar</button>
                    </form>
                    <!--Fim pedido novo -->

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
        <?php include "../pedidos/include/app_footer.html";?>
        <!-- App footer end -->

      </div>
      <!-- App container ends -->

    </div>
    <!-- Page wrapper end -->

    <!-- ************ JavaScript Files ************* -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- ************* Vendor Js Files ************* -->

    <!-- Overlay Scroll JS -->
    <script src="assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
    <script src="assets/vendor/overlay-scroll/custom-scrollbar.js"></script>

    <!-- Moment JS -->
    <script src="assets/js/moment.min.js"></script>

    <!-- Date Range JS -->
    <script src="assets/vendor/daterange/daterange.js"></script>
    <script src="assets/vendor/daterange/custom-daterange.js"></script>

    <!-- Custom JS files -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/validations.js"></script>


    <script src="assets/dist/js/select2.js"></script>
    <script src="assets/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
        $('.form-select').select2();
        });
    </script>
  </body>

</html>