<?php
include "config.php";
$conecta = mysqli_connect($host, $user, $pass, $banco);
if (mysqli_connect_errno())
  {
  echo "Falha ao conectar o MySQL: " . mysqli_connect_error();
  }
  ?>
<!-- Card start -->
<div class="card mb-3">
  <div class="card-header">
      <div class="card-title">Lista de títulos</div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="scrollVertical" class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Título</th>
              <th>Cliente</th>
              <th>Cidade</th>
              <th>Estado</th>
              <th>Data Vencimento</th>
              <th>Valor</th>
              <th>Situação</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $cmd = "SELECT * FROM `e301tcr` WHERE 1";
              $rs=mysqli_query($conecta,$cmd);								
              while($row=mysqli_fetch_array($rs,MYSQLI_ASSOC)){
              echo "<tr><td>".$row['id']."</td>";
              echo "<td>".$row['NumTit']."</td>";
              $codcli=$row['CodCli'];
              $cmd2 = "SELECT * FROM `e085cli` WHERE `CodCli` = '$codcli'";
                              $rs2=mysqli_query($conecta,$cmd2);
                              $row2=mysqli_fetch_array($rs2,MYSQLI_ASSOC);
                              $nomcli=$row2['NomCli'];
                              $cidcli=$row2['CidCli'];
                              $sigufs=$row2['SigUfs'];
              echo "<td style=\"width: 35%\">".$nomcli."</td>";
              echo "<td>".$cidcli."</td>";
              echo "<td>".$sigufs."</td>";
              echo "<td>".$row['VctTit']."</td>";
              
              echo "<td>";
              $valor_formatado = number_format($row['VlrAbe'], 2, ',', '.');
              echo "R$ " . $valor_formatado; 
              echo "</td>";
              echo "<td>";
              $timeZone = new DateTimeZone('UTC');
              $dataAtual= date("d/m/Y");
              $data1 = DateTime::createFromFormat ('d/m/Y', $dataAtual, $timeZone);
              $dataTitulo=$row['VctTit'];
              $data2 = DateTime::createFromFormat ('d/m/Y', $dataTitulo, $timeZone);
                              if ($data2 < $data1){
                                echo "<span class='badge bg-danger'>Atrasado</span>";
                              } else if ($data2 == $data1){
                                echo "<span class='badge bg-warning'>Hoje</span>";
                              } else if ($data2 > $data1){
                                echo "<span class='badge bg-success'>Futuro</span>";
                              }                               
                            echo "</td></tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
  <!-- Card end -->