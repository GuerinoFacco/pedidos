<?php
include "config.php";
$conecta = mysqli_connect($host, $user, $pass, $banco);
	if (mysqli_connect_errno()){
	echo "Falha ao conectar o MySQL: " . mysqli_connect_error();
	}
session_start();
$NumeroPedido = $_POST['NumeroPedido'];
echo $NumeroPedido;
echo "</br>";
$CgcCpf = $_POST['CgcCpf'];
echo $CgcCpf;
echo "</br>";
$DatEmi = $_POST['DatEmi'];
echo $DatEmi;
echo "</br>";
$id = $_POST['id'];
echo $id;
echo "</br>";
$id = $_POST['produto'];
echo $id;
echo "</br>";
$id = $_POST['unit'];
echo $id;
echo "</br>";
$id = $_POST['price'];
echo $id;
echo "</br>";


/*$TipCli = $_POST['TipCli'];

$EndCli = $_POST['EndCli'];
$BaiCli = $_POST['BaiCli'];
$CepCli = $_POST['CepCli'];
$CidCli = $_POST['CidCli'];
$SigUfs = $_POST['SigUfs'];
$codrep=$_SESSION['CodRep'];*/
/*
$cmd = "INSERT INTO `e085cli`(`id`, `CodCli`, `NomCli`, `TipCli`, `CgcCpf`, `EndCli`, `CepCli`, `BaiCli`, `CidCli`, `SigUfs`, `CodRep`) VALUES (NULL,NULL,'".$NomCli."','".$TipCli."','".$CgcCpf."','".$EndCli."','".$BaiCli."','".$CepCli."','".$CidCli."','".$SigUfs."','".$codrep."')";

$rs=mysqli_query($conecta,$cmd);

if($rs){
	echo  'Cliente incluso!';
	echo "<button type=\"botton\" class=\"btn btn-default\" onclick=\"window.close()\">Sair</button>";
}else{
echo "Erro ao atualizar campos!"; 
}
*/
?>
