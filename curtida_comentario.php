<?php

session_start();
$cod_login = $_SESSION["cod_login"];
$cod_usuario_post = $_GET["cod_usuario_post"];
$codigo_news = $_GET["codigo_news"];

date_default_timezone_set('America/Sao_paulo');
$data = date("d/m/Y");
$hora = date("H:i");

require("ligar.php");


$select = "SELECT * FROM $table_curtidas_comentarios WHERE usuario=$cod_login && cod_comentario=$codigo_news ";
$resultado_select = mysqli_query($mysqli, $select);
$quantidade_select = mysqli_num_rows($resultado_select);

if($quantidade_select == 0)
{


$inserir = "INSERT INTO $table_curtidas_comentarios(usuario,cod_comentario,cod_usuario_comentario_curtido,data,hora) VALUES ($cod_login,$codigo_news,$cod_usuario_post, '$data', '$hora')";
$resultado_inserir = mysqli_query($mysqli, $inserir);

$atualizar = "UPDATE $table_comentario  SET curtidas = curtidas +1 WHERE codigo=$codigo_news";
$resultado = mysqli_query($mysqli,$atualizar);

if($resultado_inserir == 0)
{
?>
<script language="javascript">
alert("Houve erro no sistema entre em contato com o administrador!!");
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
else
{
?>
<script language="javascript">
alert("Você já curtiu este comentario!!");
history.go(-1)
</script>
<?php
}

?>
