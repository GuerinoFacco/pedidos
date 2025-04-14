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

            <!-- Row start formulario cadastro --> 
            <div class="card mb-3">
              <div class="card-body">              
                <div class="row align-items-center justify-content-center">              
                  <form action="gravarcliente.php" class="my-5" method="post">

                    <!-- Row start linha1 -->
                    <div class="row gx-3">
                      <!-- Row start nome -->
                      <div class="col-sm-6 col-8">
                        <div class="card mb-3">
                          <div class="card-body">
                            <div class="was-validated">
                              <label for="validationCustom01" class="form-label">Razão social</label>
                              <input name="NomCli" type="text" class="form-control" id="validationCustom01" value="" required="" />
                              <div class="valid-feedback">ok!</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Row end nome -->
                      <!-- Row start tipo -->
                      <div class="col-sm-3 col-3">
                        <div class="card mb-3">
                          <div class="card-body">
                            <div class="was-validated">
                              <label for="validationCustom04" class="form-label">Tipo</label>
                              <select name="TipCli" class="form-select" id="validationCustom04" required="">
                                <option selected="" disabled="" value="">
                                  Escolha...
                                </option>
                                <option>J - Pessoa Jurídica</option>
                                <option>F - Pessoa Física</option>
                              </select>
                              <div class="invalid-feedback">
                                Selecione o enquadramento.
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Row end tipo -->
                      <!-- Row start CNPJ -->
                      <div class="col-sm-3 col-3">
                        <div class="card mb-3">
                          <div class="card-body">
                            <div class="was-validated">
                              <label for="validationCustom05" class="form-label">CNPJ/CPF</label>
                                <input name="CgcCpf" type="text" class="form-control" id="validationCustom05" required />
                                <div class="invalid-feedback">
                                  Entre com o número do docunmento.
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Row end CNPJ -->
                    </div>
                    <!-- Row end linha 1 -->

                    <!-- Row start linha 2 -->
                    <div class="row gx-3">
                      <!-- Row start endereço -->
                      <div class="col-sm-8 col-12">
                        <div class="card mb-3">
                          <div class="card-body">
                            <div class="was-validated">
                              <label for="validationCustom05" class="form-label">Endereço</label>
                                <input name="EndCli" type="text" class="form-control" id="validationCustom05" required />
                                <div class="invalid-feedback">
                                  Entre com o Endereço.
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Row end endereço -->
                      <!-- Row start bairro -->
                      <div class="col-sm-3 col-3">
                        <div class="card mb-3">
                          <div class="card-body">
                            <div class="was-validated">
                              <label for="validationCustom05" class="form-label">Bairro</label>
                                <input name="BaiCli" type="text" class="form-control" id="validationCustom05" required />
                                <div class="invalid-feedback">
                                  Entre com a bairro.
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Row end cidade -->
                    </div>
                    <!-- Row end linha 2 -->


                    <!-- Row start linha 3 -->
                    <div class="row gx-3">
                      <!-- Row start CEP -->
                      <div class="col-sm-3 col-3">
                        <div class="card mb-3">
                          <div class="card-body">
                            <div class="was-validated">
                              <label for="validationCustom05" class="form-label">CEP</label>
                                <input name="CepCli" type="text" class="form-control" id="validationCustom05" required />
                                <div class="invalid-feedback">
                                  Entre com o CEP.
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Row end CEP -->
                      <!-- Row start cidade -->
                      <div class="col-sm-3 col-3">
                        <div class="card mb-3">
                          <div class="card-body">
                            <div class="was-validated">
                              <label for="validationCustom05" class="form-label">Cidade</label>
                                <input name="CidCli" type="text" class="form-control" id="validationCustom05" required />
                                <div class="invalid-feedback">
                                  Entre com a cidade.
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Row end cidade -->
                      <!-- Row start estado -->
                      <div class="col-sm-3 col-3">
                        <div class="card mb-3">
                          <div class="card-body">
                          <div class="was-validated">
                              <label for="validationCustom04" class="form-label">Estado</label>
                              <select name="SigUfs" class="form-select" id="validationCustom04" required="">
                                <option selected="" disabled="" value="">
                                  Escolha...
                                </option>
                                <option>AC</option>
                                <option>AL</option>
                                <option>AP</option>
                                <option>AM</option>
                                <option>BA</option>
                                <option>CE</option>
                                <option>DF</option>
                                <option>ES</option>
                                <option>GO</option>
                                <option>MA</option>
                                <option>MT</option>
                                <option>MS</option>
                                <option>MG</option>
                                <option>PA</option>
                                <option>PB</option>
                                <option>PR</option>
                                <option>PE</option>
                                <option>PI</option>
                                <option>RJ</option>
                                <option>RN</option>
                                <option>RS</option>
                                <option>RO</option>
                                <option>RR</option>
                                <option>SC</option>
                                <option>SP</option>
                                <option>SE</option>
                                <option>TO</option>
                              </select>
                              <div class="invalid-feedback">
                                Selecione o estado.
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Row end cidade -->
                      
                      <!-- Row start Botão -->
                      <div class="col-sm-3 col-3">
                        <div class="card mb-3">
                          <div class="card-body"> 
                            <div class="was-validated">
                              <button style="margin-top:25px; margin-left:80px" class="btn btn-primary" type="submit">
                                Gravar
                              </button>
                            </div>  
                          </div>  
                        </div>
                      </div>
                      <!-- Row end Botão -->



                    </div>
                    <!-- Row end linha 3 -->
                    
                  </form>
                </div>
              </div>
            </div>
            <!-- Row end formulario cadastro-->

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