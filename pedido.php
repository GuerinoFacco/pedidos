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
    <!-- pedido CSS -->
    <link rel="stylesheet" href="assets/css/styles_ped.css" />
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/main.min.css" />
    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="assets/vendor/overlay-scroll/OverlayScrollbars.min.css" />
    <!-- Date Range CSS -->
    <link rel="stylesheet" href="assets/vendor/daterange/daterange.css" />
    <link rel="stylesheet" href="assets/dist/css/select2.min.css">
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
                    <!--Pedido novo -->
                    <form action="gravarpedido.php" method="POST">
                      <div class="invoice-header">
                        <div class="title-date">
                          <h3>Dados gerais do pedido</h3>
                          <input id="DatEmi" name="DatEmi" style="border: none; background-color: #eaeceb;" class="date" value="<?php echo date("d/m/Y")?>" readonly ></input>
                        </div>
                          <div class="space"></div>
                          <p class="invoice-number">Nº
                              <?php
                                  $ano=date('y');
                                  $cmd1 = "SELECT MAX(`NumeroPedido`) as numpedido FROM `pedsite` WHERE 1";
                                        $rs1=mysqli_query($conecta,$cmd1);
                                        $row1=mysqli_fetch_array($rs1,MYSQLI_ASSOC);
                                        $numpedido=$row1['numpedido'];
                                  $numeroPedido=$numpedido + 1; 
                              ?>     
                          <input id="NumeroPedido" name="NumeroPedido" class="form-control" style="text-align: center;" value="<?php echo $ano;echo $numeroPedido;?>" readonly ></input>    
                          </p>
                      </div>                       
                      <label for="NomCli">Nome do Cliente:</label><br>
                          <select name="NomCli" class="form-select" id="single-select-field" data-placeholder="Escolha..." required>
                            <option selected="" disabled="" value=""></option>
                            <?php
                            $cmd = "SELECT * FROM `e085cli` WHERE 1 ORDER BY 'NomCli'";
                            $rs=mysqli_query($conecta,$cmd);								
                            while($row=mysqli_fetch_array($rs,MYSQLI_ASSOC)){
                              echo "<option value=".$row['CgcCpf']." - ".$row['NomCli'].">".$row['NomCli']." - ".$row['CidCli']." - ".$row['SigUfs']." - CNPJ/CPF:".$row['CgcCpf']."</option>";
                            }
                            ?>
                        </select>

                        <div class="space2"></div>


                      <h3>Itens do pedido</h3>
                        <table id="items-table">
                          <thead>
                            <tr>
                                <th style="width: 100px;">#</th>
                                <th style="width: 700px;">PRODUTO</th>
                                <th>QUANTIDADE</th>
                                <th>PREÇO</th>
                                <th>SUBTOTAL</th>
                                <th style="text-align: right;">AÇÂO</th>
                            </tr>
                          </thead>
                          <tbody id="table-body">
                            <tr class="single-row">
                            <td><input type="number" value="1" name="id" class="idProd" readonly ></td>
                                <td><input style="max-width: 600px; width: 600px" type="text" placeholder="Produto" name="produto[]" required></td>
                                <td><input type="number" name="qtdped[]" id="unit" step="1" min="1" onkeyup="getInput()" required></td>
                                <td><input type="number" name="preuni[]" id="price" step="0.01" min="0.01" onkeyup="getInput()" required></td>
                                <td><input type="number" name="totite[]" class="amount" id="amount" disabled></td>
                                <td style="text-align: right;"><span class="fs-3 icon-trash-2"></span></td>                                
                            </tr>

                            <tr style="padding-left: 20px">
                                <td class="dashed "><div class="float">
                                    <a href="#" class="float" id="add-row">
                                        <span class="fs-3 icon-plus"></span>
                                    </a>
                                </div>
                            </td>
                                <td class="dashed"></td>
                                <td class="dashed"></td>
                                <td class="dashed"></td>
                                <td class="dashed"></td>
                            </tr>


                          </tbody>  
                        </table>

                        <div class="card-footer">
                            <button class="btn btn-flat btn-sm btn-primary" type="submit">Salvar</button>
                            <a class="btn btn-flat btn-sm btn-default" href="./inicial.php">Cancel</a>
                        </div>

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

    <script src="assets/js/script_ped.js"></script>

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