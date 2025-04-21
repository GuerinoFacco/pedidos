<?php
include "config.php";
$conecta = mysqli_connect($host, $user, $pass, $banco);
if (mysqli_connect_errno())
  {
  echo "Falha ao conectar o MySQL: " . mysqli_connect_error();
  }
    
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require 'vendor/autoload.php';
  
  if(isset($_GET["id"]) && isset($_GET["acao"])){
    $id=$_GET["id"];
    $acao=$_GET["acao"];
  
 if ($acao==3) {

    $cmd1 = "UPDATE `pedsite` SET `SitPed`='3' WHERE `id`=$id";
    mysqli_query($conecta,$cmd1);
    header("location:lista_pedidos.php");
    die();
  } else 
  if ($acao==2){
    $mail = new PHPMailer(true);

    try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                // Debug
    $mail->isSMTP();                                      // Configura o disparo como SMTP
    $mail->Host = 'smtp.gmail.com';                        // Especifica o enderço do servidor SMTP da Locaweb
    $mail->SMTPAuth = true;                               // Habilita a autenticação SMTP
    $mail->Username = 'guefacco@gmail.com';            // Usuário do SMTP
    $mail->Password = 'xnsa jtqe rein gyjk';                       // Senha do SMTP
    $mail->SMTPSecure = 'tls';                            // Habilita criptografia TLS | 'ssl' também é possível
    $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS` 

    //Recipients
    $mail->setFrom('guefacco@gmail.com', 'Mailer');
    $mail->addAddress('guefacco@gmail.com', 'Gue');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    
    $cmd1 = "UPDATE `pedsite` SET `SitPed`='2' WHERE `id`=$id";
    mysqli_query($conecta,$cmd1);
    header("location:lista_pedidos.php");
    die();

    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }
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
        <?php include "../pedidos/include/app_header.php";?>
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
                    <a href="index.html" class="text-decoration-none">Inicio</a>
                  </li>
                  <li class="breadcrumb-item">Pedidos</li>
                  <li class="breadcrumb-item">Lista de pedidos</li>
                </ol>
                <!-- Breadcrumb end -->
              </div>
            </div>
            <!-- Row end -->

            <!-- Row start -->
            <div class="row gx-3">
              <div class="col-12">
                <!-- Card start -->
                <div class="card mb-3">  
                  <div class="card-body">

                    

                    <div class="card-header"> 
                      <div class="row gx-3">                        
                        <div class="col-6">
                            <div class="mb-2 d-flex justify-content-between">
                              <h5 class="card-title">PEDIDOS DIGITADOS</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-info">
                            <a class="dropdown-item" href="pedido.php">
                            <i class="icon-archive">  Adicionar pedido</i></a></button>
                        </div>                        
                      </div>
                    </div>


                    <div class="table-responsive">
                      <table id="basicExample" class="table table-striped">
                        <thead>
                          <tr>
                          <th>#</th>
                          <th>Número</th>                          
                          <th>Cliente</th>
                          <th>Cidade</th>
                          <th>Estado</th>
                          <th>Total</th>
                          <th>Status</th>
                          <th style="width:120px;">Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $cmd = "SELECT * FROM `pedsite` WHERE 1";
                            $rs=mysqli_query($conecta,$cmd);								
                            while($row=mysqli_fetch_array($rs,MYSQLI_ASSOC)){
                            echo "<tr><td>".$row['id']."</td>";
                            echo "<td>".$row['NumeroPedido']."</td>";
                            $codcli=$row['nomcli'];
                              $cmd1 = "SELECT * FROM `e085cli` WHERE `CgcCpf` = '$codcli'";
                              $rs1=mysqli_query($conecta,$cmd1);
                              $row1=mysqli_fetch_array($rs1,MYSQLI_ASSOC);
                              $nomcli=$row1['NomCli'];
                              $cidcli=$row1['CidCli'];
                              $sigufs=$row1['SigUfs'];
                            echo "<td style=\"width: 35%\">".$nomcli."</td>";
                            echo "<td>".$cidcli."</td>";
                            echo "<td>".$sigufs."</td>";
                            echo "<td>0</td>";
                            echo "<td>";
                              if ($row['SitPed'] == 1){
                                echo "<span class='badge bg-info'>Digitado</span>";
                              } else if ($row['SitPed'] == 2){
                                echo "<span class='badge bg-success'>Enviado</span>";
                              } else if ($row['SitPed'] == 3){
                                echo "<span class='badge bg-danger'>Cancelado</span>";
                              }                               
                            echo "</td>";
                            echo "<td>";
                            if ($row['SitPed'] == 1){
                              echo "<a href='#' onclick='window.open('cancelarpedido.php?numped=".$row['NumeroPedido']."', 'Titulo da Janela', 'STATUS=NO, TOOLBAR=NO, LOCATION=YES, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=100, LEFT=400, WIDTH=1400, HEIGHT=618')' class='btn btn-primary'><i class='icon-edit'></i></a>";
                              echo'    |    ';
                              echo "<a href='#' onclick='enviar(id=".$row['id'].",acao=2)' class='btn btn-info'><i class='icon-mail'></i></a>";
                              echo'    |    ';
                              echo "<a href='#' onclick='enviar(id=".$row['id'].",acao=3)' class='btn btn-danger'><i class='icon-trash'></i></a>";
                            } else if ($row['SitPed'] == 2){
                              echo "<a href='#' class='btn btn-dark'><i class='icon-edit'></i></a>";
                            echo'    |    ';
                            echo "<a href='#' class='btn btn-dark'><i class='icon-mail'></i></a>";
                            echo'    |    ';
                            echo "<a href='#' class='btn btn-dark'><i class='icon-trash'></i></a>";
                            } else if ($row['SitPed'] == 3){
                              echo "<a href='#' class='btn btn-dark'><i class='icon-edit'></i></a>";
                            echo'    |    ';
                            echo "<a href='#' class='btn btn-dark'><i class='icon-mail'></i></a>";
                            echo'    |    ';
                            echo "<a href='#' class='btn btn-dark'><i class='icon-trash'></i></a>";
                            }
                            echo"</td></tr>"; 
                            }
                          ?>
                        </tbody>
                      </table>                     
                    </div>
                  </div>
                </div>
                <!-- Card end -->
              </div>
            </div>
            <!-- Row end -->



             

            <!-- Row start -->
            <div class="row gx-3">
              <div class="col-12">
                <!-- Card start -->
                <div class="card mb-3">        
                  <div class="card-body">

                    <div class="mb-2 d-flex justify-content-between">
                      <h5 class="card-title">PEDIDOS FATURADOS</h5>
                    </div>

                    <div class="table-responsive">
                      <table id="scrollVertical" class="table table-striped">
                        <thead>
                          <tr>
                          <th>Número</th>
                          <th>Tipo</th>
                          <th>Cliente</th>
                          <th>Cidade</th>
                          <th>Estado</th>
                          <th>Total</th>
                          <th>Status</th>
                          <th>Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $cmd = "SELECT * FROM `e120ped` WHERE 1";
                            $rs=mysqli_query($conecta,$cmd);								
                            while($row=mysqli_fetch_array($rs,MYSQLI_ASSOC)){
                            echo "<tr><td>".$row['NumPed']."</td>";
                            echo "<td>".$row['TnsPro']."</td>";
                            $codcli=$row['CodCli'];
                              $cmd1 = "SELECT * FROM `e085cli` WHERE `CodCli` = '$codcli'";
                              $rs1=mysqli_query($conecta,$cmd1);
                              $row1=mysqli_fetch_array($rs1,MYSQLI_ASSOC);
                              $nomcli=$row1['NomCli'];
                              $cidcli=$row1['CidCli'];
                              $sigufs=$row1['SigUfs'];
                            echo "<td style=\"width: 35%\">".$nomcli."</td>";
                            echo "<td>".$cidcli."</td>";
                            echo "<td>".$sigufs."</td>";
                            echo "<td>".$row['TotPed']."</td>";
                            echo "<td>";
                              if ($row['SitPed'] == 1){
                                echo "<span class='badge bg-info'>Aberto total</span>";
                              } else if ($row['SitPed'] == 2){
                                echo "<span class='badge bg-warning'>Aberto parcial</span>";
                              } else if ($row['SitPed'] == 4){
                                echo "<span class='badge bg-success'>Faturado</span>";
                              } else if ($row['SitPed'] == 5){
                                echo "<span class='badge bg-danger'>Cancelado</span>";
                              } else {
                                echo "<span class='badge bg-secundary'>Aberto total</span>";
                              }
                              
                            echo "</td>";
                            echo "<td>";
                              echo "<button class='btn btn-outline-primary btn-sm' data-bs-toggle='tooltip'";
                              echo "data-bs-placement='top' data-bs-custom-class='custom-tooltip-primary'";
                              echo "data-bs-title='Itens'>";
                              echo "<a href=\"#\" onclick=\"window.open('itens_pedidos.php?numped=".$row['NumPed']."', 'Titulo da Janela', 'STATUS=NO, TOOLBAR=NO, LOCATION=YES, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=100, LEFT=400, WIDTH=1100, HEIGHT=500')\">
                              <i class='icon-check-circle'></a>";
                              echo "</button>";
                            echo"</td></tr>";                           
                            }
                          ?>
                        </tbody>
                      </table>
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

    <!-- Função enviar -->
    <script type="text/javascript">
      function enviar(id,acao) {
        //alert(acao);
        let url = "http://localhost/pedidos/lista_pedidos.php";
        window.location.href=url+"?id="+id+"&acao="+acao;
      }
    </script>

  </body>

</html>