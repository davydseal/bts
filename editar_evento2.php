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
$c_status = $_POST["c_status"];
$cod_evento = $_POST["cod_evento"];



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
         
        else
        {
        
        require("ligar.php");
        
        $update = "UPDATE $table_evento SET nome='$c_nome', descricao='$c_descricao', regras='$c_regras', premiacao='$c_premiacao', datain='$c_datain', datafim='$c_datafim', status='$c_status' WHERE codigo=$cod_evento";
        $x = mysqli_query($mysqli,$update);
        
        if($x =! 0)
        {
        ?>
         <script language="javascript">
        alert("Evento editado com sucesso!!!");
        document.location.href="exibir_evento.php";
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
