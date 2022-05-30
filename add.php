<?php

session_start();
$cod_login = $_SESSION["cod_login"];
$codigo_news = $_GET["codigo_news"];

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


$select = "SELECT * FROM $table_contatos WHERE usuario=$cod_login && amigo=$codigo_news ";
$resultado_select = mysqli_query($mysqli, $select);
$quantidade_select = mysqli_num_rows($resultado_select);

if($quantidade_select == 0)
{


$inserir = "INSERT INTO $table_contatos(usuario,amigo) VALUES ($cod_login,$codigo_news)";
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
alert("Você já segue esta pessoa!!");
document.location.href="usuario.php";
</script>
<?php
}

?>
