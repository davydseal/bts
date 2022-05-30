<?php
require("../ligar.php");
session_start();
$cod_login = $_SESSION["cod_login"];
$nome_temporario=$_FILES["Arquivo"]["tmp_name"];
$nome_real=$_FILES["Arquivo"]["name"];
$c_genero = $_POST["c_genero"];
$nickname = $_SESSION["nickname"];





$_UP['extensoes'] = array('jpg', 'png', 'gif' , 'jpeg' , 'jpe' , 'jfif' ,'bmp');


$extensao = strtolower(end(explode('.', $_FILES['Arquivo']['name'])));

      if($_FILES['Arquivo']['name'] == '')
      {
                        ?>
                        <script language="javascript">
                        alert("Adicione uma imagem!!");
                        history.go(-1)
                        </script>
                        <?php

                }
                else if (array_search($extensao, $_UP['extensoes']) === false) {
?>
<script language="javascript">
alert("Por favor, envie arquivos com as seguintes extens�es: jpg, png , bmp ou gif");
history.go(-1)
</script>
<?php
}
                           
                else if($c_genero == '')
                {
                ?>
                   <script language="javascript">
                        alert("Preencha o campo Titulo");
                        history.go(-1)
                        </script>
                <?php
                }
               
               

                else
                {


                $nome_revert = str_shuffle($nome_real);









              copy($nome_temporario,"../generos_musicais/$nome_revert.jpg");
                     rename($nome_temporario,$nome_revert);
                           unlink("$nome_revert");

require("../ligar.php");

$insert = "INSERT INTO $table_generos_musicais(usuario,img,genero,nickname, status) VALUES ($cod_login,'$nome_revert.jpg','$c_genero','$nickname', 1)";
$resultado_update = mysqli_query($mysqli,$insert);



if($resultado_update != 0)
{
?>
<script language="javascript">
alert("Publicado!!")
document.location.href="cadastrar_genero.php";
</script>
<?php
}
else
{
?>
<script language="javascript">
alert("Houve erro contate o administrador!!");
document.location.href="cadastrar_genero.php";
</script>
<?php
}


              }




?>
