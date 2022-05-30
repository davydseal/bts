<?php

  include("ligar.php");
  session_start();
$cod_login = $_SESSION["cod_login"];
$c_nome = $_POST["c_nome"];
$c_descricao = $_POST["c_descricao"];
$c_regras = $_POST["c_regras"];
$c_premiacao = $_POST["c_premiacao"];
$c_datain = $_POST["c_datain"];
$c_datafim = $_POST["c_datafim"];
$nickname = $_SESSION["nickname"];


date_default_timezone_set('America/Sao_paulo');
$data = date("d/m/Y");
$hora = date("H:i");




        if(empty($c_nome))
          {
?>
               <script language = "JavaScript">
                    alert('O campo Nome deve ser preenchido !!!');
              history.go(-1)
               </script>
<?php
          }
          else if(empty($c_descricao))
          {
?>
               <script language = "JavaScript">
                    alert('O campo Descrição deve ser preenchido !!!');
              history.go(-1)
               </script>
<?php
          }
           else if(empty($c_regras))
          {
?>
               <script language = "JavaScript">
                    alert('O campo Regras deve ser preenchido !!!');
              history.go(-1)
               </script>
<?php
          }
           else if(empty($c_premiacao))
          {
?>
               <script language = "JavaScript">
                    alert('O campo Premiação deve ser preenchido !!!');
              history.go(-1)
               </script>
<?php
          }
           else if(empty($c_datain))
          {
?>
               <script language = "JavaScript">
                    alert('O campo Data Inicial deve ser preenchido !!!');
              history.go(-1)
               </script>
<?php
          }
           else if(empty($c_datafim))
          {
?>
               <script language = "JavaScript">
                    alert('O campo Data Final deve ser preenchido !!!');
              history.go(-1)
               </script>
<?php
          }

         
        
else{

 
          
  $msg = false;

  if(isset($_FILES['arquivo'])){

    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
    $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
    $diretorio = "evento/"; //define o diretorio para onde enviaremos o arquivo

    if (($extensao != '.jpg') && ($extensao != 'jpeg') && ($extensao != '.png') && ($extensao != '') && ($extensao != '.gif')){
      ?>
<script language="javascript">
alert("Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif");
history.go(-1)
</script>
<?php
    }
    
    else{



    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua o upload

    $sql_code = "INSERT INTO evento (usuario,nickname,img,nome,descricao,regras,premiacao,datain,datafim,status) VALUES($cod_login,'$nickname','$novo_nome','$c_nome','$c_descricao','$c_regras','$c_premiacao','$c_datain','$c_datafim',2)";
    $resultado_update = mysqli_query($mysqli, $sql_code);

    if($resultado_update != 0)
    {
    ?>
    <script language="javascript">
    
     document.location.href="add_evento.php";
    </script>
    <?php
    }
    else
    {
    ?>
    <script language="javascript">
    alert("Houve erro contate o administrador!!");
    document.location.href="index.php";
    </script>
    <?php
    }

  }
}
} 

?>