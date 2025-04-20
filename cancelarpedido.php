<?php
include "config.php";
$conecta = mysqli_connect($host, $user, $pass, $banco);
if (mysqli_connect_errno())
  {
  echo "Falha ao conectar o MySQL: " . mysqli_connect_error();
  }
  $numped = $_GET['numped'];
?>

<?php
$cmd = "UPDATE `pedsite` SET `SitPed`='3' WHERE `NumeroPedido`=".$numped;

$rs=mysqli_query($conecta,$cmd);

if($rs){
	echo  'Pedido Cancelado!';
	echo "<button type=\"botton\" class=\"btn btn-default\" onclick=\"window.close()\">Sair</button>";
}else{
echo "Erro ao atualizar campos!"; 
}

?>