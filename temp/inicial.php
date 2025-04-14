<?php
include_once "./config.php";
	
	$provenda=$_GET['usu'];
	$DesCli='';	
	$CgcCpf='';	
	$InsEst='';	
	$EndCli='';
	$NunCli='';
	$CidCli='';
	$SigUfs='';
	$BaiCli='';
	$NonFan='';
	$Email='';
	$FonCli='';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Relatório de visitas</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/opensans-font.css">
	<link rel="stylesheet" type="text/css" href="css/material-design-iconic-font.min.css">
	<!-- datepicker -->
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	
</head>
<body>
	<div class="page-content">
		<div class="wizard-heading">Perfil do cliente</div>
				<form class="form-register" id="form-register" action="" method="post">	
					<div class="inner">	
						<div class="form-row">														
							<label class="form-row-inner"> 
								<input type="text" class="form01" name="cliente" id="cliente" placeholder="Digite a razão social do cliente">
								<input type="submit" class="botton01" name="SendPesqCli" value="Pesquisar">									
							</label>							
						</div>
					</div>		
				</form>
	
		
			<?php
        $SendPesqCli = filter_input(INPUT_POST, 'SendPesqCli', FILTER_SANITIZE_STRING);
        if ($SendPesqCli) {
            $NonFan = filter_input(INPUT_POST, 'cliente', FILTER_SANITIZE_STRING);
            $result_cli_cont = "SELECT * FROM `clientes` WHERE `NonFan` like '%".$NonFan."%' order by codcli asc limit 10" ;
            $resultado_cli_cont = $conn->prepare($result_cli_cont);
            $resultado_cli_cont->execute();

			while($row_msg_cont = $resultado_cli_cont->fetch(PDO::FETCH_ASSOC)){
                $CodCli = $row_msg_cont['CodCli'];
                $DesCli = $row_msg_cont['Descli'];
				$CgcCpf = $row_msg_cont['CgcCpf'];
				$InsEst = $row_msg_cont['InsEst'];
				$EndCli = $row_msg_cont['EndCli'];
				$NunCli = $row_msg_cont['NunCli'];
				$CidCli = $row_msg_cont['CidCli'];
				$SigUfs = $row_msg_cont['SigUfs'];
				$BaiCli = $row_msg_cont['BaiCli'];
				$NonFan = $row_msg_cont['NonFan'];
				$Email  = $row_msg_cont['Email'];
				$FonCli = $row_msg_cont['FonCli'];
            }
        }
    ?>


		<div class="wizard-v6-content">
			<div class="wizard-form">
		        <form class="form-register" id="form-register" action="" method="post">
		        	<div id="form-total">
		        		<!-- SECTION 1 -->
			            <h2>
			            	<p class="step-icon"><span>1</span></p>
			            	<span class="step-text">Dados do cliente</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<div class="form-heading">
			                		<h3>Cliente</h3>
											
			                		<span>1/3</span>
			                	</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="descli" name="descli" value="<?php echo $DesCli;?>">
											<span class="label">Razão Social</span>
										</label>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="cgccpf" name="cgccpf" value="<?php echo $CgcCpf;?>">
											<span class="label">CNPJ/CPF</span>
										</label>
									</div>
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" name="insest" id="insest" value="<?php echo $InsEst;?>">
											<span class="label">Inscrição Estadual</span>
										</label>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $EndCli;?>">
											<span class="label">Endereço</span>
										</label>
									</div>
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" name="baicli" id="baicli" value="<?php echo $NunCli;?>">
											<span class="label">Número</span>
										</label>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" name="baicli" id="baicli" value="<?php echo $BaiCli;?>">
											<span class="label">Bairro</span>
										</label>
									</div>
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" name="foncli" id="foncli" value="<?php echo $FonCli;?>">
											<span class="label">Telefone</span>
										</label>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" name="cidcli" id="cidcli" value="<?php echo $CidCli;?>">
											<span class="label">Cidade</span>
										</label>
									</div>
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="sigufs" name="sigufs" value="<?php echo $SigUfs;?>">
											<span class="label">Estado</span>
										</label>
									</div>
									
								</div>
								<div class="form-row">
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" name="nonfan" id="nonfan" value="<?php echo $NonFan;?>">
											<span class="label">Nome Fantasia</span>
										</label>
									</div>
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="email" name="email" value="<?php echo $Email;?>">
											<span class="label">Email</span>
										</label>
									</div>
								</div>
								
							</div>
			            </section>
						<!-- SECTION 2 -->
			            <h2>
			            	<p class="step-icon"><span>2</span></p>
			            	<span class="step-text">Dados da visita</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<div class="form-heading">
			                		<h3>Informações</h3>
			                		<span>2/3</span>
			                	</div>
								<div class="form-row">
									<div class="form-holder">
										<label for="day" class="special-label-1">Data da visita</label>
										<input type="text" name="day" class="day" id="day" placeholder="dd/mm/aaaa">
									</div>
								</div>
		                		<div class="form-row">
									<div class="form-holder">
										<label for="motivo" class="special-label-1">Motivo da Visita </label>
										<select name="motivo" id="motivo" class="form-control">
											<option value="1" selected>Treinamento balcão/Equipe</option>
											<option value="2">Visita para introdução de produtos</option>
											<option value="3">Visita para prospectar novo cliente</option>
											<option value="4">Visita técnica a médico veterinário</option>
											<option value="5">Visita em campo (fazenda, haras, propriedades rurais)</option>
											<option value="6">Feiras e eventos</option>
											<option value="7">Treinamento online</option>
										</select>
										<span class="select-btn">
											<i class="zmdi zmdi-chevron-down"></i>
										</span>
									</div>
									<div class="form-holder">
										<label for="canal" class="special-label-1">Canal de vendas </label>
										<select name="canal" id="canal" class="form-control">
											<option value="1" selected>Varejo/Revenda</option>
											<option value="2">Atacado/Distribuidor</option>
											<option value="3">Cooperativa</option>
											<option value="4">Clínica Veterinária</option>
											<option value="5">Produtor Rural</option>
											<option value="6">Associativismo</option>
											<option value="7">E-commerce</option>
										</select>
										<span class="select-btn">
											<i class="zmdi zmdi-chevron-down"></i>
										</span>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder">
										<label for="segmento" class="special-label-1">Segmento principal </label>
										<select name="segmento" id="segmento" class="form-control">
											<option value="1" selected>Pet</option>
											<option value="2">Produção</option>
											<option value="3">Misto</option>
										</select>
										<span class="select-btn">
											<i class="zmdi zmdi-chevron-down"></i>
										</span>
									</div>
									<div class="form-holder">
										<label for="especie" class="special-label-1">Especialização </label>
										<select name="especie" id="especie" class="form-control">
											<option value="1" selected>Pet</option>
											<option value="2">Bovino</option>
											<option value="3">Equino</option>
											<option value="4">Varias</option>
										</select>
										<span class="select-btn">
											<i class="zmdi zmdi-chevron-down"></i>
										</span>
									</div>
								</div>

								<div class="form-row">
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" name="cont_compra" id="cont_compra" >
											<span class="label">Contato compras</span>
										</label>
									</div>
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="email_conpra" name="email_conpra">
											<span class="label">Email</span>
										</label>
									</div>
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="telefone_compra" name="telefone_compra">
											<span class="label">Telefone</span>
										</label>
									</div>
								</div>
								
								<div class="form-row">
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" name="cont_vet" id="cont_vet" >
											<span class="label">Contato Médico Veterinário</span>
										</label>
									</div>
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="email_vet" name="email_vet">
											<span class="label">Email</span>
										</label>
									</div>
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="telefone_vet" name="telefone_vet">
											<span class="label">Telefone</span>
										</label>
									</div>
								</div>


								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label class="form-row-inner">
											<textarea type="text" class="form-control" id="obs" name="obs" value=""></textarea>
											<span class="label">Observações durante a visita</span>
										</label>
									</div>
								</div>
								
							</div>
			            </section>
			            <!-- SECTION 3 -->
			            <h2>
			            	<p class="step-icon"><span>3</span></p>
			            	<span class="step-text">Confirmação</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<div class="form-heading">
			                		<h3>Resumo da visita</h3>
			                		<span>3/3</span>
			                	</div>
								<div class="table-responsive">
									<table class="table">
										<tbody>
											<tr class="space-row">
												<th>Cliente:</th>
												<td id="descli-val"></td>
											</tr>										
											<tr class="space-row">
												<th>Motivo da Visita:</th>	
												<td id="motivo-val"></td>									
											</tr>
											<tr class="space-row">																						
												<th>Canal de vendas:</th>	
												<td id="canal-val"></td>												
											</tr>
											<tr class="space-row">
												<th>Segmento principal:</th>												
												<td id="segmento-val"></td>										
											</tr>
											<tr class="space-row">												
												<th>Especialização:</th>	
												<td id="especie-val"></td>
											</tr>
											<tr class="space-row">												
												<th>Contato Compras:</th>	
												<td id="compra-val"></td>
											</tr>
											<tr class="space-row">												
												<th>Médico Veterinário:</th>	
												<td id="medico-val"></td>
											</tr>

											<tr class="space-row">
												<th>Observação:</th>
												<td id="obs-val"></td>
											</tr>

										</tbody>
									</table>
								</div>
							</div>
			            </section>
		        	</div>
		        </form>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/jquery.steps.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>
	<script>
		$(function(){
			$("#cliente").autocomplete({
				source:'proc_pesq_cli.php'
			})
		});
	</script>
</body>
</html>