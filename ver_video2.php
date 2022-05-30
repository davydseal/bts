<?php

  include("ligar.php");
  session_start();
$cod_login = $_SESSION["cod_login"];
$c_descricao = $_POST["c_descricao"];
$nickname = $_SESSION["nickname"];


date_default_timezone_set('America/Sao_paulo');
$data = date("d/m/Y");
$hora = date("H:i");


if(empty($c_descricao))
          {
?>
               <script language = "JavaScript">
                    alert('O campo Legenda deve ser preenchido !!!');
              history.go(-1)
               </script>
<?php
          }

         
        
else{

 
          
  $msg = false;

  if(isset($_FILES['arquivo'])){

    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
    $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
    $diretorio = "video/"; //define o diretorio para onde enviaremos o arquivo

    if (($extensao != '.mp4')){
      ?>
<script language="javascript">
alert("Por favor, envie arquivos com as seguintes extensões: mp4");
history.go(-1)
</script>
<?php
    }
    
    else{



    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua o upload

    $sql_code = "INSERT INTO video (usuario,img,descricao,nickname, data, hora,status) VALUES($cod_login,'$novo_nome','$c_descricao','$nickname', '$data', '$hora',1)";
    $resultado_update = mysqli_query($mysqli, $sql_code);

    if($resultado_update != 0)
    {
    ?>
    <script language="javascript">
    
     document.location.href="ver_videos.php";
    </script>
    <?php
    }
    else
    {
    ?>
    <script language="javascript">
    alert("Houve erro contate o administrador!!");
    document.location.href="usuario.php";
    </script>
    <?php
    }

  }
}
} 

?>