<?php

 session_start();
 $cod_login = $_SESSION["cod_login"];
 $nickname = $_POST["c_nick"];
 $senha = $_POST["c_senha"];
 $senha2 = $_POST["c_confirmar_senha"];
 $senha3 = $_POST["c_senha_atual"];
 
 
 if($nickname == '')
 {
 ?>
 <script language="javascript">
 alert("O campo nickname deve ser preenchido!");
history.go(-1)
 </script>
 <?php
 }
 else if($senha == '')
 {
 ?>
  <script language="javascript">
 alert("O campo senha deve ser preenchido!");
 history.go(-1)
 </script>
 <?php
 }
 else if($senha2 == '')
 {
 ?>
  <script language="javascript">
 alert("O campo confirmar senha deve ser preenchido!");
history.go(-1)
 </script>
 <?php
 }
  else if($senha3 == '')
 {
 ?>
  <script language="javascript">
 alert("O campo senha atual deve ser preenchido!");
history.go(-1)
 </script>
 <?php
 }
 else if($senha != $senha2)
 {
 ?>
  <script language="javascript">
 alert("O campo confirmar senha nao confere com o campo senha!");
history.go(-1)
 </script>
 <?php
 }
 else
 {
 $senha_ok = md5($senha);
 $senha4 = md5($senha3);

 require("ligar.php");
 
 $verif = "SELECT * FROM $table_logins WHERE nickname='$nickname' && codigo='$cod_login'";
 $result = mysqli_query($mysqli,$verif);
 $quantidades = mysqli_num_rows($result);
 if($quantidades == 0)
 {

 $verificar = "SELECT * FROM $table_logins WHERE nickname='$nickname'";
 $resultado = mysqli_query($mysqli,$verificar);
 $quantidade = mysqli_num_rows($resultado);
 
 if($quantidade != 0)
 {
 ?>
 <script language="javascript">
 alert("este login está em uso!");
history.go(-1)
 </script>
 <?php
 }
 else if($quantidade == 0)
 {
 $update_nickname ="UPDATE $table_logins SET nickname='$nickname' WHERE codigo='$cod_login'";
 $resultado_nickname = mysqli_query($mysqli,$update_nickname);

 if($resultado_nickname == 0)
 {
 ?>
 <script language="javascript">
 alert("Houve erro ao atualizar!");
 history.go(-1)
 </script>
 <?php
 }
 else
 {

 
 $consultar = "SELECT * FROM $table_logins WHERE senha='$senha4'";
 $resultado_s = mysqli_query($mysqli,$consultar);
 $qtt = mysqli_num_rows($resultado_s);
 if($qtt == 0)
 {
 ?>
 <script language="javascript">
 alert("Senha atual nao corresponde a sua senha!");
history.go(-1)
 </script>
 <?php
 }
 else if($qtt != 0)
 {
 
 $update_codigo = "UPDATE $table_logins SET senha='$senha_ok' WHERE codigo=$cod_login";
 $resultado_codigo = mysqli_query($mysqli,$update_codigo);
 
 if($resultado_codigo == 0)
 {
 ?>
 <script language="javascript">
 alert("Houve Erro ao Atualizar!!");
history.go(-1)
 </script>
 <?php
 }
 else
 {
  ?>
 <script language="javascript">
 alert("Dados alterados com sucesso!!");
history.go(-1)
 </script>
 <?php
 
 }
 
 }


 
 }
 
 
 }

 }
 else
 {
 $consultar = "SELECT * FROM $table_logins WHERE senha='$senha4'";
 $resultado_s = mysqli_query($mysqli,$consultar);
 $qtt = mysqli_num_rows($resultado_s);
 if($qtt == 0)
 {
 ?>
 <script language="javascript">
 alert("Senha atual nao corresponde a sua senha!");
 document.location.href="usuario.php";
 </script>
 <?php
 }
 else if($qtt != 0)
 {

 $update_codigo = "UPDATE $table_logins SET senha='$senha_ok' WHERE codigo=$cod_login";
 $resultado_codigo = mysqli_query($mysqli,$update_codigo);

 if($resultado_codigo == 0)
 {
 ?>
 <script language="javascript">
 alert("Houve Erro ao Atualizar!!");
 document.location.href="usuario.php";
 </script>
 <?php
 }
 else
 {
  ?>
 <script language="javascript">
 alert("Dados alterados com sucesso!!");
history.go(-1)
 </script>
 <?php

 }
 }

 }
 }
 
 ?>
