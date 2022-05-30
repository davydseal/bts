<?php

  include("ligar.php");
  session_start();
$cod_login = $_SESSION["cod_login"];
$c_descricao = $_POST["c_descricao"];
$c_cod_eve = $_POST["c_cod_eve"];
$nickname = $_SESSION["nickname"];


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



     if(empty($c_descricao))
          {
?>
               <script language = "JavaScript">
                    alert('O campo Descrição deve ser preenchido !!!');
               history.go(-1)
               </script>
<?php
          }

         
        
else{

 
          
  $msg = false;

  if(isset($_FILES['arquivo'])){

    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
    $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
    $diretorio = "img/"; //define o diretorio para onde enviaremos o arquivo

    if (($extensao != '.jpg') && ($extensao != '.png') && ($extensao != '.jpeg')){
      ?>
<script language="javascript">
alert("Por favor, envie arquivos com as seguintes extensões: jpg ou png");
history.go(-1)
</script>
<?php
    }
    
    else{



    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua o upload

    $sql_code = "INSERT INTO post (usuario,img,post,nickname, data, hora,status,evento,cod_evento) VALUES($cod_login,'$novo_nome','$c_descricao','$nickname', '$data', '$hora',1,1,'$c_cod_eve')";
    $resultado_update = mysqli_query($mysqli, $sql_code);

    if($resultado_update != 0)
    {
    ?>
    <script language="javascript">
    
document.location.href="usuario.php";
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