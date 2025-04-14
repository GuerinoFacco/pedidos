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
        <?php include "../pedidos/include/app_nav.html"; ?> 
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
                    <form action="gravapedido.php" method="post">
                    


                        <!-- Row start -->
                        <div class="row gx-3">
                          <!-- iniciuo quadro nome e data -->		  
                            <div class="col-md-6">
                              <div class="card mb-3">                 
                                <div class="card-body">
                              
                                  <!-- Row start -->
                                  <div class="col-sm-12 col-12">
                                    <!-- Form group start (NomCli) -->
                                    <div class="card mb-3">                        
                                      <div class="was-validated">
                                        <label for="validationCustom04" class="form-label">Cliente</label>
                                        <select class="form-select" id="single-select-field" data-placeholder="Escolha...">
                                          <option selected="" disabled="" value=""></option>
                                            <?php
                                            $cmd = "SELECT * FROM `e085cli` WHERE 1 ORDER BY 'NomCli'";
                                            $rs=mysqli_query($conecta,$cmd);								
                                            while($row=mysqli_fetch_array($rs,MYSQLI_ASSOC)){
                                            echo "<option value=".$row['CgcCpf'].">".$row['NomCli']." - ".$row['CidCli']." - ".$row['SigUfs']." - CNPJ/CPF:".$row['CgcCpf']."</option>";
                                            }
                                            ?>
                                        </select>
                                      </div>                       
                                    </div>
                                    <!-- Form group end -->                         
                                  </div>
                              
                              
                              
                                  <div class="col-sm-6 col-12">                
                                    <!-- Form group start (DatEmi) -->
                                    <div class="card mb-3">
                                      <label for="dueDate" class="form-label">Data da emissão</label>
                                        <div class="input-group">
                                          <input name="DatEmi" type="text" class="form-control datepicker-opens-left" id="dueDate" placeholder="DD/MM/YYYY" />
                                          <span class="input-group-text"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div>
                                    <!-- Form group end -->
                                  
                                    
                                   
                                  </div>
                                  
                                            <!-- Row end -->
                                    
                              </div>
                            </div>
                          </div>
                          <!-- fim quadro nome e data -->		  
                          
                          <!-- inicio quadro mensagem -->		  
                          <div class="col-md-6">
                            <div class="card mb-3">
                              <div class="card-body">
                              
                                <!-- Row start -->
                                <div class="row gx-3">
                                  <div class="col-xxl-12">
                                    <div class="col-sm-12 col-12">                
                                      <!-- Form group start -->
                                      <div class="card mb-2">
                                        <label for="msgCustomer" class="form-label">Messagem</label>
                                          <textarea rows="5" id="msgCustomer" class="form-control"></textarea>
                                      </div>
                                      <!-- Form group end -->
                                    </div>
                                  </div>
                                </div>
                                <!-- Row end -->
                                    
                              </div>
                            </div>
                          </div>
                          <!-- fim quadro mensagem -->
                        </div>
                        <!-- Row end -->


                      <!-- Row start -->
                      <div class="row gx-3">
                        <div class="col-12">
                          <div class="table-responsive">
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th colspan="8" class="pt-3 pb-3">
                                    Itens/Produtos
                                  </th>
                                </tr>
                                <tr>
                                  <th style="width: 450px;">Produto</th>
                                  <th>Apresentação</th>
                                  <th>Quantidade</th>                                  
                                  <th>Valor unitário</th>
                                  <th>Total do ítem</th>
                                  <th>Ação</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>
                                    <!-- Form group start -->
                                    <select class="form-select">
                                      <option>Selecione</option>
                                        <?php
                                        $cmd = "SELECT * FROM `e075pro` WHERE 1 ORDER BY 'DesPro'";
                                        $rs=mysqli_query($conecta,$cmd);								
                                        while($row=mysqli_fetch_array($rs,MYSQLI_ASSOC)){
                                        echo "<option value=".$row['CodPro'].">".$row['DesPro']."</option>";
                                        }
                                        
                                        ?>
                                    </select>
                                  </td>
                                  <td>
                                    <div class="m-0">
                                      <input type="text" class="form-control" />
                                    </div>
                                  </td>
                                  <td>
                                    <!-- Form group start -->
                                    <div class="m-0">
                                      <input type="number" class="form-control" placeholder="Qty" />
                                    </div>
                                    <!-- Form group end -->
                                  </td>                                  
                                  <td>
                                    <!-- Form group start -->
                                    <div class="input-group m-0">
                                      <input type="text" class="form-control" />
                                      <span class="input-group-text">
                                        R<i class="icon-dollar-sign"></i>
                                      </span>
                                    </div>
                                    <!-- Form group end -->
                                  </td>
                                  
                                  <td>
                                    <!-- Form group start -->
                                    <div class="input-group m-0">
                                      <input type="text" class="form-control" />
                                      <span class="input-group-text">
                                        <i class="icon-dollar-sign"></i>
                                      </span>
                                    </div>
                                    <!-- Form group end -->
                                  </td>
                                  <td>
                                    <div class="d-inline-flex gap-3">
                                      <button class="btn btn-outline-danger">
                                        <i class="icon-trash"></i>
                                      </button>
                                      <button class="btn btn-outline-success">
                                        <i class="icon-edit"></i>
                                      </button>
                                    </div>
                                  </td>
                                </tr>
                                
                                <tr>
                                  <!--<td>
                                    <button class="btn btn-outline-primary text-nowrap">
                                      Adicionar produto.
                                    </button>
                                  </td>-->
                                  <td colspan="6">
                                    <!--<div class="row justify-content-end">
                                      <div class="col-auto">
                                        <label class="col-form-label">Discount % of Total Amount</label>
                                      </div>
                                      <div class="col-auto">
                                        <input type="text" class="form-control" placeholder="0%" />
                                      </div>
                                    </div>-->
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="4">&nbsp;</td>
                                  <td>
                                    <h5 class="mt-2 text-primary">Total R$</h5>
                                  </td>
                                  <td>
                                    <h5 class="mt-2 text-primary">0.00</h5>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="text-end">
                            <button class="btn btn-outline-primary" type="submit">
                              Gravar pedido
                            </button>                            
                          </div>
                        </div>
                      </div>
                      <!-- Row end -->
                    </form>   
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

    <!-- *************
			************ JavaScript Files *************
		************* -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- *************
			************ Vendor Js Files *************
		************* -->

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