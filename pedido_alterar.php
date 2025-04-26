<?php
include "config.php";
	$conecta = mysqli_connect($host, $user, $pass, $banco);
		if (mysqli_connect_errno())
      {
      echo "Falha ao conectar o MySQL: " . mysqli_connect_error();
      }
      $id = $_GET['id'];
      $cmd1 = "SELECT * FROM `pedsite` WHERE `id`='$id'";
      $rs1=mysqli_query($conecta,$cmd1);
      $row1=mysqli_fetch_array($rs1,MYSQLI_ASSOC);
      $NumeroPedido=$row1['NumeroPedido'];
      $datemi=$row1['datemi'];
      $nomcli=$row1['nomcli'];

      $cmd2 = "SELECT * FROM `e085cli` WHERE `CgcCpf` = '$nomcli'";
      $rs2=mysqli_query($conecta,$cmd2);
      $row2=mysqli_fetch_array($rs2,MYSQLI_ASSOC);
      $nomecli=$row2['NomCli'];
      $cidcli=$row2['CidCli'];
      $sigufs=$row2['SigUfs'];
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

        <!-- App body starts -->
        <div style="margin-top: 0px; height: calc(100vh - 40px);" class="app-body">

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
                  <li class="breadcrumb-item">Alterar pedido</li>
                </ol>
                <!-- Breadcrumb end -->
              </div>
            </div>
            <!-- Row end -->

            <!-- Row start -->
            <div class="row gx-3">
              <div class="col-xl-12">

                <!-- Card start -->
                <div class="row gx-3">
                  <div class="col-12">  

                        <div class="card mb-3">
                          <div class="card-body">
                            <!--Pedido novo -->
                            <form action="gravarpedido.php" method="POST">
                              <div class="invoice-header">
                                <div class="title-date">
                                  <h3>Dados gerais do pedido</h3>
                                  <input id="DatEmi" name="DatEmi" style="border: none; background-color: #eaeceb;" class="date" value="<?php echo $datemi?>" readonly ></input>
                                </div>
                                  <div class="space"></div>
                                  <p class="invoice-number">Nº    
                                  <input id="NumeroPedido" name="NumeroPedido" class="form-control" style="text-align: center;" value="<?php echo $NumeroPedido;?>" readonly ></input>    
                                  </p>
                              </div>                       
                              <label for="NomCli">Nome do Cliente:</label><br>
                              <input id="NomCli" name="NomCli" class="form-control" placeholder="<?php echo $nomecli." - ".$cidcli." - ".$sigufs." - CNPJ/CPF:".$nomcli;
                                    ?>" value="<?php echo $nomcli;?>"readonly ></input>
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
                                        <?php 
                                        $cmd3 = "SELECT * FROM `pedsiteitems` WHERE `pedsite_id` = '$id'";
                                        $rs3=mysqli_query($conecta,$cmd3);
                                        while($row3=mysqli_fetch_array($rs3,MYSQLI_ASSOC)){
                                          echo '<td><input type="number" value="'.$row3['id'].'" name="id" class="idProd" readonly ></td>';
                                          echo '<td><input style="max-width: 600px; width: 600px" type="text" placeholder="'.$row3['produto'].'" name="produto[]" ></td>';
                                          echo '<td><input type="number" placeholder="'.$row3['qtdped'].'" name="qtdped[]" id="unit" step="1" min="1" onkeyup="getInput()" ></td>';
                                          echo '<td><input type="number" placeholder="'.$row3['preuni'].'" name="preuni[]" id="price" step="0.01" min="0.01" onkeyup="getInput()" ></td>';
                                          echo '<td><input type="number" name="amount" class="amount" id="amount" disabled></td>';
                                          echo '<td style="text-align: right;"><span class="fs-3 icon-trash-2"></span></td></tr>';
                                        }
                                        ?>
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
                                <div id="sum"><span class="totaltitulo" >Total</span><input type="text" placeholder="0.00" name="total" class="total" id="total" disabled></div>
                                  <div class="obs">
                                  <input type=text style="max-width: 100%; width: 100%" type="text" placeholder="Observação" name="ObsPed">
                                  </div>
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