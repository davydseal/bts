<?php
     //Manutenção da Sessão

     session_start();

     //Recuperando as variaveis da sessão

     $system_control = $_SESSION["system_control"];
     $status = $_SESSION["status"];

     //Verificando se o usuario efetuou o login

     if(($system_control == 1)&&($status == 2))
     {

          //Declarando as variaveis locais
$cod_login = $_SESSION["cod_login"];
          $c_posts = $_POST["c_posts"];
          $c_fotos = $_POST["c_fotos"];
        
          $c_videos = $_POST["c_videos"];










          //Verificando se os campos obrigatórios foram preenchidos

          if(empty($c_posts))
          {

?>
               <script language = "JavaScript">
                   
             history.go(-1)
               </script>
<?php
          }
          else if(empty($c_fotos))
          {

?>
               <script language = "JavaScript">
                    
                 history.go(-1)
               </script>
<?php
          }
         
           else if(empty($c_videos))
          {
?>
               <script language = "JavaScript">
                     
               history.go(-1)
               </script>
<?php
          }
         
          
          else
          {
               //Todos os campos foram preenchidos

               //Executando o arquivo de conexao

               require("ligar.php");

                                   $atualizar = "UPDATE $table_logins SET posts = '$c_posts',fotos = '$c_fotos',videos='$c_videos' WHERE codigo = $cod_login";
                                   $resultado_atualizar = mysqli_query($mysqli, $atualizar);

                                   if($resultado_atualizar == 0)
                                   {
                                        //Erro na atualização
?>
                                        <script language="JavaScript">
                                             alert("Houve Erro no momento da atualização dos Dados Pessoais. Entre em contado com o Administrador.");
      document.location.href="usuario.php";
                                        </script>
<?php



                         }
                         else
                         {
                              //Nickname não encontrado - Ele modificou o nickname e ninguem tem este nickname cadastrado

                              //Atualizando os dados pessoais do jogador

                              $atualizar = "UPDATE $table_logins SET posts = '$c_posts',fotos = '$c_fotos' ,videos='$c_videos' WHERE codigo = $cod_login";
                              $resultado_atualizar = mysqli_query($mysqli, $atualizar);

                              if($resultado_atualizar == 0)
                              {
                                   //Erro na atualização
?>
                                   <script language="JavaScript">
                                        alert("Houve Erro no momento da atualização dos Dados Pessoais. Entre em contado com o Administrador.");
      document.location.href="usuario.php";
                                   </script>
<?php
                              }

                              //Atualizando os dados de login do jogador


                              //Menagem para o Usuário

?>
                              <script language="JavaScript">
                                   alert("Atualizacao Realizada com Sucesso");
                                    history.go(-1)
                              </script>
<?php
                         }

                    }
}
     else
     {
?>
      <script language='javascript'>
              alert('Acesso Inválido. Você deve realizar o login.');
              document.location.href="index.php";
      </script>
<?php
     }
?>

