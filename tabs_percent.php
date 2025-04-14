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
                <p class="m-0 small">Opex Ratio</p>
                <h3 class="my-2">62%</h3>
                <p class="m-0 small">
                  <span class="badge bg-danger me-1">
                    <i class="bi bi-arrow-up-right-square"></i>
                    1.69%</span>
                  for Last month
                </p>
              </div>
            </div>
            <div class="px-0 border-end col-xl-3 col-sm-6">
              <div class="text-center">
                <p class="m-0 small">
                  Operating Profit
                </p>
                <h3 class="my-2">48%</h3>
                <p class="m-0 small">
                  <span class="badge bg-danger me-1">
                    <i class="bi bi-arrow-up-right-square"></i>
                    2.9%</span>
                  for Last month
                </p>
              </div>
            </div>
            <div class="px-0 col-xl-3 col-sm-6">
              <div class="text-center">
                <p class="m-0 small">Net Profit</p>
                <h3 class="my-2">32%</h3>
                <p class="m-0 small">
                  <span class="badge bg-dark me-1">
                    <i class="bi bi-arrow-up-right-square"></i>
                    18.5%</span>
                  for Last month
                </p>
              </div>
            </div>
          </div>
          <!-- Row end -->
        </div>
      </div>
    </div>
  </div>