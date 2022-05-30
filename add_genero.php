<?php

session_start();
$cod_login = $_SESSION["cod_login"];

$codigo_news = $_GET["codigo_news"];
require("ligar.php");


$select = "SELECT * FROM $table_add_genero WHERE usuario=$cod_login && genero=$codigo_news ";
$resultado_select = mysqli_query($mysqli, $select);
$quantidade_select = mysqli_num_rows($resultado_select);

if($quantidade_select == 0)
{


$inserir = "INSERT INTO $table_add_genero(usuario,genero) VALUES ($cod_login,$codigo_news)";
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

document.location.href="usuario.php";
</script>
<?php
}


}
else
{
?>
<script language="javascript">
alert("Você já adicionou esse gênero a sua lista!!");
document.location.href="usuario.php";
</script>
<?php
}

?>
