<?php
require("../ligar.php");
session_start();
$cod_login = $_SESSION["cod_login"];
$nome_temporario=$_FILES["Arquivo"]["tmp_name"];
$nome_real=$_FILES["Arquivo"]["name"];
$c_nome = $_POST["c_nome"];
$c_descricao = $_POST["c_descricao"];
$c_qtd = $_POST["c_qtd"];
$c_preco = $_POST["c_preco"];
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
               history.go(-1)
                        </script>
                        <?php

                }
                else if (array_search($extensao, $_UP['extensoes']) === false) {
?>
<script language="javascript">
alert("Por favor, envie arquivos com as seguintes extensões: jpg, png , bmp ou gif");
                  history.go(-1)
</script>
<?php
}
                           
                else if($c_nome == '')
                {
                ?>
                   <script language="javascript">
                        alert("Preencha o campo Nome!");
                  history.go(-1)
                        </script>
                <?php
                }
                 else if($c_descricao == '')
                {
                ?>
                   <script language="javascript">
                        alert("Preencha o campo Descrição!");
                  history.go(-1)
                        </script>
                <?php
                }
               
                else if($c_qtd == '')
                {
                ?>
                   <script language="javascript">
                        alert("Preencha o campo Quantidade!");
                history.go(-1)
                        </script>
                <?php
                }
                 else if($c_preco == '')
                {
                ?>
                   <script language="javascript">
                        alert("Preencha o campo Preço!");
                history.go(-1)
                        </script>
                <?php
                }

                else
                {


                $nome_revert = str_shuffle($nome_real);









              copy($nome_temporario,"../loja/$nome_revert.jpg");
                     rename($nome_temporario,$nome_revert);
                           unlink("$nome_revert");

require("../ligar.php");

$insert = "INSERT INTO $table_loja(usuario,img,nome,qtd,preco,nickname,data, hora, status, descricao) VALUES ($cod_login,'$nome_revert.jpg','$c_nome','$c_qtd','$c_preco','$nickname', '$data', '$hora', 1, '$c_descricao')";
$resultado_update = mysqli_query($mysqli,$insert);



if($resultado_update != 0)
{
?>
<script language="javascript">
alert("Publicado!!")
document.location.href="cadastrar_produtos.php";
</script>
<?php
}
else
{
?>
<script language="javascript">
alert("Houve erro contate o administrador!!");
document.location.href="cadastrar_produtos.php";
</script>
<?php
}


              }




?>
