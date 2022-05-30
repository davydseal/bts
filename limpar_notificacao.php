<?php
  include("ligar.php");
 session_start();
$cod_login = $_SESSION["cod_login"];
$c_cod_usuario = $_POST["c_cod_usuario"];
     
        
        require("ligar.php");
        
        $update = "UPDATE $table_logins SET notificacao=0 WHERE codigo=$c_cod_usuario";
        $x = mysqli_query($mysqli,$update);
        
        if($x =! 0)
        {
        ?>
         <script language="javascript">
       
        history.go(-1)
        </script>
        <?php
        }
        else
        {
        ?>
         <script language="javascript">
        alert("Houve um Erro Contate o Administrador");
        document.location.href="index.php";
        </script>
        <?php
        }

?>
