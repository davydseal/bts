<?php

session_start();
$cod_login = $_SESSION["cod_login"];

$codigo_news = $_GET["codigo_news"];
$cod_usuario_post = $_GET["cod_usuario_post"];

 require("ligar.php");                                       

                       $consulta_exp = "SELECT * FROM $table_logins WHERE codigo=$cod_login && exp = 1000000";
                       $resultado_consulta_exp = mysqli_query($mysqli, $consulta_exp);
                       $quantos_registros_exp = mysqli_num_rows($resultado_consulta_exp);

                       if($quantos_registros_exp != 0)
                       {

                       }
                
                       else
                       {
                                                            

 
           require("ligar.php");


$expp = "UPDATE $table_logins  SET exp = exp +100 WHERE codigo=$cod_login";
$resultado_exp = mysqli_query($mysqli,$expp);          

                    
}



require("ligar.php");


$select = "SELECT * FROM $table_curtidas WHERE cod_usuario=$cod_login && cod_post=$codigo_news ";
$resultado_select = mysqli_query($mysqli, $select);
$quantidade_select = mysqli_num_rows($resultado_select);

if($quantidade_select == 0)
{


$inserir = "INSERT INTO $table_curtidas(cod_post,cod_usuario,cod_usuario_post) VALUES ($codigo_news,$cod_login,$cod_usuario_post)";
$resultado_inserir = mysqli_query($mysqli, $inserir);

$atualizar = "UPDATE $table_post  SET curtidas = curtidas +1 WHERE codigo=$codigo_news";
$resultado = mysqli_query($mysqli,$atualizar);

$atualizar = "UPDATE $table_logins  SET notificacao = notificacao +1 WHERE codigo=$cod_usuario_post";
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
alert("você não pode curtir mais de uma vez a postagem!!");
document.location.href="usuario.php";
</script>
<?php
}

?>
