<?php

session_start();
$cod_login = $_SESSION["cod_login"];

$codigo_news = $_GET["codigo_news"];
$c_descricao = $_POST["c_descricao"];
$id_usuario = $_POST["id_usuario"];

date_default_timezone_set('America/Sao_paulo');
$data = date("d/m/Y");
$hora = date("H:i");

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

 if(empty($id_usuario))
          {

?>
               <script language = "JavaScript">
                     alert('Selecione um usuario!!!');
              history.go(-1)
               </script>
<?php
          }
          else{



require("ligar.php");


$select = "SELECT * FROM $table_video_compartilhados WHERE id_post=$codigo_news && id_usuario_compartilhado=$id_usuario ";
$resultado_select = mysqli_query($mysqli, $select);
$quantidade_select = mysqli_num_rows($resultado_select);

if($quantidade_select == 0)
{


$inserir = "INSERT INTO $table_video_compartilhados(id_post,id_compartilhador, descricao, data, hora, id_usuario_compartilhado) VALUES ($codigo_news,$cod_login, '$c_descricao', '$data', '$hora', '$id_usuario')";
$resultado_inserir = mysqli_query($mysqli, $inserir);

$atualizar = "UPDATE $table_video  SET compartilhamentos = compartilhamentos +1 WHERE codigo=$codigo_news";
$resultado = mysqli_query($mysqli,$atualizar);

$atualizar = "UPDATE $table_logins  SET notificacao = notificacao +1 WHERE codigo=$id_usuario";
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
document.location.href="usuario.php";
</script>
<?php
}


}
else
{
?>
<script language="javascript">
alert("você já compartilhou esta publicação com este usuario!!!");
history.go(-1)
</script>
<?php
}
}
?>
