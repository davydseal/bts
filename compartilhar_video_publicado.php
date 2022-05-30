<?php session_start();?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="universebts"
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
                                <i class="icon-light stroke-width-3 iw-16 ih-16" data-feather="bell"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-header">
                                    <span>Notificações</span>
                                    <div class="mobile-close">
                                        <h5>close</h5>
                                    </div>
                                </div>
                                <div class="dropdown-content">
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
    <div class="page-body container-fluid custom-padding favourite-page-body">

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

            <!-- page cover start -->
            <div class="page-cover">
                 <?php


$cod_usuario_post = $_GET["cod_usuario_post"];


$consulta = "SELECT * FROM $table_logins WHERE codigo=$cod_usuario_post";
$resultado = mysqli_query($mysqli, $consulta);
$vetor = mysqli_fetch_array($resultado);

?>

 <?php


$cod_usuario_post = $_GET["cod_usuario_post"];


$consulta_dados = "SELECT * FROM $table_dados WHERE cod_login=$cod_usuario_post";
$resultado_dados = mysqli_query($mysqli, $consulta_dados);
$vetor_dados = mysqli_fetch_array($resultado_dados);

?>

<?php


$codigo_news = $_GET["codigo_news"];


$consulta_pub = "SELECT * FROM $table_post WHERE usuario=$codigo_news";
$resultado_pub = mysqli_query($mysqli, $consulta_pub);
$vetor_pub = mysqli_fetch_array($resultado_pub);

?>
                <div class="cover-img">
                    <img src="img/<?php print($vetor['capa']); ?>" class="img-fluid blur-up lazyload bg-img" alt="cover">
                    
                </div>
                <div class="cover-content">
                    <div class="page-logo">
                        <a href="#">
                            <img src="img/<?php print($vetor['foto']); ?>" class="img-fluid blur-up lazyload bg-img"
                                alt="">
                        </a>

                    </div>
                    <a href="#" class="page-name">
                        <h4><?php print($vetor_dados['nome']); ?> <?php print($vetor_dados['sobrenome']); ?></h4>
                        <h6><?php print($vetor_dados['email']); ?></h6>
                    </a>

<?php
$cod_usuario_post = $_GET["cod_usuario_post"];

$consulta_post = "SELECT * FROM $table_post WHERE usuario='$cod_usuario_post'";
$resultado_post = mysqli_query($mysqli,$consulta_post);
$quantidade_post = mysqli_num_rows($resultado_post);

                            ?> 

<?php
$cod_usuario_post = $_GET["cod_usuario_post"];

$consulta_seguindo = "SELECT * FROM $table_contatos WHERE usuario='$cod_usuario_post'";
$resultado_seguindo = mysqli_query($mysqli,$consulta_seguindo);
$quantidade_seguindo = mysqli_num_rows($resultado_seguindo);

                            ?>

                            <?php
$cod_usuario_post = $_GET["cod_usuario_post"];

$consulta_seguidor = "SELECT * FROM $table_contatos WHERE amigo='$cod_usuario_post'";
$resultado_seguidor = mysqli_query($mysqli,$consulta_seguidor);
$quantidade_seguidor = mysqli_num_rows($resultado_seguidor);

                            ?>

                    <div class="page-stats">
                        <ul>
                            <li>
                                <h2><?php print($quantidade_seguindo); ?></h2>
                                <h6>Seguindo</h6>
                            </li>
                            <li>
                                <h2><?php print($quantidade_seguidor); ?></h2>
                                <h6>Seguidores</h6>
                            </li>
                            
                            <li>
                                <h2><?php print($quantidade_post); ?></h2>
                                <h6>Publicações</h6>
                            </li>
                           
                        </ul>
                    </div>
                  
                </div>
            </div>
            <!-- page cover end -->

          

            <div class="container-fluid section-t-space px-0">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="sticky-top">
                              <!-- profile box -->
                        <div class="profile-about">
                            <div class="card-title">
                                <h3>Sobre</h3>
                                
                                <div class="settings">
                                    <div class="setting-btn">
                                        <a href="configuracao.php">
                                            <i class="icon icon-dark stroke-width-3 iw-11 ih-11"
                                                data-feather="edit-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="about-content">
                                <ul>
                                    <li>
                                        <div class="icon">
                                            <i class="iw-18 ih-18" data-feather="user"></i>
                                        </div>
                                        <div class="details">
                                            <h5>Sobre</h5>
                                            <h6><?php print($vetor_dados['sobre']); ?></h6>
                                        </div>
                                    </li>
                                 
                                     <li>
                                        <div class="icon">
                                            <i class="iw-18 ih-18" data-feather="heart"></i>
                                        </div>
                                        <div class="details">
                                            <h5>Aniversário</h5>
                                            <h6><?php print($vetor_dados['dn_dia']); ?>/<?php print($vetor_dados['dn_mes']); ?>/<?php print($vetor_dados['dn_ano']); ?></h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="iw-18 ih-18" data-feather="user"></i>
                                        </div>
                                        <div class="details">
                                            <h5>Gênero</h5>
                                            <h6><?php print($vetor_dados['sexo']); ?></h6>
                                        </div>
                                    </li>
                                      <li>
                                        <div class="icon">
                                            <i class="iw-18 ih-18" data-feather="mail"></i>
                                        </div>
                                        <div class="details">
                                            <h5>Email</h5>
                                            <h6><?php print($vetor_dados['email']); ?></h6>
                                        </div>
                                    </li>
                                     <li>
                                        <div class="icon">
                                            <i class="iw-18 ih-18" data-feather="link"></i>
                                        </div>
                                        <div class="details">
                                            <h5>Juntos desde</h5>
                                            <h6><?php print($vetor['data']); ?></h6>
                                        </div>
                                    </li>
                                   
                                </ul>
                            </div>
                           
                        </div>
                        </div>
                    </div>

                    <div class="col-xl-8">




                        <!-- hobbies profile -->
                        <div class="about-profile section-b-space">



                            <div class="card-title">
                                <h3>Publicação</h3>
                              
                            </div>
                          
 <?php
                          $codigo_news = $_GET["codigo_news"];

$tipo_news = "SELECT * FROM $table_video WHERE codigo=$codigo_news";
$tipo_news_resultado = mysqli_query($mysqli, $tipo_news);
$tipo_news_quantidade = mysqli_num_rows($tipo_news_resultado);


                       



for($i=0;$i < $tipo_news_quantidade;$i++)
{
$vetor_news = mysqli_fetch_array($tipo_news_resultado);




?>    

                        <div class="post-panel">
                            <div class="post-wrapper">
                                
                                <div class="post-details">
                                    <div class="img-wrapper">
                                         <video controls width="714" height="370">
  <source src="video/<?php print($vetor_news['img']); ?>" type="video/mp4"></video>
                                       
                                    </div>
                                    <div class="detail-box">
                                        <h3><?php print($vetor_news['descricao']); ?></h3>
                                     
                                       
                                       
                                       
                                    </div>
                                    <div class="like-panel">
                                       
                                        <div class="right-stats">
                                           <ul>
                                                <li>
                                                    <h5>
                                                        <i class="iw-16 ih-16" data-feather="smile"></i>
                                                        <span><?php print($vetor_news['curtidas']); ?></span> Curtidas
                                                    </h5>
                                                </li>
                                                <li>
                                                    <h5>
                                                        <i class="iw-16 ih-16" data-feather="message-square"></i>
                                                        <span><?php print($vetor_news['comentarios']); ?></span> Comentarios
                                                    </h5>
                                                </li>
                                                <li>
                                                    <h5>
                                                        <i class="iw-16 ih-16" data-feather="share"></i><span><?php print($vetor_news['compartilhamentos']); ?></span>
                                                        Compartilhamentos
                                                    </h5>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="post-react">
                                        <ul>
                                            <li class="react-btn">
                                                <a href="curtida.php?codigo_news=<?php print($vetor_news['codigo']); ?> && cod_usuario_post=<?php print($vetor_news['usuario']); ?>" class="react-click">
                                                    <i class="iw-18 ih-18" data-feather="smile"></i> Gostei
                                                </a>
                                               
                                            </li>
                                           
                                           
                                        </ul>
                                    </div>
                                    <div class="comment-section">
                                        <div class="comments d-block">
                                            <div class="ldr-comments">
                                                <ul>
                                                    <li>
                                                        <div class="media">
                                                            <div class="ldr-img"></div>
                                                            <div class="media-body">
                                                                <div class="contents">
                                                                    <div class="ldr-content"></div>
                                                                    <div class="ldr-content"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <ul class="sub-comment">
                                                            <li>
                                                                <div class="media">
                                                                    <div class="ldr-img"></div>
                                                                    <div class="media-body">
                                                                        <div class="contents">
                                                                            <div class="ldr-content"></div>
                                                                            <div class="ldr-content"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <div class="media">
                                                            <div class="ldr-img"></div>
                                                            <div class="media-body">
                                                                <div class="contents">
                                                                    <div class="ldr-content"></div>
                                                                    <div class="ldr-content"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="media">
                                                            <div class="ldr-img"></div>
                                                            <div class="media-body">
                                                                <div class="contents">
                                                                    <div class="ldr-content"></div>
                                                                    <div class="ldr-content"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

 <div class="reply">
                                            <div class="search-input input-style input-lg icon-right">


    <form method="post" action="compartilhar_video.php?codigo_news=<?php print($vetor_news['codigo']); ?>">

<input type="hidden" name="cod_usuario_post" value="<?php print($vetor_news['usuario']); ?>">

<select name="id_usuario" class="form-control">
                            <option value="">Compartilhar com quem?</option>
                            <?php
             require("ligar.php");
                        
                        
                        $consulta_contatos = "SELECT * FROM $table_contatos WHERE usuario=$cod_login";
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

$digitos_nome = strlen($vetor_amigo2[1]);



if($verificadora_amigos > 5)
{
break;
}


            ?>
                            
                            <option value="<?php print($vetor_amigo['codigo']); ?>"><?php print($vetor_amigo2[1]); ?> <?php print($vetor_amigo2[2]); ?></option>
    <?php
 }
 ?>             
                        </select><br><br>

                                                        <input type="text" name="c_descricao" class="form-control emojiPicker"
                                                    placeholder="Escreva alguma coisa.."><br>
                                                        <center><button type="submit" class="btn btn-solid">Compartilhar</button></center>
                                                    </form>

                                                    
                                                
                                            </div>
                                        </div>

                                            <div class="main-comment">

<?php
   $codigo_news = $_GET["codigo_news"];

             require("ligar.php");
                        $consulta_contatos = "SELECT * FROM $table_comentario WHERE post=$codigo_news order by codigo desc";
                        $resultado_contatos = mysqli_query($mysqli,$consulta_contatos);
                        $quantidade_contatos = mysqli_num_rows($resultado_contatos);
                    
            ?>

                      <?php

for($i=0;$i < $quantidade_contatos;$i++)
{

$vetor_contatos = mysqli_fetch_array($resultado_contatos);

if($vetor_contatos[2] == $cod_login)
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

           
                                        <br>

                                                 <div class="media">
                                                    <a href="#" class="user-img popover-cls" data-bs-toggle="popover"
                                                        data-placement="right" data-name="Pabelo mukrani"
                                                        data-img="assets/images/user-sm/2.jpg">
                                                        <img src="img/<?php print($vetor_amigo['foto']); ?>"
                                                            class="img-fluid blur-up lazyload bg-img" alt="user">
                                                    </a>
                                                    <div class="media-body">
                                                        <a href="#">
                                                            <h5><?php print($vetor_amigo2[1]); ?> <?php print($vetor_amigo2[2]); ?></h5>
                                                        </a>
                                                        <p> <?php print($vetor_contatos['comentario']); ?>
                                                          
                                                        </p>
                                                        <ul class="comment-option">
                                                             <li><a href="curtida_comentario.php?codigo_news=<?php print($vetor_contatos['codigo']); ?> && cod_usuario_post=<?php print($vetor_news['usuario']); ?>">Gostei (<?php print($vetor_contatos['curtidas']); ?>)</a></li>
                                                           
 <li><a href="excluir_comentario.php?codigo_news=<?php print($vetor_contatos['codigo']); ?> && codigo_post=<?php print($vetor_news['codigo']); ?>">Excluir</a></li>

                                                         
                                                        </ul>
                                                    </div>
                                                   
                                                </div>

                                                 <?php
}


?>
                                               
                                            </div>
                                           
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        
                    </div>

                     <?php
}


?>
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
                    <form action="pesquisar.php" method="post">
                    <input type="text" name="c_nickname"class="form-control" placeholder="Encontrar Amigos...">
                </form>
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
            <div class="friend-section">
                <div class="header-section">
                    <a data-bs-toggle="collapse" href="#accordion1" class="">recent chats
                        <div class="down-arrow">
                            <i data-feather="chevron-down" class="icon-theme iw-14 ih-14"></i>
                        </div>
                    </a>
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

    <!-- feather icon js-->
    <script src="assets/js/feather.min.js"></script>

    <!-- emoji picker js-->
    <script src="assets/js/emojionearea.min.js"></script>

    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap.js"></script>


    <!-- lazyload js-->
    <script src="assets/js/lazysizes.min.js"></script>

    <!-- theme setting js-->
    <script src="assets/js/theme-setting.js"></script>

    <!-- Theme js-->
    <script src="assets/js/script.js"></script>

    <script>
        feather.replace();
        $(" .emojiPicker").emojioneArea({
            inline: true,
            placement: 'absleft',
            pickerPosition: " top left",
        });
    </script>

    <?php
}
?>

</body>



</html>