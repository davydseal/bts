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
$codigo_post = $_GET["codigo_post"];
  require("ligar.php");





?>

<?php


$codigo_news = $_GET["codigo_news"];

require("ligar.php");
$delete = "DELETE FROM $table_comentario where codigo=$codigo_news && usuario=$cod_login || codigo=$codigo_news && cod_usuario_post=$cod_login";



$atualizar = "UPDATE $table_post  SET comentarios = comentarios -1 WHERE codigo=$codigo_post";
$resultado = mysqli_query($mysqli,$atualizar);



$resultado = mysqli_query($mysqli,$delete);

if($resultado == 0)
{
?>
<script language="javascript">
alert("Houve erro no sistema contate o administrador!!");
document.location.href="usuario.php";
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