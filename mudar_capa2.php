<?php
ini_set('display_errors', 0 );
error_reporting(0);
?>
<?php

session_start();

$cod_login = $_SESSION["cod_login"];




$nome_temporario=$_FILES["Arquivo"]["tmp_name"];
$nome_real=$_FILES["Arquivo"]["name"];

require("ligar.php");

$foto_antiga = "SELECT * FROM $table_logins WHERE codigo=$cod_login";
$resultado_foto_antiga = mysqli_query($mysqli, $foto_antiga);
$vetor_foto_antiga = mysqli_fetch_array($resultado_foto_antiga);

$_UP['extensoes'] = array('jpg','gif','png','bmp');

$extensao = strtolower(end(explode('.', $_FILES['Arquivo']['name'])));

      if($_FILES['Arquivo']['name'] == ""){
                        ?>
                        <script language="javascript">
                        alert("Adicione uma Imagem!!");
                       history.go(-1)
                        </script>
                        <?php

                }
else if(array_search($extensao, $_UP['extensoes']) === false) {
?>
<script language="javascript">
alert("Só pode ser enviado arquivos no formato jpg,gif,png,bmp");
history.go(-1)
</script>
<?php
}
else
{


  $shuffled = str_shuffle($nome_real);


copy($nome_temporario,"img/$shuffled.jpg");
rename($nome_temporario,$shuffled);

unlink("$shuffled");

if($vetor_foto_antiga[6] == 0)
{

$update_prima = "UPDATE $table_logins SET prima=1 WHERE codigo=$cod_login";
$resultado_consulta = mysqli_query($mysqli,$update_prima);


}
else
{
unlink("img/$vetor_foto_antiga[6]");
}
?>

<?php









$atualizar = "UPDATE $table_logins  SET capa='$shuffled.jpg' WHERE codigo=$cod_login";
$resultado = mysqli_query($mysqli,$atualizar);


if($resultado != 0)
{
?>
<script language="javascript">
alert("Capa Atualizada com Sucesso!!");
history.go(-1)
</script>
<?php
}
else
{
?>
<script language="javascript">
alert("Houve Erro no Sistema!!");
document.location.href="index.php";

</script>
<?php
}
}
?>
