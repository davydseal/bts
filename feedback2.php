<?php



require("ligar.php");
session_start();
$cod_login = $_SESSION["cod_login"];
$c_feed = $_POST["c_feed"];
$c_texto = $_POST["c_texto"];
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

if($c_feed == '')
{
?>
<script language="javascript">
alert("Selecione uma opção!!");
history.go(-1)
</script>
<?php
}

else if($c_texto == '')
{
?>
<script language="javascript">
alert("O campo Escreva deve ser preenchido!!");
history.go(-1)
</script>
<?php
}

else
{

$insert = "INSERT INTO $table_feedback(feed,texto, usuario, data, hora, status) VALUES ('$c_feed','$c_texto', $cod_login,'$data', '$hora', 1)";
$resultado_inserir = mysqli_query($mysqli,$insert);

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
alert("Feedback Enviado com Sucesso!!");
document.location.href="usuario.php";
</script>
<?php
}




}



?>
