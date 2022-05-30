<?php

session_start();

$status = $_SESSION["status"];
$system_control = $_SESSION["system_control"];
if(($system_control != 1) || ($status != 2))
{
?>
<script language="javascript">
alert("Acesso Negado!!");
document.location.href="../index.php";
</script>
<?php
}
else
{

   $cod_login = $_SESSION["cod_login"];
$nickname = $_SESSION["nickname"];
  require("ligar.php");





?>

<?php


$codigo_news = $_GET["codigo_news"];

require("ligar.php");
$delete = "DELETE FROM $table_fotos where codigo=$codigo_news && usuario=$cod_login";
$resultado = mysqli_query($mysqli,$delete);

if($resultado == 0)
{
?>
<script language="javascript">
alert("Houve erro no sistema contate o administrador!!");
document.location.href="ver_fotos.php";
</script>
<?php
}
else
{
?>
<script language="javascript">
	
document.location.href="ver_fotos.php";
</script>
<?php
}

?>

<?php
}
?>