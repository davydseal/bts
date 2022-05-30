<?php

  include("ligar.php");
  session_start();
$cod_login = $_SESSION["cod_login"];
$c_titulo = $_POST["c_titulo"];
$c_descricao = $_POST["c_descricao"];
$c_noticia = $_POST["c_noticia"];
$nickname = $_SESSION["nickname"];


date_default_timezone_set('America/Sao_paulo');
$data = date("d/m/Y");
$hora = date("H:i");




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
                else if($c_noticia == '')
                {
                ?>
                   <script language="javascript">
                        alert("Preencha o campo Notícia");
                history.go(-1)
                        </script>
                <?php
                }

         
        
else{

 
          
  $msg = false;

  if(isset($_FILES['arquivo'])){

    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
    $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
    $diretorio = "img/"; //define o diretorio para onde enviaremos o arquivo

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

    $sql_code = "INSERT INTO noticias (usuario,img,titulo,descricao,noticia,nickname, data, hora, status) VALUES($cod_login,'$novo_nome','$c_titulo','$c_descricao','$c_noticia','$nickname', '$data', '$hora', 1)";
    $resultado_update = mysqli_query($mysqli, $sql_code);

    if($resultado_update != 0)
    {
    ?>
    <script language="javascript">
    alert("Notícia adicionada com sucesso!!!");
     document.location.href="add_noticia.php";
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