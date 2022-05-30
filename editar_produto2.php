<?php
  include("ligar.php");
 session_start();
$cod_login = $_SESSION["cod_login"];
$c_nome = $_POST["c_nome"];
$c_descricao = $_POST["c_descricao"];
$c_qtd = $_POST["c_qtd"];
$c_preco = $_POST["c_preco"];
$c_status = $_POST["c_status"];
$cod_produto = $_POST["cod_produto"];



         if($c_nome == '')
                {
                ?>
                   <script language="javascript">
                        alert("Preencha o campo Nome!");
                  history.go(-1)
                        </script>
                <?php
                }
                 else if($c_descricao == '')
                {
                ?>
                   <script language="javascript">
                        alert("Preencha o campo Descrição!");
                  history.go(-1)
                        </script>
                <?php
                }
               
                else if($c_qtd == '')
                {
                ?>
                   <script language="javascript">
                        alert("Preencha o campo Quantidade!");
                history.go(-1)
                        </script>
                <?php
                }
                 else if($c_preco == '')
                {
                ?>
                   <script language="javascript">
                        alert("Preencha o campo Preço!");
                history.go(-1)
                        </script>
                <?php
                }
         
        else
        {
        
        require("ligar.php");
        
        $update = "UPDATE $table_loja SET nome='$c_nome', descricao='$c_descricao', qtd='$c_qtd', preco='$c_preco', status='$c_status' WHERE codigo=$cod_produto";
        $x = mysqli_query($mysqli,$update);
        
        if($x =! 0)
        {
        ?>
         <script language="javascript">
        alert("Produto editado com sucesso!!!");
        document.location.href="loja_adm.php";
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
