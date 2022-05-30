<?php
require("../ligar.php");
session_start();
$cod_login = $_SESSION["cod_login"];
$nome_temporario=$_FILES["Arquivo"]["tmp_name"];
$nome_real=$_FILES["Arquivo"]["name"];
$c_nome = $_POST["c_nome"];
$c_genero = $_POST["c_genero"];
$nickname = $_SESSION["nickname"];





$_UP['extensoes'] = array('jpg', 'png', 'gif' , 'jpeg' , 'jpe' , 'jfif' ,'bmp');


$extensao = strtolower(end(explode('.', $_FILES['Arquivo']['name'])));

      if($_FILES['Arquivo']['name'] == '')
      {
                        ?>
                        <script language="javascript">
                        alert("Adicione uma imagem!!");
               document.location.href="cadastrar_curiosidades.php";
                        </script>
                        <?php

                }
                else if (array_search($extensao, $_UP['extensoes']) === false) {
?>
<script language="javascript">
alert("Por favor, envie arquivos com as seguintes extensões: jpg, png , bmp ou gif");
                document.location.href="cadastrar_curiosidades.php";
</script>
<?php
}
                           
                else if($c_nome == '')
                {
                ?>
                   <script language="javascript">
                        alert("Preencha o campo Nome");
                document.location.href="cadastrar_curiosidades.php";
                        </script>
                <?php
                }
               
              

                else
                {


                $nome_revert = str_shuffle($nome_real);









              copy($nome_temporario,"../bandas/$nome_revert.jpg");
                     rename($nome_temporario,$nome_revert);
                           unlink("$nome_revert");

require("../ligar.php");

$insert = "INSERT INTO $table_bandas(usuario,img,nome,nickname,status,genero) VALUES ($cod_login,'$nome_revert.jpg','$c_nome','$nickname', 1, '$c_genero')";
$resultado_update = mysqli_query($mysqli,$insert);



if($resultado_update != 0)
{
?>
<script language="javascript">
alert("Publicado!!")
document.location.href="cadastrar_banda.php";
</script>
<?php
}
else
{
?>
<script language="javascript">
alert("Houve erro contate o administrador!!");
document.location.href="cadastrar_banda.php";
</script>
<?php
}


              }




?>
