<?php

$c_comentario = $_POST["c_comentario"];
$c_post = $_POST["c_post"];

date_default_timezone_set('America/Sao_paulo');
$data = date("d/m/Y");
$hora = date("H:i");


require("ligar.php");
session_start();
$cod_login = $_SESSION["cod_login"];
$nickname = $_SESSION["nickname"];
if($c_comentario == '')
{
?>
<script language="javascript">
alert("Preencha o campo comentario!!");
history.go(-1)
</script>
<?php
}

else
{

$insert = "INSERT INTO $table_comentario_produto(cod_produto, usuario, comentario, data, hora) VALUES ('$c_post', $cod_login, '$c_comentario', '$data', '$hora')";
$resultado_inserir = mysqli_query($mysqli,$insert);

$atualizar = "UPDATE $table_post  SET comentarios = comentarios +1 WHERE codigo=$c_post";
$resultado = mysqli_query($mysqli,$atualizar);

if($resultado_inserir == 0)
{
?>
<script language="javascript">
alert("Falha ao Enviar!!");
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




}



?>
