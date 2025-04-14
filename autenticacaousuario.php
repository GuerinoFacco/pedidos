<?php
include "config.php";
$conecta = mysqli_connect($host, $user, $pass, $banco);
if (mysqli_connect_errno())
  {
  echo "Falha ao conectar o MySQL: " . mysqli_connect_error();
  }
session_start();
?>

<html>
<head>
<title>Autentica&ccedil;&atilde;o</title>
<script type="text/javascript">
function loginOFF(){
    setTimeout("window.location='index.php'",3000);
}   
</script>
</head>

<body>
<?php
$email=$_POST['email'];
$senha=$_POST['senha'];

$sql = "SELECT * FROM `usuarios` WHERE email = '$email' and senha = '$senha'";
$rs=mysqli_query($conecta,$sql);
$row=mysqli_fetch_array($rs,MYSQLI_ASSOC);

if (empty($row['email']) === false){
    $_SESSION['email']=$row['email'];
    $_SESSION['senha']=$row['senha'];
	$_SESSION['nome'] =$row['nome'];
    $_SESSION['foto']=$row['foto'];
    $_SESSION['CodRep']=$row['CodRep'];
	
    echo "<h1>Ok - Aguarde um pouco!</h1>";
        header("Location: inicial.php");
        exit();	
									}
else {
     echo "<h1>ERRO - Aguarde um pouco para tentar novamente!</h1>";
     echo "<script>loginOFF()</script>";   
     } 
?>
</body>
</html>