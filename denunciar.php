<?php

session_start();
$cod_login = $_SESSION["cod_login"];

$codigo_news = $_GET["codigo_news"];
$cod_usuario_post = $_GET["cod_usuario_post"];


date_default_timezone_set('America/Sao_paulo');
$data = date("d/m/Y");
$hora = date("H:i");

require("ligar.php");


$select = "SELECT * FROM $table_report WHERE id_reportador=$cod_login && id_post=$codigo_news ";
$resultado_select = mysqli_query($mysqli, $select);
$quantidade_select = mysqli_num_rows($resultado_select);

if($quantidade_select == 0)
{


$inserir = "INSERT INTO $table_report(id_post,id_reportador, data, hora,id_usuario_reportado) VALUES ($codigo_news,$cod_login, '$data', '$hora',$cod_usuario_post)";
$resultado_inserir = mysqli_query($mysqli, $inserir);



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
alert("Você reportou esta publicação!!");
history.go(-1)
</script>
<?php
}


}
else
{
?>
<script language="javascript">
alert("Você já denunciou esta publicação!!");
document.location.href="usuario.php";
</script>
<?php
}

?>
