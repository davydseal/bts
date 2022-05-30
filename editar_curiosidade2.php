<?php
  include("ligar.php");
 session_start();
$cod_login = $_SESSION["cod_login"];
$c_titulo = $_POST["c_titulo"];
$c_descricao = $_POST["c_descricao"];
$c_curiosidade = $_POST["c_curiosidade"];
$cod_curiosidade = $_POST["cod_curiosidade"];



         if($c_titulo == '')
                {
                ?>
                   <script language="javascript">
                        alert("Preencha o campo Titulo");
             history.go(-1)
                        </script>
                <?php
                }
                else if($c_descricao == '')
                {
                ?>
                   <script language="javascript">
                        alert("Preencha o campo Descrição");
           history.go(-1)
                        </script>
                <?php
                }
                else if($c_curiosidade == '')
                {
                ?>
                   <script language="javascript">
                        alert("Preencha o campo Notícia");
                history.go(-1)
                        </script>
                <?php
                }
         
        else
        {
        
        require("ligar.php");
        
        $update = "UPDATE $table_curiosidades SET titulo='$c_titulo', descricao='$c_descricao', curiosidade='$c_curiosidade' WHERE codigo=$cod_curiosidade";
        $x = mysqli_query($mysqli,$update);
        
        if($x =! 0)
        {
        ?>
         <script language="javascript">
        alert("Curiosidade editada com sucesso!!!");
        document.location.href="exibir_curiosidades.php";
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
        
        }


?>
