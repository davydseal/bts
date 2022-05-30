<?php
require("../ligar.php");
session_start();
$cod_login = $_SESSION["cod_login"];
$nome_temporario=$_FILES["Arquivo"]["tmp_name"];
$nome_real=$_FILES["Arquivo"]["name"];
$c_descricao = $_POST["c_descricao"];
$nickname = $_SESSION["nickname"];

date_default_timezone_set('America/Sao_paulo');
$data = date("d/m/Y");
$hora = date("H:i");



$_UP['extensoes'] = array('jpg', 'png', 'gif' , 'jpeg' , 'jpe' , 'jfif' ,'bmp');


$extensao = strtolower(end(explode('.', $_FILES['Arquivo']['name'])));

      if($_FILES['Arquivo']['name'] == '')
      {
                        ?>
                        <script language="javascript">
                        alert("Adicione uma imagem!!");
               document.location.href="cadastrar_fotos_index.php";
                        </script>
                        <?php

                }
                else if (array_search($extensao, $_UP['extensoes']) === false) {
?>
<script language="javascript">
alert("Por favor, envie arquivos com as seguintes extensões: jpg, png , bmp ou gif");
                document.location.href="cadastrar_fotos_index.php";
</script>
<?php
}
                           
               
                else if($c_descricao == '')
                {
                ?>
                   <script language="javascript">
                        alert("Preencha o campo Titulo");
                document.location.href="cadastrar_fotos_index.php";
                        </script>
                <?php
                }
               

                else
                {


                $nome_revert = str_shuffle($nome_real);









              copy($nome_temporario,"../img/$nome_revert.jpg");
                     rename($nome_temporario,$nome_revert);
                           unlink("$nome_revert");

require("../ligar.php");

$insert = "INSERT INTO $table_fotos_login(usuario,img,descricao,nickname, data, hora, status) VALUES ($cod_login,'$nome_revert.jpg','$c_descricao','$nickname', '$data', '$hora', 1)";
$resultado_update = mysqli_query($mysqli,$insert);



if($resultado_update != 0)
{
?>
<script language="javascript">
alert("Publicado!!")
document.location.href="cadastrar_fotos_index.php";
</script>
<?php
}
else
{
?>
<script language="javascript">
alert("Houve erro ao adicionar o album contate o administrador!!");
document.location.href="cadastrar_fotos_index.php";
</script>
<?php
}


              }




?>
