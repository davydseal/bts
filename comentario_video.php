<?php

$c_comentario = $_POST["c_comentario"];
$c_post = $_POST["c_post"];
$cod_usuario_post = $_POST["cod_usuario_post"];

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
alert("O campo comentario é obrigatório!!");
history.go(-1)
</script>
<?php
}

else
{

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

$insert = "INSERT INTO $table_comentario_video(post, usuario, comentario, status, data, hora, cod_usuario_post) VALUES ('$c_post', $cod_login, '$c_comentario', 1, '$data', '$hora', '$cod_usuario_post')";
$resultado_inserir = mysqli_query($mysqli,$insert);

$atualizar = "UPDATE $table_video  SET comentarios = comentarios +1 WHERE codigo=$c_post";
$resultado = mysqli_query($mysqli,$atualizar);

$atualizar = "UPDATE $table_logins  SET notificacao = notificacao +1 WHERE codigo=$cod_usuario_post";
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
