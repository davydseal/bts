      <?php


   session_start();
                   		        ini_set('session.cookie_httponly', true);
                   		        ini_set('session.use_only_cookie', true);
                   		        session_cache_expire(10);


     $system_control = $_SESSION["system_control"];
     $status = $_SESSION["status"];
     $nickname = $_SESSION["nickname"];
     $nome = $_SESSION["nome"];
     $sobrenome = $_SESSION["sobrenome"];
     $codigo = $_SESSION["codigo"];

       ?>

              <?php

     //Verificando se o usuario efetuou o login

     if(($system_control == 1)&&($status == 1))
     {
          //Declarando as variaveis locais







          //Declarando as variaveis locais

          $c_nome = $_POST["c_nome"];
          $c_sobrenome = $_POST["c_sobrenome"];
          $c_dia = $_POST["c_dia"];
          $c_mes = $_POST["c_mes"];
          $c_ano = $_POST["c_ano"];
          $c_endereco = $_POST["c_endereco"];
          $c_sexo = $_POST["c_sexo"];
          $c_email = $_POST["c_email"];
          $c_nickname = $_POST["c_nickname"];
          $c_senha = $_POST["c_senha"];
          $c_senha2 = $_POST["c_senha2"];

          //Verificando se os campos obrigatórios foram preenchidos

          if(empty($c_nome))
          {

?>
               <script language = "JavaScript">
                     alert('O campo NOME deve ser preenchido !!!');
                     document.location.href="cadastrar_admin.php";
               </script>
<?php
          }
          else if(empty($c_sobrenome))
          {

?>
               <script language = "JavaScript">
                     alert('O campo SOBRENOME deve ser preenchido !!!');
                     document.location.href="cadastrar_admin.php";
               </script>
<?php
          }
          else if(empty($c_endereco))
          {

?>
               <script language = "JavaScript">
                     alert('O campo ENDERECO deve ser preenchido !!!');
                     document.location.href="cadastrar_admin.php";
               </script>
<?php
          }
          else if(empty($c_sexo))
          {
?>
               <script language = "JavaScript">
                    alert('O campo SEXO deve ser preenchido !!!');
                    document.location.href="cadastrar_admin.php";
               </script>
<?php
          }
          else if(empty($c_email))
          {
?>
               <script language = "JavaScript">
                     alert('O campo E-MAIL deve ser preenchido !!!');
                     document.location.href="cadastrar_admin.php";
               </script>
<?php
          }
          else if(empty($c_nickname))
          {
?>
               <script language = "JavaScript">
                    alert('O campo NICKNAME deve ser preenchido !!!');
                    document.location.href="cadastrar_admin.php";
               </script>
<?php
          }
          else if(empty($c_senha))
          {
?>
               <script language = "JavaScript">
                    alert('O campo SENHA deve ser preenchido !!!');
                    document.location.href="cadastrar_admin.php";
               </script>
<?php
          }
          else if(empty($c_senha2))
          {
?>
               <script language = "JavaScript">
                    alert('O campo CONFIRMAÇÃO DE SENHA deve ser preenchido !!!');
                   document.location.href="cadastrar_admin.php";
               </script>
<?php
          }
          else
          {
               //Todos os campos foram preenchidos

               settype($c_senha,"string");
               settype($c_senha2,"string");

               //Verificando se a senha está batendo

               $r = strcmp($c_senha,$c_senha2);

               if($r == 0)
               {
                    //Verificando a idade

                    //Obtendo o ano atual

                    $ano = date("Y");
                    $idade = $ano - $c_ano;

                    //Verificando se ele já fez aniversário

                    //Obtendo o mes atual

                    $mes = date("m");

                    if($mes < $c_mes)
                    {
                         //Ele não fez aniversário

                         $idade = $idade - 1;
                    }
                    else if($mes == $c_mes)
                    {
                         //Obtendo o dia atual

                         $dia = date("d");

                         if($dia < $c_dia)
                         {
                              //Ele ainda não fez aniversário

                              $idade = $idade - 1;
                         }
                    }

                    if($idade < 12)
                    {
                         //Menor de Idade
?>
                         <script language="JavaScript">
                              alert("Este site só pode ser utilizado por Maiores de 12 anos.");
                              document.location.href="cadastrar_admin.php";
                         </script>
<?php
                    }
                    else
                    {
                         //Maior de Idade

                         //Verificando se o mês é fevereiro

                         if($c_mes == 2)
                         {
                              //É fevereiro

                              //Verificando se o ano é bissexto ou bissesto

                              $resultado = $c_ano % 4;

                              if($resultado == 0)
                              {
                                   //É ano bissexto
                                   //Fevereiro tem até 29

                                   //Verificando se o dia é 30 ou 31

                                   if(($c_dia == 30)||($c_dia == 31))
                                   {
                                        //Dia Inválido
?>
                                        <script language="JavaScript">
                                             alert("Fevereiro só vai até 29.");
                                            document.location.href="cadastrar_admin.php";
                                        </script>
<?php
                                   }
                              }
                              else
                              {
                                   //Não é ano bissexto

                                   //Verificando se vai até 28

                                   if($c_dia > 28)
                                   {
                                         //Dia Inválido
?>
                                        <script language="JavaScript">
                                             alert("Fevereiro só vai até 28.");
                                             document.location.href="cadastrar_admin.php";
                                        </script>
<?php
                                   }
                              }
                         }
                         else
                         {
                              //Não é fevereiro

                              //Verificando se os dias estão corretos

                              if(($c_mes == 4)||($c_mes == 6)||($c_mes == 9)||($c_mes == 11))
                              {
                                   //Verificando se o dia é 31

                                   if($c_dia == 31)
                                   {
                                        //Dia Inválido
?>
                                        <script language="JavaScript">
                                             alert("Não existe dia 31 neste mês.");
                                             document.location.href="cadastrar_admin.php";
                                        </script>
<?php
                                   }
                              }
                         }
                    }

               }
               else
               {
?>
                    <script language="JavaScript">
                            alert("A confirmação da Senha não está batendo.");
                            document.location.href="cadastrar_admin.php";
                    </script>
<?php
               }

               //Executando o arquivo de conexao

               require("../ligar.php");

                       //Verificando se o nickname está disponível

                       $consulta = "SELECT * FROM $table_logins WHERE nickname = '$c_nickname'";
                       $resultado_consulta = mysqli_query($mysqli, $consulta);
                       $quantos_registros = mysqli_num_rows($resultado_consulta);

                       if($quantos_registros != 0)
                       {
?>
                        <script language = "JavaScript">
                                alert('Nickname já cadastrado !!!');
                                document.location.href="cadastrar_admin.php";
                        </script>
<?php
                       }
                       else
                       {
                           //Este nickname está disponível

                           //Cadastrando o nickname e a senha na tabela logins

                           //Criptografando a senha

                           $senha_c = md5($c_senha);

                           $inserir = "INSERT INTO $table_logins (nickname,senha,status,situacao,foto) VALUES ('$c_nickname','$senha_c',1,1,'avatar.jpg')";
                           $resultado = mysqli_query($mysqli, $inserir);

                           //Cadastro realizado com sucesso
                           //Solicitando a chave primária do registro que já foi cadastrado

                           $consulta = "SELECT codigo FROM $table_logins WHERE nickname = '$c_nickname'";
                           $resultado = mysqli_query($mysqli, $consulta);
                           $vetor = mysqli_fetch_array($resultado);

                           //Cadastrando o jogador

                           $inserir = "INSERT INTO $table_dados (nome,sobrenome,dn_dia,dn_mes,dn_ano,endereco,sexo,email,cod_login) VALUES ('$c_nome','$c_sobrenome',$c_dia,$c_mes,$c_ano,'$c_endereco','$c_sexo','$c_email',$vetor[0])";
                           $resultado = mysqli_query($mysqli, $inserir);

                           //Verificando se o jogador foi cadastrado

                           if($resultado == 0)
                           {
?>
                            <script language='JavaScript'>
                                    alert("Erro no cadastro. Entre em contato com o seu programador.");
                                    document.location.href="cadastrar_admin.php";
                            </script>
<?php
                           }
                           else
                           {
?>
                            <script language='JavaScript'>
                                    alert("Administrador Cadastrado com Sucesso!!");
                                    document.location.href="cadastrar_admin.php";
                            </script>
<?php
                           }
                       }
               
          }
          }
          
               else
     {
?>
      <script language='javascript'>
              alert('Acesso Inválido. Você deve realizar o login.');
              document.location.href="admin.php";
      </script>
<?php
     }
?>

