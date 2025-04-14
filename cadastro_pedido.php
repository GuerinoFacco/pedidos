<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Dynamic Invoice Generator</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles_ped.css" />
    <link rel="stylesheet" href="assets/dist/css/select2.min.css">
    <link rel="stylesheet" href="assets/css/main.min.css" />
  </head>
  <body>
    <form action="gravarpedido.php" method="post">
        <div class="invoice-container">
            <div class="invoice-header">
                <div class="title-date">
                    <h2 class="title">Pedido</h2>
                    <input name="DatEmi" style="border: none;" class="date" value="<?php echo date("d/m/Y")?>" readonly ></input>
                    <!--<p class="date"></p>-->
                </div>
                <div class="space"></div>
                <p class="invoice-number">
                    <?php
                        $ano=date('y');
                        $cmd1 = "SELECT MAX(`NumeroPedido`) as numpedido FROM `pedsite` WHERE 1";
                              $rs1=mysqli_query($conecta,$cmd1);
                              $row1=mysqli_fetch_array($rs1,MYSQLI_ASSOC);
                              $numpedido=$row1['numpedido'];
                        $numeroPedido=$numpedido + 1; 
                    ?>     
                <input name="NumeroPedido" class="form-control" value="<?php echo $ano;echo $numeroPedido;?>" readonly ></input>    
                </p>
                
            </div>
            <div class="invoice-header">
                <div class="card mb-3">                        
                    <div class="was-validated">
                    <label for="validationCustom04" class="form-label">Cliente</label>
                    <select name="CgcCpf" class="form-select" id="single-select-field" data-placeholder="Escolha...">
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
            </div>
            <div class="invoice-body">
                <table>
                    <thead>
                        <th>#</th>
                        <th style="padding-left:12px;">PRODUTO</th>
                        <th>QUANTIDADE</th>
                        <th>PREÇO</th>
                        <th>SUBTOTAL</th>
                        <th style="text-align: right;">AÇÂO</th>
                    </thead>

                    <tbody id="table-body">
                    <tr class="single-row">
                        <td><input type="number" value="1" name="id" class="idProd"></td>
                        <td><input type="text" placeholder="Produto" name="produto" class="product left"></td>
                        <td><input type="number" placeholder="0" name="unit" class="unit" id="unit" onkeyup="getInput()"></td>
                        <td><input type="number" placeholder="0" name="price" class="price" id="price" onkeyup="getInput()"></td>
                        <td><input type="number" placeholder="0" name="amount" class="amount" id="amount" disabled></td>
                        <td style="text-align: right;"><span class="material-icons">delete_outline</span></td>
                    </tr>
                    
                    <tr style="padding-left: 20px">
                        <td class="dashed "><div class="float">
                            <a href="#" class="float" id="add-row">
                                <span class="material-icons plus">add</span>
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
                <div id="sum"><input type="text" placeholder="0.00" name="total" class="total" id="total" disabled></div>

            </div>
            <div class="col-12">
                <div style="text-align:start;" >
                  <button style="background-color: green; color: white; width: 110px; height: 50px; border: none;" class="btn btn-outline-primary" type="submit">
                    Gravar pedido
                  </button>                            
                </div>
            </div>
        </div>
        
    </form>
  
  <script src="assets/js/script_ped.js"></script>
  </body>
</html>