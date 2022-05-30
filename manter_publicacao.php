<?php

session_start();

$status = $_SESSION["status"];
$system_control = $_SESSION["system_control"];
if(($system_control != 1) || ($status != 1))
{
?>
<script language="javascript">
alert("Acesso Negado!!");
document.location.href="index.php";
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


$delete2= "DELETE FROM $table_report where codigo=$codigo_news";
$resultado2 = mysqli_query($mysqli,$delete2);

if($resultado2 == 0)
{
?>
<script language="javascript">
alert("Houve erro no sistema contate o administrador!!");
document.location.href="index.php";
</script>
<?php
}
else
{
?>
<script language="javascript">
	
history.go(-1)
</script>
<?php
}

?>

<?php
}
?>