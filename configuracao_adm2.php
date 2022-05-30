<?php
     //Manutenção da Sessão

     session_start();

     //Recuperando as variaveis da sessão

     $system_control = $_SESSION["system_control"];
     $status = $_SESSION["status"];

     //Verificando se o usuario efetuou o login

     if(($system_control == 1)&&($status == 1))
     {

          //Declarando as variaveis locais
          $cod_login = $_SESSION["cod_login"];
          $c_nome = $_POST["c_nome"];
          $c_sobrenome = $_POST["c_sobrenome"];
          $c_email = $_POST["c_email"];
          $dn_dia = $_POST["dn_dia"];
          $dn_mes = $_POST["dn_mes"];
          $dn_ano = $_POST["dn_ano"];
          $c_sobre = $_POST["c_sobre"];
          $c_cpf = $_POST["c_cpf"];
          $c_telefone = $_POST["c_telefone"];
          $c_rua = $_POST["c_rua"];
          $c_numero = $_POST["c_numero"];
          $c_bairro = $_POST["c_bairro"];
          $c_cidade = $_POST["c_cidade"];
          $c_estado = $_POST["c_estado"];
          $c_cep = $_POST["c_cep"];
          $c_complemento = $_POST["c_complemento"];






          //Verificando se os campos obrigatórios foram preenchidos

          if(empty($c_nome))
          {

?>
               <script language = "JavaScript">
                     alert('O campo NOME deve ser preenchido !!!');
              history.go(-1)
               </script>
<?php
          }
          else if(empty($c_sobrenome))
          {

?>
               <script language = "JavaScript">
                     alert('O campo SOBRENOME deve ser preenchido !!!');
                 history.go(-1)
               </script>
<?php
          }
          else if(empty($c_email))
          {
?>
               <script language = "JavaScript">
                     alert('O campo E-MAIL deve ser preenchido !!!');
                  history.go(-1)
               </script>
<?php
          }
           else if(empty($dn_dia))
          {
?>
               <script language = "JavaScript">
                     alert('Selecione o campo dia !!!');
                  history.go(-1)
               </script>
<?php
          }
          else if(empty($dn_mes))
          {
?>
               <script language = "JavaScript">
                     alert('Selecione o campo mês !!!');
                  history.go(-1)
               </script>
<?php
          }
          else if(empty($dn_ano))
          {
?>
               <script language = "JavaScript">
                     alert('Selecione o campo ano !!!');
                  history.go(-1)
               </script>
<?php
          }
          else
          {
               //Todos os campos foram preenchidos

               //Executando o arquivo de conexao

               require("ligar.php");

                                   $atualizar = "UPDATE $table_dados SET nome = '$c_nome',sobrenome = '$c_sobrenome' , email = '$c_email',dn_dia=$dn_dia,dn_mes='$dn_mes',dn_ano=$dn_ano,sobre='$c_sobre',cpf='$c_cpf',telefone='$c_telefone',rua='$c_rua',numero='$c_numero',bairro='$c_bairro',cidade='$c_cidade',estado='$c_estado',cep='$c_cep',complemento='$c_complemento' WHERE cod_login = $cod_login";
                                   $resultado_atualizar = mysqli_query($mysqli, $atualizar);

                                   if($resultado_atualizar == 0)
                                   {
                                        //Erro na atualização
?>
                                        <script language="JavaScript">
                                             alert("Houve Erro no momento da atualização dos Dados Pessoais. Entre em contado com o Administrador.");
       history.go(-1)
                                        </script>
<?php



                         }
                         else
                         {
                              //Nickname não encontrado - Ele modificou o nickname e ninguem tem este nickname cadastrado

                              //Atualizando os dados pessoais do jogador

                              $atualizar = "UPDATE $table_dados SET nome = '$c_nome',sobrenome = '$c_sobrenome',email = '$c_email',dn_dia=$dn_dia,dn_mes='$dn_mes',dn_ano=$dn_ano WHERE cod_login = $cod_login";
                              $resultado_atualizar = mysqli_query($mysqli, $atualizar);

                              if($resultado_atualizar == 0)
                              {
                                   //Erro na atualização
?>
                                   <script language="JavaScript">
                                        alert("Houve Erro no momento da atualização dos Dados Pessoais. Entre em contado com o Administrador.");
       history.go(-1)
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

