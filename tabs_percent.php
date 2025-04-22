<?php
include "config.php";
$conecta = mysqli_connect($host, $user, $pass, $banco);
if (mysqli_connect_errno())
  {
  echo "Falha ao conectar o MySQL: " . mysqli_connect_error();
  }
  ?>

<div class="row gx-3">
    <div class="col-12">
      <div class="card mb-3">
        <div class="card-body">
          <!-- Row start -->
          <div class="row g-4">
            <div class="px-0 border-end col-xl-3 col-sm-6">
              <div class="text-center">
                <p class="m-0 small">Títulos em atraso</p>
                <h3 class="my-2">
                  <?php
                $cmd3 = "SELECT COUNT(NumTit) as titven FROM `e301tcr` WHERE STR_TO_DATE(`VctTit`, '%d/%m/%Y') <= CURDATE();";
                              $rs3=mysqli_query($conecta,$cmd3);
                              $row3=mysqli_fetch_array($rs3,MYSQLI_ASSOC);
                              echo $row3['titven'];   
                  ?>
              </h3>
                <p class="m-0 small">
                  <span class="badge bg-danger me-1">
                    <i class="bi bi-arrow-down-left-square"></i>
                      <?php
                      $cmd4 = "SELECT SUM(VlrAbe) as vlrven FROM `e301tcr` WHERE STR_TO_DATE(`VctTit`, '%d/%m/%Y') <= CURDATE()";
                      $rs4=mysqli_query($conecta,$cmd4);
                      $row4=mysqli_fetch_array($rs4,MYSQLI_ASSOC);
                      $vlrven=$row4['vlrven'];
                      $cmd5 = "SELECT SUM(VlrAbe) as vlrtotal FROM `e301tcr` WHERE 1";
                      $rs5=mysqli_query($conecta,$cmd5);
                      $row5=mysqli_fetch_array($rs5,MYSQLI_ASSOC);
                      $vlrtotal=$row5['vlrtotal'];
                      echo round((($vlrven/$vlrtotal)*100),2)."%";
                      ?>
                    </span>
                  do total em valor
                </p>
              </div>
            </div>
            <div class="px-0 border-end col-xl-3 col-sm-6">
              <div class="text-center">
                <p class="m-0 small">Pedidos não enviados</p>
                <h3 class="my-2">
                  <?php
                      $cmd7 = "SELECT COUNT(`NumeroPedido`) as pednaoenv FROM `pedsite` WHERE `SitPed` = 1";
                      $rs7=mysqli_query($conecta,$cmd7);
                      $row7=mysqli_fetch_array($rs7,MYSQLI_ASSOC);
                      $pednaoenv=$row7['pednaoenv'];
                      echo $pednaoenv;
                  ?>
                </h3>
                <p class="m-0 small">
                  <span class="badge bg-danger me-1">
                    <i class="bi bi-arrow-up-right-square"></i>
                    <?php
                      $cmd8 = "SELECT SUM(pedsiteitems.qtdped*pedsiteitems.preuni) as vlrpedidos FROM pedsiteitems,pedsite WHERE pedsite.id=pedsiteitems.pedsite_id and pedsite.sitped = 1";
                      $rs8=mysqli_query($conecta,$cmd8);
                      $row8=mysqli_fetch_array($rs8,MYSQLI_ASSOC);
                      $vlrpedidos=$row8['vlrpedidos'];
                      echo "R$ ".round(($vlrpedidos),2);  
                      ?>
                  </span>
                  não fechados
                </p>
              </div>
            </div>
            <div class="px-0 border-end col-xl-3 col-sm-6">
              <div class="text-center">
                <p class="m-0 small">
                  Pedidos em carteira
                </p>
                <h3 class="my-2">
                <?php
                      $cmd9 = "SELECT COUNT(`NumPed`) as pedabe FROM `e120ped` WHERE `SitPed`=1";
                      $rs9=mysqli_query($conecta,$cmd9);
                      $row9=mysqli_fetch_array($rs9,MYSQLI_ASSOC);
                      $pedabe=$row9['pedabe'];
                      echo $pedabe;
                  ?>
                </h3>
                <p class="m-0 small">
                  <span class="badge bg-danger me-1">
                    <i class="bi bi-arrow-up-right-square"></i>
                    <?php
                      $cmd10 = "SELECT SUM(`TotPed`) as vlrcart FROM `e120ped` WHERE `SitPed`=1";
                      $rs10=mysqli_query($conecta,$cmd10);
                      $row10=mysqli_fetch_array($rs10,MYSQLI_ASSOC);
                      $vlrcart=$row10['vlrcart'];
                      echo "R$ ".round(($vlrcart),2);  
                    ?>  
                  </span>
                  em carteira
                </p>
              </div>
            </div>
            <div class="px-0 col-xl-3 col-sm-6">
              <div class="text-center">
                <p class="m-0 small">Clientes sem compra</p>
                <h3 class="my-2">
                <?php
                      $cmd11 = "SELECT COUNT(*) as clisem FROM e085cli T1 WHERE not exists (SELECT 1 FROM e120ped T2 WHERE t2.codcli = t1.codcli)";
                      $rs11=mysqli_query($conecta,$cmd11);
                      $row11=mysqli_fetch_array($rs11,MYSQLI_ASSOC);
                      $clisem=$row11['clisem'];
                      echo $clisem;  
                    ?> 
                </h3>
                <p class="m-0 small">
                  <span class="badge bg-dark me-1">
                    <i class="bi bi-arrow-up-right-square"></i>
                    <?php
                      $cmd12 = "SELECT COUNT(DISTINCT(`CodCli`)) as clicom FROM `e120ped` WHERE 1";
                      $rs12=mysqli_query($conecta,$cmd12);
                      $row12=mysqli_fetch_array($rs12,MYSQLI_ASSOC);
                      $clicom=$row12['clicom'];
                      echo $clicom;  
                    ?> 
                  </span>
                  atendidos em 2025
                </p>
              </div>
            </div>
          </div>
          <!-- Row end -->
        </div>
      </div>
    </div>
  </div>