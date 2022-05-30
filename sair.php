<?php session_start();?>
<?php


     $system_control = $_SESSION["system_control"];

     $nickname = $_SESSION["nickname"];


     //Manutenção da Sessão

       require("ligar.php");


      $atualizar = "UPDATE $table_logins SET login = 0 WHERE nickname = '$nickname'";
      $resultado_atualizar = mysqli_query($mysqli, $atualizar);



     //Finalizando a sessao

     session_destroy(); //Logout

     //Fornecendo uma mensagem para o usuário

?>
     <script language='JavaScript'>
            
             document.location.href="index.php";
     </script>

     <?


     ?>
