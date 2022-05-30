<?php

  include("ligar.php");
  session_start();
$cod_login = $_SESSION["cod_login"];
$c_nome = $_POST["c_nome"];
$c_descricao = $_POST["c_descricao"];
$c_qtd = $_POST["c_qtd"];
$c_preco = $_POST["c_preco"];
$nickname = $_SESSION["nickname"];


date_default_timezone_set('America/Sao_paulo');
$data = date("d/m/Y");
$hora = date("H:i");




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

         
        
else{

 
          
  $msg = false;

  if(isset($_FILES['arquivo'])){

    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
    $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
    $diretorio = "loja/"; //define o diretorio para onde enviaremos o arquivo

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

    $sql_code = "INSERT INTO loja (usuario,img,nome,qtd,preco,nickname,data, hora, status, descricao) VALUES($cod_login,'$novo_nome','$c_nome','$c_qtd','$c_preco','$nickname', '$data', '$hora', 2, '$c_descricao')";
    $resultado_update = mysqli_query($mysqli, $sql_code);

    if($resultado_update != 0)
    {
    ?>
    <script language="javascript">
    
     document.location.href="add_produto.php";
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