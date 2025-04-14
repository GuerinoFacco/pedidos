<?php
include "config.php";
$conecta = mysqli_connect($host, $user, $pass, $banco);
	if (mysqli_connect_errno()){
	echo "Falha ao conectar o MySQL: " . mysqli_connect_error();
	}
session_start();
$NomCli = $_POST['NomCli'];
$TipCli = $_POST['TipCli'];
$tipo = substr($TipCli,0,1);
$CgcCpf = $_POST['CgcCpf'];
$EndCli = $_POST['EndCli'];
$BaiCli = $_POST['BaiCli'];
$CepCli = $_POST['CepCli'];
$CidCli = $_POST['CidCli'];
$SigUfs = $_POST['SigUfs'];
$codrep=$_SESSION['CodRep'];

$cmd = "INSERT INTO `e085cli`(`id`, `CodCli`, `NomCli`, `TipCli`, `CgcCpf`, `EndCli`, `CepCli`, `BaiCli`, `CidCli`, `SigUfs`, `CodRep`) VALUES (NULL,NULL,'".$NomCli."','".$tipo."','".$CgcCpf."','".$EndCli."','".$CepCli."','".$BaiCli."','".$CidCli."','".$SigUfs."','".$codrep."')";

$rs=mysqli_query($conecta,$cmd);

if($rs){
	echo  'Cliente incluso!';
	echo "<button type=\"botton\" class=\"btn btn-default\" onclick=\"window.close()\">Sair</button>";
}else{
echo "Erro ao atualizar campos!"; 
}

?>
