<?php
require("ligar.php");
session_start();
$cod_login = $_SESSION["cod_login"];
$status = $_SESSION["status"];
$nickname = $_SESSION["nickname"];
$system_control = $_SESSION["system_control"];
date_default_timezone_set('America/Sao_paulo');
$data = date("d/m/Y");
$hora = date("H:i");
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

$to = $_POST["c_enviar2"];
$texto = $_POST["c_texto"];
if($to == '')
{
?>
<script language="javascript">
alert("Selecione um usuario!");
history.go(-1)
</script>
<?php
}
else if($texto == '')
{
?>
<script language="javascript">
alert("Preencha o campo Texto");
history.go(-1)
</script>
<?php
}
else
{

$consultar_usuario = "SELECT * FROM $table_logins WHERE nickname='$to'";
$resultado_usuario = mysqli_query($mysqli, $consultar_usuario);
$quantidade_usuario = mysqli_num_rows($resultado_usuario);

if($quantidade_usuario == 0)
{
?>
<script language="javascript">
alert("Usuario Inexistente!!");
history.go(-1)
</script>
<?php
}
else
{
$vetor = mysqli_fetch_array($resultado_usuario);

$insert = "INSERT INTO $table_sms(destino,texto,enviador,nickname,data,hora) VALUES ($vetor[0],'$texto',$cod_login,'$nickname','$data', '$hora')";
$resultado_insert = mysqli_query($mysqli, $insert);

if($resultado_insert == 0)
{
?>
<script language="javascript">
alert("Houve erro no sistema Contate o administrador!!");
document.location.href="index.php";
</script>
<?php
}
else
{
?>
<script language="javascript">
alert("Mensagem Enviada com Sucesso!");
history.go(-1)
</script>
<?php
}


 }
}

}
?>
