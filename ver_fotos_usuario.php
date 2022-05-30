<?php session_start();?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="universebts">
    <meta name="keywords" content="universebts">
    <meta name="author" content="universebts">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon" />
    <title>Universe BTS</title>

    <!--Google font-->
    <link href="fonts.googleapis.com/css22868.css?family=Roboto:wght@400;500;700;900&amp;display=swap" rel="stylesheet">
    <link href="fonts.googleapis.com/css237f4.css?family=Montserrat:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">

    <!-- Theme css -->
    <link id="change-link" rel="stylesheet" type="text/css" href="assets/css/style.css">

     <?php

$status = $_SESSION["status"];
$system_control = $_SESSION["system_control"];


if(($system_control != 1) || ($status != 2))
{
?>
<script language="javascript">
alert("Acesso Negado!!");
document.location.href="index.php";
</script>
<?php
}
else
{

   $cod_login = $_SESSION["cod_login"];
$nickname = $_SESSION["nickname"];

  require("ligar.php");





?>

<style>
body {
  background-image: url("1.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
  height: 100%;
  margin: 0;
}
</style>

</head>

<body>

    


      <!-- header start -->
    <header class="header-light">
        <div class="mobile-fix-menu"></div>
        <div class="container-fluid custom-padding">
            <div class="header-section">
                <div class="header-left">
                    <div class="brand-logo">
                        <a href="usuario.php">
                            <img src="assets/images/icon/logo2.png" width="140" alt="logo"
                                class="img-fluid blur-up lazyload">
                        </a>
                    </div>
                    <div class="search-box">
                        <i data-feather="search" class="icon iw-16 icon-light"></i>
                        <form action="pesquisar.php" method="post">
                        <input type="text" name="c_nickname" class="form-control search-type" placeholder="Encontrar Amigos...">
                    </form>
                        <div class="icon-close">
                            <i data-feather="x" class="iw-16 icon-light"></i>
                        </div>
                       
                    </div>
                    <ul class="btn-group">
                        <li class="header-btn home-btn">
                            <a class="main-link" href="usuario.php">
                                <i class="icon-light stroke-width-3 iw-16 ih-16" data-feather="home"></i>
                            </a>
                        </li>
                       
                    </ul>
                </div>
                <?php

$consulta_post = "SELECT * FROM $table_post WHERE usuario='$cod_login'";
$resultado_post = mysqli_query($mysqli,$consulta_post);
$quantidade_post = mysqli_num_rows($resultado_post);

                            ?> 
                             <?php

$consulta_seguidor = "SELECT * FROM $table_contatos WHERE amigo='$cod_login'";
$resultado_seguidor = mysqli_query($mysqli,$consulta_seguidor);
$quantidade_seguidor = mysqli_num_rows($resultado_seguidor);

                            ?>
                <div class="header-right">
                    <div class="post-stats">
                        <ul>
                            <li>
                                <h3><?php print($quantidade_post); ?></h3>
                                <span>Publicações</span>
                            </li>
                            <li>
                                <h3><?php print($quantidade_seguidor); ?></h3>
                                <span>Seguidores</span>
                            </li>
                        </ul>
                    </div>
                    <ul class="option-list">

                        <li class="header-btn custom-dropdown dropdown-lg btn-group message-btn">
                            <a class="main-link" href="javascript:void(0)" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                 <?php

$consulta_msg = "SELECT * FROM $table_sms WHERE destino='$cod_login'";
$resultado_msg = mysqli_query($mysqli,$consulta_msg);
$quantidade_msg = mysqli_num_rows($resultado_msg);

                            ?>
                                <i class="icon-light stroke-width-3 iw-16 ih-16" data-feather="message-circle"></i><span
                                    class="count success"><?php print($quantidade_msg); ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-header">
                                    <div class="left-title">
                                        <span>mensagens</span>
                                    </div>
                                    <div class="right-option">
                                        <ul>
                                            
                                            <li>
                                                <a href="mensagens.php">
                                                    <i class="iw-16 ih-16" data-feather="edit"></i>
                                                </a>
                                            </li>
                                          
                                        </ul>
                                    </div>
                                    <div class="mobile-close">
                                        <h5>close</h5>
                                    </div>
                                </div>
                               
                                <div class="dropdown-content">
                                    <ul class="friend-list">
                                                     <?php
             require("ligar.php");
                        $consulta_contatos = "SELECT * FROM $table_sms WHERE destino=$cod_login order by codigo desc";
                        $resultado_contatos = mysqli_query($mysqli,$consulta_contatos);
                        $quantidade_contatos = mysqli_num_rows($resultado_contatos);
                    
            ?>

                      <?php

for($i=0;$i < $quantidade_contatos;$i++)
{

$vetor_contatos = mysqli_fetch_array($resultado_contatos);

if($vetor_contatos[3] == $cod_login)
{
$var_amigo = ($vetor_contatos[3]);
}
else
{
$var_amigo = ($vetor_contatos[3]);
}

$verificadora_amigos = $i +1;

$consultar_amigo = "SELECT * FROM $table_logins WHERE codigo=$var_amigo";
$resultado_amigo = mysqli_query($mysqli,$consultar_amigo);
$vetor_amigo = mysqli_fetch_array($resultado_amigo);

$consultar_amigo2 = "SELECT * FROM $table_dados WHERE cod_login=$var_amigo";
$resultado_amigo2 = mysqli_query($mysqli,$consultar_amigo2);
$vetor_amigo2 = mysqli_fetch_array($resultado_amigo2);





            ?>
                                        <li>
                                            <a href="#">
                                                <div class="media">
                                                    <img src="img/<?php print($vetor_amigo['foto']); ?>" alt="user">
                                                    <div class="media-body">
                                                        <div>
                                                            <h5 class="mt-0"><?php print($vetor_amigo2[1]); ?> <?php print($vetor_amigo2[2]); ?></h5>
                                                            <h6><?php print($vetor_contatos['texto']); ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="active-status">
                                                    <span class="active"></span>
                                                </div>
                                            </a>
                                        </li>
                                    <?php
 }
 ?>    
                                      
                                    </ul>
                                </div>
                            </div>
                        </li>

                                                    <li class="header-btn custom-dropdown dropdown-lg add-friend">
                            <a class="main-link" href="javascript:void(0)" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="icon-light stroke-width-3 iw-16 ih-16" data-feather="user-plus"></i>
                            </a>
                            <div class="dropdown-menu">
                                <div class="dropdown-header">
                                    <span>Seguidores</span>
                                    <div class="mobile-close">
                                        <h5>close</h5>
                                    </div>
                                </div>
                                <div class="dropdown-content">
                                    <ul class="friend-list">
                                         <?php
             require("ligar.php");
                        $consulta_contatos = "SELECT * FROM $table_contatos WHERE amigo=$cod_login order by codigo desc";
                        $resultado_contatos = mysqli_query($mysqli,$consulta_contatos);
                        $quantidade_contatos = mysqli_num_rows($resultado_contatos);
                    
            ?>

                      <?php

for($i=0;$i < $quantidade_contatos;$i++)
{

$vetor_contatos = mysqli_fetch_array($resultado_contatos);

if($vetor_contatos[2] == $cod_login)
{
$var_amigo = ($vetor_contatos[1]);
}
else
{
$var_amigo = ($vetor_contatos[2]);
}

$verificadora_amigos = $i +1;

$consultar_amigo = "SELECT * FROM $table_logins WHERE codigo=$var_amigo";
$resultado_amigo = mysqli_query($mysqli,$consultar_amigo);
$vetor_amigo = mysqli_fetch_array($resultado_amigo);

$consultar_amigo2 = "SELECT * FROM $table_dados WHERE cod_login=$var_amigo";
$resultado_amigo2 = mysqli_query($mysqli,$consultar_amigo2);
$vetor_amigo2 = mysqli_fetch_array($resultado_amigo2);








            ?>
                                        <li>
                                           <a href="ver_usuario.php?codigo_news=<?php print($vetor_amigo['codigo']); ?>"> <div class="media">
                                                <img src="img/<?php print($vetor_amigo['foto']); ?>" alt="user">
                                                <div class="media-body">
                                                    <div>
                                                        <h5 class="mt-0"><?php print($vetor_amigo2[1]); ?> <?php print($vetor_amigo2[2]); ?></h5>
                                                        
                                                    </div>
                                                </div>
                                            </div></a>
                                           
                                        </li>
                                        <?php
 }
 ?>  
                                    </ul>
                                </div>
                            </div>
                        </li>
                        
                      
                        <li class="header-btn custom-dropdown dropdown-lg btn-group notification-btn">
                            <a class="main-link" href="javascript:void(0)" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="icon-light stroke-width-3 iw-16 ih-16" data-feather="bell"></i><?php



$consulta_no = "SELECT * FROM $table_logins WHERE codigo=$cod_login";
$resultado_no = mysqli_query($mysqli, $consulta_no);
$vetor_no = mysqli_fetch_array($resultado_no);

?>
                                <span
                                        class="count warning"><?php print($vetor_no['notificacao']); ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-header">
                                    <span>Notificações</span>
                                    <div class="mobile-close">
                                        <h5>close</h5>
                                    </div>
                                </div>
                                <div class="dropdown-content">
                                    <form method="post" action="limpar_notificacao.php">
                                        <input type="hidden" value="<?php print($vetor_no['codigo']); ?>" name="c_cod_usuario">

                                    <center><span><button type="submit" class="btn btn-solid">Marcar todos como lido</button></span></center>
</form>
                                    <br>
                                    <ul class="friend-list">
                                         <?php
             require("ligar.php");
                        $consulta_contatos = "SELECT * FROM $table_curtidas WHERE cod_usuario_post=$cod_login order by codigo desc";
                        $resultado_contatos = mysqli_query($mysqli,$consulta_contatos);
                        $quantidade_contatos = mysqli_num_rows($resultado_contatos);
                    
            ?>

                      <?php

for($i=0;$i < $quantidade_contatos;$i++)
{

$vetor_contatos = mysqli_fetch_array($resultado_contatos);

if($vetor_contatos[3] == $cod_login)
{
$var_amigo = ($vetor_contatos[2]);
}
else
{
$var_amigo = ($vetor_contatos[2]);
}

$verificadora_amigos = $i +1;

$consultar_amigo = "SELECT * FROM $table_logins WHERE codigo=$var_amigo";
$resultado_amigo = mysqli_query($mysqli,$consultar_amigo);
$vetor_amigo = mysqli_fetch_array($resultado_amigo);

$consultar_amigo2 = "SELECT * FROM $table_dados WHERE cod_login=$var_amigo";
$resultado_amigo2 = mysqli_query($mysqli,$consultar_amigo2);
$vetor_amigo2 = mysqli_fetch_array($resultado_amigo2);





            ?>
                                       
                                        <li>
                                            <a href="ver_publicacao.php?codigo_news=<?php print($vetor_contatos['cod_post']); ?> && cod_usuario_post=<?php print($vetor_contatos['cod_usuario']); ?>">
                                                <div class="media">
                                                    <img src="img/<?php print($vetor_amigo['foto']); ?>" alt="user">
                                                    <div class="media-body">
                                                        <div>
                                                            <h5 class="mt-0"><span><?php print($vetor_amigo2[1]); ?> <?php print($vetor_amigo2[2]); ?></span> curtiu sua publicação!
                                                            </h5>
                                                          
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>

                                         <?php
 }
 ?>  
 <?php
             require("ligar.php");
                        $consulta_contatos = "SELECT * FROM $table_comentario WHERE cod_usuario_post=$cod_login order by codigo desc";
                        $resultado_contatos = mysqli_query($mysqli,$consulta_contatos);
                        $quantidade_contatos = mysqli_num_rows($resultado_contatos);
                    
            ?>

                      <?php

for($i=0;$i < $quantidade_contatos;$i++)
{

$vetor_contatos = mysqli_fetch_array($resultado_contatos);

if($vetor_contatos[7] == $cod_login)
{
$var_amigo = ($vetor_contatos[2]);
}
else
{
$var_amigo = ($vetor_contatos[2]);
}

$verificadora_amigos = $i +1;

$consultar_amigo = "SELECT * FROM $table_logins WHERE codigo=$var_amigo";
$resultado_amigo = mysqli_query($mysqli,$consultar_amigo);
$vetor_amigo = mysqli_fetch_array($resultado_amigo);

$consultar_amigo2 = "SELECT * FROM $table_dados WHERE cod_login=$var_amigo";
$resultado_amigo2 = mysqli_query($mysqli,$consultar_amigo2);
$vetor_amigo2 = mysqli_fetch_array($resultado_amigo2);







            ?>

  <li>
                                            <a href="ver_publicacao.php?codigo_news=<?php print($vetor_contatos['post']); ?> && cod_usuario_post=<?php print($vetor_contatos['cod_usuario_post']); ?>">
                                                <div class="media">
                                                    <img src="img/<?php print($vetor_amigo['foto']); ?>" alt="user">
                                                    <div class="media-body">
                                                        <div>
                                                            <h5 class="mt-0"><span><?php print($vetor_amigo2[1]); ?> <?php print($vetor_amigo2[2]); ?></span> Comentou sua publicação!
                                                            </h5>
                                                          
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>

                                        
                                        <?php
 }
 ?>  
 <?php
             require("ligar.php");
                        $consulta_contatos = "SELECT * FROM $table_compartilhados WHERE id_usuario_compartilhado=$cod_login order by codigo desc";
                        $resultado_contatos = mysqli_query($mysqli,$consulta_contatos);
                        $quantidade_contatos = mysqli_num_rows($resultado_contatos);
                    
            ?>

                      <?php

for($i=0;$i < $quantidade_contatos;$i++)
{

$vetor_contatos = mysqli_fetch_array($resultado_contatos);

if($vetor_contatos[2] == $cod_login)
{
$var_amigo = ($vetor_contatos[1]);
}
else
{
$var_amigo = ($vetor_contatos[2]);
}

$verificadora_amigos = $i +1;

$consultar_amigo = "SELECT * FROM $table_logins WHERE codigo=$var_amigo";
$resultado_amigo = mysqli_query($mysqli,$consultar_amigo);
$vetor_amigo = mysqli_fetch_array($resultado_amigo);

$consultar_amigo2 = "SELECT * FROM $table_dados WHERE cod_login=$var_amigo";
$resultado_amigo2 = mysqli_query($mysqli,$consultar_amigo2);
$vetor_amigo2 = mysqli_fetch_array($resultado_amigo2);







            ?>

  <li>
                                            <a href="ver_publicacao.php?codigo_news=<?php print($vetor_contatos['id_post']); ?> && cod_usuario_post=<?php print($vetor_contatos['id_compartilhador']); ?>">
                                                <div class="media">
                                                    <img src="img/<?php print($vetor_amigo['foto']); ?>" alt="user">
                                                    <div class="media-body">
                                                        <div>
                                                            <h5 class="mt-0"><span><?php print($vetor_amigo2[1]); ?> <?php print($vetor_amigo2[2]); ?></span> compartilhou uma publicação com você!
                                                            </h5>
                                                          
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>

                                        <?php
 }
 ?>
    
     <?php
             require("ligar.php");
                        $consulta_contatos = "SELECT * FROM $table_video_compartilhados WHERE id_usuario_compartilhado=$cod_login order by codigo desc";
                        $resultado_contatos = mysqli_query($mysqli,$consulta_contatos);
                        $quantidade_contatos = mysqli_num_rows($resultado_contatos);
                    
            ?>

                      <?php

for($i=0;$i < $quantidade_contatos;$i++)
{

$vetor_contatos = mysqli_fetch_array($resultado_contatos);

if($vetor_contatos[2] == $cod_login)
{
$var_amigo = ($vetor_contatos[1]);
}
else
{
$var_amigo = ($vetor_contatos[2]);
}

$verificadora_amigos = $i +1;

$consultar_amigo = "SELECT * FROM $table_logins WHERE codigo=$var_amigo";
$resultado_amigo = mysqli_query($mysqli,$consultar_amigo);
$vetor_amigo = mysqli_fetch_array($resultado_amigo);

$consultar_amigo2 = "SELECT * FROM $table_dados WHERE cod_login=$var_amigo";
$resultado_amigo2 = mysqli_query($mysqli,$consultar_amigo2);
$vetor_amigo2 = mysqli_fetch_array($resultado_amigo2);







            ?>

  <li>
                                            <a href="ver_video_publicado.php?codigo_news=<?php print($vetor_contatos['id_post']); ?> && cod_usuario_post=<?php print($vetor_contatos['id_compartilhador']); ?>">
                                                <div class="media">
                                                    <img src="img/<?php print($vetor_amigo['foto']); ?>" alt="user">
                                                    <div class="media-body">
                                                        <div>
                                                            <h5 class="mt-0"><span><?php print($vetor_amigo2[1]); ?> <?php print($vetor_amigo2[2]); ?></span> compartilhou um video com você!
                                                            </h5>
                                                          
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>

                                        <?php
 }
 ?>
                                       
                                    </ul>
                                </div>
                            </div>
                        </li>


                          
                        
                       
                    
                        <li class="header-btn custom-dropdown profile-btn btn-group">
                            <a class="main-link" href="javascript:void(0)" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="icon-light stroke-width-3 d-sm-none d-block iw-16 ih-16"
                                    data-feather="user"></i>
                                     <?php



$consulta = "SELECT * FROM $table_logins WHERE codigo=$cod_login";
$resultado = mysqli_query($mysqli, $consulta);
$vetor = mysqli_fetch_array($resultado);

?>
                                <div class="media d-none d-sm-flex">
                                    <div class="user-img">
                                        <img src="img/<?php print($vetor['foto']); ?>"
                                            class="img-fluid blur-up lazyload bg-img" alt="user">
                                        <span class="available-stats online"></span>
                                    </div>
                                    <div class="media-body d-none d-md-block">
                                        <h4><?php print($vetor['nickname']); ?></h4>
                                        <span>Online agora</span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-header">
                                    <span>Menu</span>
                                    <div class="mobile-close">
                                        <h5>close</h5>
                                    </div>
                                </div>
                                <div class="dropdown-content">
                                    <ul class="friend-list">
                                        <li>
                                            <a href="meu_perfil.php">
                                                <div class="media">
                                                    <i data-feather="user"></i>
                                                    <div class="media-body">
                                                        <div>
                                                            <h5 class="mt-0">Perfil</h5>
                                                            <h6>Meu Perfil</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                            <li>
                                            <a href="feedback.php">
                                                <div class="media">
                                                    <i data-feather="message-circle"></i>
                                                    <div class="media-body">
                                                        <div>
                                                            <h5 class="mt-0">Feedback</h5>
                                                            <h6>Sugerir Melhorias, Reportar Bugs</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="configuracao.php">
                                                <div class="media">
                                                    <i data-feather="settings"></i>
                                                    <div class="media-body">
                                                        <div>
                                                            <h5 class="mt-0">Configuração</h5>
                                                            <h6>todas as configurações e privacidade</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        
                                        <li>
                                            <a href="sair.php">
                                                <div class="media">
                                                    <i data-feather="log-out"></i>
                                                    <div class="media-body">
                                                        <div>
                                                            <h5 class="mt-0">Sair</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->


    <!-- page body start -->
    <div class="page-body container-fluid custom-padding profile-page profile-page-friend">

        <!-- sidebar panel start -->
        <div class="sidebar-panel sidebar-white">
            <div class="main-icon">
                <a href="#">
                    <i data-feather="grid" class="bar-icon"></i>
                </a>
            </div>
            <ul class="sidebar-icon">
                <li>
                    <a href="usuario.php">
                        <i data-feather="file" class="bar-icon"></i>
                        <div class="tooltip-cls">
                            <span>Início</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="meu_perfil.php">
                        <i data-feather="users" class="bar-icon"></i>
                        <div class="tooltip-cls">
                            <span>Perfil</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="mensagens.php">
                        <i data-feather="message-circle" class="bar-icon"></i>
                        <div class="tooltip-cls">
                            <span>Mensagens</span>
                        </div>
                    </a>
                </li>
                
                <li>
                    <a href="ver_videos.php">
                        <i data-feather="headphones" class="bar-icon"></i>
                        <div class="tooltip-cls">
                            <span>Videos</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="configuracao.php">
                        <i data-feather="settings" class="bar-icon"></i>
                        <div class="tooltip-cls">
                            <span>Configurações</span>
                        </div>
                    </a>
                </li>
               
                
            </ul>
            <div class="main-icon">
                <a href="sair.php">
                    <i data-feather="power" class="bar-icon"></i>
                </a>
            </div>
        </div>
        <!-- sidebar panel end -->


        <div class="page-center">

        <?php

$codigo_news = $_GET["codigo_news"];


$consulta_login = "SELECT * FROM $table_logins WHERE codigo=$codigo_news";
$resultado_login = mysqli_query($mysqli, $consulta_login);
$vetor_login = mysqli_fetch_array($resultado_login);

?>  


             <?php

$codigo_news = $_GET["codigo_news"];

$consulta2 = "SELECT * FROM $table_dados WHERE cod_login=$codigo_news";
$resultado2 = mysqli_query($mysqli, $consulta2);
$vetor2 = mysqli_fetch_array($resultado2);

?>  

<?php
$codigo_news = $_GET["codigo_news"];

$consulta_post = "SELECT * FROM $table_post WHERE usuario='$codigo_news'";
$resultado_post = mysqli_query($mysqli,$consulta_post);
$quantidade_post = mysqli_num_rows($resultado_post);

                          ?> 

<?php
$codigo_news = $_GET["codigo_news"];

$consulta_seguindo = "SELECT * FROM $table_contatos WHERE usuario='$codigo_news'";
$resultado_seguindo = mysqli_query($mysqli,$consulta_seguindo);
$quantidade_seguindo = mysqli_num_rows($resultado_seguindo);

                          ?>

                          <?php
                            $codigo_news = $_GET["codigo_news"];

$consulta_seguidor = "SELECT * FROM $table_contatos WHERE amigo='$codigo_news'";
$resultado_seguidor = mysqli_query($mysqli,$consulta_seguidor);
$quantidade_seguidor = mysqli_num_rows($resultado_seguidor);

                          ?>

            <!-- profile cover start -->
            <div class="profile-cover">
                <img src="img/<?php print($vetor_login['capa']); ?>" class="img-fluid blur-up lazyload bg-img" alt="cover">
                <div class="profile-box d-lg-block d-none">
                    <div class="profile-content">
                        <div class="image-section">
                            <div class="profile-img">
                                <div>
                                    <img src="img/<?php print($vetor_login['foto']); ?>" class="img-fluid blur-up lazyload bg-img"
                                        alt="profile">
                                </div>
                                <span class="stats">
                                    <img src="assets/images/icon/verified.png" class="img-fluid blur-up lazyload"
                                        alt="verified">
                                </span>
                            </div>
                        </div>
                        <div class="profile-detail">
                            <h2><?php print($vetor2['nome']); ?> <?php print($vetor2['sobrenome']); ?> <span>❤</span></h2>
                            <h5><?php print($vetor2['email']); ?></h5>
                            <div class="counter-stats">

                                 <ul id="counter">
                                             <li>

                                               
                                                <h3 class="counter-value"><?php print substr($vetor_login['exp'],0,1); ?></h3>
                                                <a href="seguindo.php"><h5>lvl</h5></a>
                                            </li>

                                        </ul><br>
                                 <ul>
                                    <li>
                                        <h3 class="counter-value"><?php print($quantidade_seguindo); ?></h3>
                                        <h5>Seguindo</h5>
                                    </li>
                                    <li>
                                        <h3 class="counter-value"><?php print($quantidade_post); ?></h3>
                                        <h5>Publicações</h5>
                                    </li>
                                    <li>
                                        <h3 class="counter-value"><?php print($quantidade_seguidor); ?></h3>
                                        <h5>Seguidores</h5>
                                    </li>
                                </ul>
                            </div>
                            <a href="add.php?codigo_news=<?php print($vetor_login['codigo']); ?>" class="btn btn-solid">Seguir</a>
                        </div>
                    </div>
                </div>
               
            </div>
            <div class="d-lg-none d-block">
                <div class="profile-box">
                    <div class="profile-content">
                        <div class="image-section">
                            <div class="profile-img">
                                <div>
                                    <img src="assets/images/user-sm/15.jpg" class="img-fluid blur-up lazyload bg-img"
                                        alt="profile">
                                </div>
                                <span class="stats">
                                    <img src="assets/images/icon/verified.png" class="img-fluid blur-up lazyload"
                                        alt="verified">
                                </span>
                            </div>
                        </div>
                        <div class="profile-detail">
                            <h2>kelin jasen <span>❤</span></h2>
                            <h5>kelin.jasen156@gmail.com</h5>
                            <div class="counter-stats">
                                <ul id="counter">
                                    <li>
                                        <h3 class="counter-value" data-count="546">0</h3>
                                        <h5>following</h5>
                                    </li>
                                    <li>
                                        <h3 class="counter-value" data-count="26335">0</h3>
                                        <h5>likes</h5>
                                    </li>
                                    <li>
                                        <h3 class="counter-value" data-count="6845">0</h3>
                                        <h5>followers</h5>
                                    </li>
                                </ul>
                            </div>
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editProfile"
                                class="btn btn-solid">edit profile</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- profile cover end -->

            <!-- profile menu start -->
            <div class="profile-menu section-t-space">
                 <ul>
                    <li class="active">
                        <a href="meu_perfil.php">
                            <i class="iw-14 ih-14" data-feather="clock"></i>
                            <h6>Linha do Tempo</h6>
                        </a>
                    </li>
                 
                    <li>
                        <a href="seguindo_usuario.php?codigo_news=<?php print($vetor_login['codigo']); ?>">
                            <i class="iw-14 ih-14" data-feather="users"></i>
                            <h6>Seguindo</h6>
                        </a>
                    </li>
                     <li>
                        <a href="seguidores_usuario.php?codigo_news=<?php print($vetor_login['codigo']); ?>">
                            <i class="iw-14 ih-14" data-feather="users"></i>
                            <h6>Seguidores</h6>
                        </a>
                    </li>
                    <li>
                        <a href="ver_fotos_usuario.php?codigo_news=<?php print($vetor_login['codigo']); ?>">
                            <i class="iw-14 ih-14" data-feather="image"></i>
                            <h6>Fotos</h6>
                        </a>
                    </li>
                    <li class="d-xl-none d-inline-block">
                        <a href="usuario.php">
                            <i class="iw-14 ih-14" data-feather="list"></i>
                            <h6>Feed</h6>
                        </a>
                    </li>
                </ul>
                <ul class="right-menu d-xl-flex d-none">
                   
                     <li class="active">
                        <a href="usuario.php">
                            <i class="iw-14 ih-14" data-feather="list"></i>
                            <h6>Feed</h6>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- profile menu end -->

            <div class="container-fluid section-t-space px-0">
                <div class="page-content">
                    <div class="content-center w-100">
                        <!-- gallery section -->
                        <div class="gallery-page-section section-b-space">
                            <div class="card-title">
                                <h3>Fotos</h3>
                                <div class="right-setting">




                                   
                                </div>
                            </div>
                            <div class="tab-section">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                  
                                     <li class="nav-item">
                                        <a class="nav-link active" id="profile-tab" data-bs-toggle="tab"
                                            href="#photo" role="tab" aria-selected="false">Fotos</a>
                                    </li>
                                    
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                   
                                     <div class="tab-pane fade show active Choose-photo-modal" id="photo"
                                        role="tabpanel" aria-labelledby="profile-tab">
                                                                          <!-- portfolio section start -->
                                        <div class="portfolio-section">
                                            <div class="row ratio_square">

                                            <?php
															
                                                            //Verificando se o nickname está disponível

                  $consulta = "SELECT * FROM $table_logins WHERE codigo=$codigo_news && fotos = 2";
                  $resultado_consulta = mysqli_query($mysqli, $consulta);
                  $quantos_registros = mysqli_num_rows($resultado_consulta);

                  if($quantos_registros != 0)
                  {
?>
                  <?php
echo "As fotos deste usuario estão privadas!";
?>
<?php
                  }
                  else
                  {



$tipo_news = "SELECT * FROM $table_post WHERE usuario=$codigo_news && foto= 1 order by codigo desc";
$tipo_news_resultado = mysqli_query($mysqli, $tipo_news);
$tipo_news_quantidade = mysqli_num_rows($tipo_news_resultado);


                  



for($i=0;$i < $tipo_news_quantidade;$i++)
{
$vetor_news = mysqli_fetch_array($tipo_news_resultado);




?>    

                                                <div class="col-xl-3 col-lg-4 col-6">
                                                    <div class="portfolio-image">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#imageModel">
                                                            <img src="img/<?php print($vetor_news['img']); ?>" alt=""
                                                                class="img-fluid blur-up lazyload bg-img">
                                                        </a>
                                                       
                                                    </div>
                                                </div>

                                                <?php
}
}

?>
                                              
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- conversation panel start -->
        <div class="conversation-panel xl-light">
            <div class="panel-header">
                <h2>friends</h2>
                <h5>start new conversation</h5>
                <div class="setting">
                    <div class="setting-btn setting-dropdown">
                        <div class="btn-group custom-dropdown dropdown-sm">
                            <a href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-theme stroke-width-3 icon iw-11 ih-11" data-feather="sun"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right custom-dropdown">
                                <ul>
                                    <li>
                                        <a href="#"><i class="icon-font-light iw-16 ih-16" data-feather="user"></i>see
                                            all</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-font-light iw-16 ih-16" data-feather="search"></i>find
                                            friends</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-font-light iw-16 ih-16"
                                                data-feather="settings"></i>settings</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="search-bar">
                <div class="lg-search">
                    <i data-feather="search" class="icon-theme icon iw-16"></i>
                    <input type="text" class="form-control" placeholder="Encontrar Amigos...">
                </div>
                <div class="xs-search">
                    <div class="icon-search">
                        <i data-feather="search" class="icon-dark iw-16"></i>
                    </div>
                    <center>Visitas</center>
                    <div class="lg-search">
                        <i data-feather="search" class="icon-dark icon iw-16"></i>
<form action="pesquisar.php" method="post">
                        <input type="text" name="c_nickname" class="form-control" placeholder="Encontrar Amigos...">
                    </form>
                        <div class="icon-close">

                            <i data-feather="x" class="icon-dark iw-16"></i>

                        </div>
                    </div>
                </div>

            </div>
            <div class="friend-section">
                <div class="header-section">
                    <a data-bs-toggle="collapse" href="#accordion" aria-expanded="true" class="">close friends
                        <div class="down-arrow">
                            <i data-feather="chevron-down" class="icon-theme iw-14 ih-14"></i>
                        </div>
                    </a>
                </div>
                <div id="accordion" class="friend-list collapse show">
                    <ul>
                        <?php
             require("ligar.php");
                        $consulta_contatos = "SELECT * FROM $table_visitas WHERE visitou=$cod_login order by codigo desc";
                        $resultado_contatos = mysqli_query($mysqli,$consulta_contatos);
                        $quantidade_contatos = mysqli_num_rows($resultado_contatos);
                    
            ?>

                      <?php

for($i=0;$i < $quantidade_contatos;$i++)
{

$vetor_contatos = mysqli_fetch_array($resultado_contatos);

if($vetor_contatos[2] == $cod_login)
{
$var_amigo = ($vetor_contatos[1]);
}
else
{
$var_amigo = ($vetor_contatos[2]);
}

$verificadora_amigos = $i +1;

$consultar_amigo = "SELECT * FROM $table_logins WHERE codigo=$var_amigo";
$resultado_amigo = mysqli_query($mysqli,$consultar_amigo);
$vetor_amigo = mysqli_fetch_array($resultado_amigo);

$consultar_amigo2 = "SELECT * FROM $table_dados WHERE cod_login=$var_amigo";
$resultado_amigo2 = mysqli_query($mysqli,$consultar_amigo2);
$vetor_amigo2 = mysqli_fetch_array($resultado_amigo2);





if($verificadora_amigos > 5)
{
break;
}


            ?>
                        <li class="friend-box user1">
                            <div class="media">
                                <a href="ver_usuario.php?codigo_news=<?php print($vetor_amigo['codigo']); ?>" class="popover-cls user-img" data-bs-toggle="popover" data-placement="bottom"
                                    data-name="paige turner" data-img="img/<?php print($vetor_amigo['foto']); ?>">
                                    <img src="img/<?php print($vetor_amigo['foto']); ?>" class="img-fluid blur-up lazyload bg-img"
                                        alt="user">
                                    <span class="available-stats"></span>
                                </a>
                                <div class="media-body">
                                    <h5 class="user-name"><?php print($vetor_amigo2[1]); ?> <?php print($vetor_amigo2[2]); ?></h5>
                                   
                                </div>
                            </div>
                        </li>
                        <?php
 }
 ?> 
                    </ul>
                </div>
            </div>
           
        </div>
        <!-- conversation panel end -->

    </div>
    <!-- page body end -->


   


    <!-- latest jquery-->
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <!-- popper js-->
    <script src="assets/js/popper.min.js"></script>

    <!-- slick slider js -->
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/custom-slick.js"></script>

    <!-- counter js -->
    <script src="assets/js/counter.js"></script>

    <!-- feather icon js-->
    <script src="assets/js/feather.min.js"></script>

    <!-- emoji picker js-->
    <script src="assets/js/emojionearea.min.js"></script>

    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap.js"></script>

    <!-- chatbox js -->
    <script src="assets/js/chatbox.js"></script>

    <!-- lazyload js-->
    <script src="assets/js/lazysizes.min.js"></script>

    <!-- theme setting js-->
    <script src="assets/js/theme-setting.js"></script>

    <!-- Theme js-->
    <script src="assets/js/script.js"></script>

    <script>
        feather.replace();
        $(".emojiPicker").emojioneArea({
            inline: true,
            placement: 'absleft',
            pickerPosition: "top left",
        });
    </script>

    <?php
}
?>

</body>



</html>