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



</head>

  <style>
/* Style the video: 100% width and height to cover the entire window */
#myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
}

/* Add some content at the bottom of the video/page */
.content {
  position: fixed;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  color: #f1f1f1;
  width: 100%;
  padding: 20px;
}

/* Style the button used to pause/play the video */
#myBtn {
  width: 200px;
  font-size: 18px;
  padding: 10px;
  border: none;
  background: #000;
  color: #fff;
  cursor: pointer;
}

#myBtn:hover {
  background: #ddd;
  color: black;
}
</style>

<body>

<video autoplay muted loop id="myVideo">
  <source src="dvideo.mov" type="video/mp4">
</video>
   

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
    <div class="page-body container-fluid custom-padding">

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

           

            <div class="container-fluid section-t-space px-0 layout-default">
                <div class="page-content">
                    <div class="content-left">
                        <!-- profile box -->
                        <div class="profile-box">
                            <div class="profile-setting">
                                
                                <div class="setting-btn setting setting-dropdown">
                                    <div class="btn-group custom-dropdown arrow-none dropdown-sm">
                                        <a href="#" class="d-flex" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="icon icon-theme stroke-width-3 iw-11 ih-11" data-feather="sun"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right custom-dropdown">
                                            <ul>
                                                <li>
                                                    <a href="configuracao.php"><i class="icon-font-light iw-16 ih-16"
                                                            data-feather="edit"></i>editar perfil</a>
                                                </li>
                                                <li>
                                                    <a href="meu_perfil.php"><i class="icon-font-light iw-16 ih-16"
                                                            data-feather="user"></i>Ver Perfil</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <?php



$consulta2 = "SELECT * FROM $table_dados WHERE cod_login=$cod_login";
$resultado2 = mysqli_query($mysqli, $consulta2);
$vetor2 = mysqli_fetch_array($resultado2);

?>  

<?php

$consulta_post = "SELECT * FROM $table_post WHERE usuario='$cod_login'";
$resultado_post = mysqli_query($mysqli,$consulta_post);
$quantidade_post = mysqli_num_rows($resultado_post);

                            ?> 

<?php

$consulta_seguindo = "SELECT * FROM $table_contatos WHERE usuario='$cod_login'";
$resultado_seguindo = mysqli_query($mysqli,$consulta_seguindo);
$quantidade_seguindo = mysqli_num_rows($resultado_seguindo);

                            ?>

                            <?php

$consulta_seguidor = "SELECT * FROM $table_contatos WHERE amigo='$cod_login'";
$resultado_seguidor = mysqli_query($mysqli,$consulta_seguidor);
$quantidade_seguidor = mysqli_num_rows($resultado_seguidor);

                            ?>
                            <div class="profile-content">
                                <a href="meu_perfil.php" class="image-section">
                                    <div class="profile-img">
                                        <div>
                                            <img src="img/<?php print($vetor['foto']); ?>"
                                                class="img-fluid blur-up lazyload bg-img" alt="profile">
                                        </div>
                                        <span class="stats">
                                            <img src="assets/images/icon/verified.png"
                                                class="img-fluid blur-up lazyload" alt="verified">
                                        </span>
                                    </div>
                                </a>
                                                                    
                                <div class="profile-detail">
                                    <a href="meu_perfil.php">
                                        <h2><?php print($vetor2['nome']); ?> <?php print($vetor2['sobrenome']); ?> <span>❤</span></h2>
                                    </a>
                                    <h5><?php print($vetor2['email']); ?></h5>
                                    <div class="description">
                                        <p><?php print($vetor2['sobre']); ?>
                                        </p>
                                    </div>
                                    <div class="counter-stats">
                                        <ul id="counter">
                                            <li>
                                                <h3 class="counter-value"><?php print($quantidade_seguindo); ?></h3>
                                                <a href="seguindo.php"><h5>Seguindo</h5></a>
                                            </li>
                                            <li>
                                                <h3 class="counter-value"><?php print($quantidade_post); ?></h3>
                                                <h5>Publicações</h5>
                                            </li>
                                            <li>
                                                <h3 class="counter-value"><?php print($quantidade_seguidor); ?></h3>
                                                <a href="seguidores.php"> <h5>Seguidores</h5></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="meu_perfil.php" class="btn btn-solid">Ver Perfil</a>
                                </div>
                            </div>
                        </div>
                        
                        
                            <!-- like page -->
<div id="divCheckbox" style="display: none;">
  <div class="page-list section-t-space">
                                <div class="card-title">
                                    <a href="noticias.php"><h3>Meus Gêneros Musicais</h3></a>
                                   
                                    <div class="settings">
                                        
                                        <div class="setting-btn ms-2 setting-dropdown">
                                            <div class="btn-group custom-dropdown arrow-none dropdown-sm">
                                                <a href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="icon-dark stroke-width-3 icon iw-11 ih-11"
                                                        data-feather="sun"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right custom-dropdown">
                                                    <ul>
                                                        <li>
                                                        <a href="ver_generos.php"><i class="icon-font-light iw-16 ih-16"
                                                                data-feather="search"></i>Adicionar</a>
                                                    </li>

                                                     <li>
                                                            <a href="meus_generos.php"><i class="icon-font-light iw-16 ih-16"
                                                                    data-feather="edit"></i>Meus Gêneros</a>
                                                        </li>
                                                       
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-content">
                                    <ul>
 <?php
             require("ligar.php");
                        $consulta_contatos = "SELECT * FROM $table_add_genero WHERE usuario=$cod_login";
                        $resultado_contatos = mysqli_query($mysqli,$consulta_contatos);
                        $quantidade_contatos = mysqli_num_rows($resultado_contatos);
                    
            ?>

                      <?php

for($i=0;$i < $quantidade_contatos;$i++)
{

$vetor_contatos = mysqli_fetch_array($resultado_contatos);

if($vetor_contatos[1] == $cod_login)
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

$consultar_genero = "SELECT * FROM $table_generos_musicais WHERE codigo=$var_amigo";
$resultado_genero = mysqli_query($mysqli,$consultar_genero);
$vetor_genero = mysqli_fetch_array($resultado_genero);


 if($i >= 5)
            {
            break;
            }



            ?>

                                        <li>
                                            <div class="media">
                                                <div class="img-part">
                                                     <img src="generos_musicais/<?php print($vetor_genero['img']); ?>"
                                                        class="img-fluid blur-up lazyload bg-img" alt="">
                                                </div>
                                                <div class="media-body">
                                                   <h4><?php print($vetor_genero['genero']); ?></h4>
                                                   
                                                        
                                                    </h6>
                                                </div>
                                            </div>
                                           
                                        </li>
                                                <?php
 }
 ?> 
                                       
                                    </ul>
                                </div>
                            </div>

                             <div class="page-list section-t-space">
                                <div class="card-title">
                                    <a href="noticias.php"><h3>Bandas Favoritas</h3></a>
                                   
                                    <div class="settings">
                                        
                                        <div class="setting-btn ms-2 setting-dropdown">
                                            <div class="btn-group custom-dropdown arrow-none dropdown-sm">
                                                <a href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="icon-dark stroke-width-3 icon iw-11 ih-11"
                                                        data-feather="sun"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right custom-dropdown">
                                                    <ul>
                                                        <li>
                                                        <a href="ver_bandas.php"><i class="icon-font-light iw-16 ih-16"
                                                                data-feather="search"></i>Adicionar</a>
                                                    </li>

                                                     <li>
                                                            <a href="minhas_bandas.php"><i class="icon-font-light iw-16 ih-16"
                                                                    data-feather="edit"></i>Minhas Bandas</a>
                                                        </li>
                                                       
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-content">
                                    <ul>
 <?php
             require("ligar.php");
                        $consulta_contatos = "SELECT * FROM $table_add_banda WHERE usuario=$cod_login";
                        $resultado_contatos = mysqli_query($mysqli,$consulta_contatos);
                        $quantidade_contatos = mysqli_num_rows($resultado_contatos);
                    
            ?>

                      <?php

for($i=0;$i < $quantidade_contatos;$i++)
{

$vetor_contatos = mysqli_fetch_array($resultado_contatos);

if($vetor_contatos[1] == $cod_login)
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

$consultar_banda = "SELECT * FROM $table_bandas WHERE codigo=$var_amigo";
$resultado_banda = mysqli_query($mysqli,$consultar_banda);
$vetor_banda = mysqli_fetch_array($resultado_banda);


 if($i >= 5)
            {
            break;
            }



            ?>

                                        <li>
                                            <div class="media">
                                                <div class="img-part">
                                                     <img src="bandas/<?php print($vetor_banda['img']); ?>"
                                                        class="img-fluid blur-up lazyload bg-img" alt="">
                                                </div>
                                                <div class="media-body">
                                                   <h4><?php print($vetor_banda['nome']); ?></h4>
                                                   
                                                        
                                                    </h6>
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

                            <div class="page-list section-t-space">
                                <div class="card-title">
                                    <a href="noticias.php"><h3>Notícias</h3></a>
                                   
                                    <div class="settings">
                                        
                                        <div class="setting-btn ms-2 setting-dropdown">
                                            <div class="btn-group custom-dropdown arrow-none dropdown-sm">
                                                <a href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="icon-dark stroke-width-3 icon iw-11 ih-11"
                                                        data-feather="sun"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right custom-dropdown">
                                                    <ul>
                                                        <li>
                                                            <a href="noticias.php"><i class="icon-font-light iw-16 ih-16"
                                                                    data-feather="edit"></i>Ver Mais</a>
                                                        </li>
                                                       
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-content">
                                    <ul>

 <?php


             require("ligar.php");
            $consulta3 = "SELECT * FROM $table_noticias WHERE status=1 order by codigo desc"; 
            $resultado3 = mysqli_query($mysqli,$consulta3);
            $quantos_forum = mysqli_num_rows($resultado3);

            ?>

                      <?php

            for($j=0;$j < $quantos_forum;$j++)
            {
            $variavel = mysqli_fetch_array($resultado3);
  if($j >= 5)
            {
            break;
            }

            ?>

                                        <li>
                                            <div class="media">
                                                 <a title="" href="noticias2.php?codigo_news=<?php print($variavel['codigo']); ?>"><div class="img-part">
                                                     <img src="img/<?php print($variavel['img']); ?>"
                                                        class="img-fluid blur-up lazyload bg-img" alt="">
                                                </div></a>
                                                <div class="media-body">
                                                    <a title="" href="noticias2.php?codigo_news=<?php print($variavel['codigo']); ?>"><h4><?php print($variavel['titulo']); ?></h4></a>
                                                   <a title="" href="noticias2.php?codigo_news=<?php print($variavel['codigo']); ?>"><h6><?php print($variavel['descricao']); ?></h6></a>
                                                    <h6><?php print($variavel['data']); ?> às <?php print($variavel['hora']); ?>
                                                        
                                                    </h6>
                                                </div>
                                            </div>
                                           
                                        </li>
                                                <?php
 }
 ?> 
                                       
                                    </ul>
                                </div>
                            </div>

<div class="sticky-top">
                               <div class="page-list section-t-space">
                                <div class="card-title">
                                   <a href="curiosidades.php"> <h3>Curiosidades</h3></a>
                                  
                                    <div class="settings">
                                       
                                        <div class="setting-btn ms-2 setting-dropdown">
                                            <div class="btn-group custom-dropdown arrow-none dropdown-sm">
                                                <a href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="icon-dark stroke-width-3 icon iw-11 ih-11"
                                                        data-feather="sun"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right custom-dropdown">
                                                    <ul>
                                                        <li>
                                                            <a href="curiosidades.php"><i class="icon-font-light iw-16 ih-16"
                                                                    data-feather="edit"></i>Ver Mais</a>
                                                        </li>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-content">
                                    <ul>

   <?php
             require("ligar.php");
            $consulta3 = "SELECT * FROM $table_curiosidades WHERE status=1 order by codigo desc";
            $resultado3 = mysqli_query($mysqli,$consulta3);
            $quantos_forum = mysqli_num_rows($resultado3);

            ?>

                      <?php

            for($j=0;$j < $quantos_forum;$j++)
            {
            $variavel = mysqli_fetch_array($resultado3);
  if($j >= 5)
            {
            break;
            }

            ?>

                                        <li>
                                            <div class="media">
                                                  <a title="" href="curiosidades2.php?codigo_news=<?php print($variavel['codigo']); ?>"><div class="img-part">
                                                    <img src="curiosidade/<?php print($variavel['img']); ?>"
                                                        class="img-fluid blur-up lazyload bg-img" alt="">
                                                </div></a>
                                                <div class="media-body">
                                                    <a title="" href="curiosidades2.php?codigo_news=<?php print($variavel['codigo']); ?>"><h4><?php print($variavel['titulo']); ?></h4></a>
                                                    <a title="" href="curiosidades2.php?codigo_news=<?php print($variavel['codigo']); ?>"><h6><?php print($variavel['descricao']); ?></h6></a>
                                                    <h6><?php print($variavel['data']); ?> às <?php print($variavel['hora']); ?>
                                                        
                                                    </h6>
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
                    </div>
                    <div class="content-center">
                        <!-- create post -->
                        <div class="create-post">
                            <div class="static-section">
                                <div class="card-title">
                                    <h3>Publicar Videos</h3>
                                    <ul class="create-option">
                                        <li class="options">
                                           
                                        </li>
                                       
                                    </ul>
                                    <div class="settings">
                                        <div class="setting-btn ms-2 setting-dropdown no-bg">
                                            <div class="btn-group custom-dropdown arrow-none dropdown-sm">
                                                <div role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="icon icon-font-color iw-14"
                                                        data-feather="more-horizontal"></i>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right custom-dropdown">
                                                    <ul>
                                                        <li>
                                                            <a href="configuracao.php"><i class="icon-font-light iw-16 ih-16"
                                                                    data-feather="edit"></i>editar perfil</a>
                                                        </li>
                                                        <li>
                                                            <a href="meu_perfil.php"><i class="icon-font-light iw-16 ih-16"
                                                                    data-feather="user"></i>ver perfil</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="search-input input-style icon-right">
                                    <form method="post" action="ver_video2.php" enctype="multipart/form-data">
                              
                                    <textarea rows="1" name="c_descricao" class="form-control enable" placeholder="Legenda..."></textarea><br>
                                   
                                        <input type="file" name="arquivo" id="arquivo"><br><br>
                                 <center><button type="submit" class="btn btn-solid">Publicar</button></center>
                               </form>
                                </div>
                            </div>
                         
                            <div class="options-input" id="additional-input">
                                <a id="icon-close" href="javascript:void(0)">
                                    <i class="iw-15 icon-font-light icon-close" data-feather="x"></i>
                                </a>
                               
                              
                              
                            </div>
                            
                           
                        </div>
                        <div class="overlay-bg"></div>
                        
                         <div class="post-wrapper col-grid-box section-t-space no-background">
                                <div class="post-details">
                                    <div class="img-wrapper">
                                        <div class="slider-section">
                                            <div class="friend-slide ratio_landscape default-space no-arrow">
                                                <?php
                                             
             require("ligar.php");
                        $consulta_contatos = "SELECT * FROM logins WHERE status = 2 && codigo !=$cod_login order by codigo desc";
                        $resultado_contatos = mysqli_query($mysqli,$consulta_contatos);
                        $quantidade_contatos = mysqli_num_rows($resultado_contatos);
                
                 if($quantidade_contatos == 0)
 {
 ?>
 <script language="javascript">
alert("Usuario não encontrado!");
document.location.href="usuario.php";
</script>
 <?php
 }
 else
 {
                
            ?>



                      <?php

for($i=0;$i < $quantidade_contatos;$i++)
{

$vetor_contatos = mysqli_fetch_array($resultado_contatos);

if($vetor_contatos[9] == $cod_login)
{
$var_amigo = ($vetor_contatos[0]);
}
else
{
$var_amigo = ($vetor_contatos[0]);
}

$verificadora_amigos = $i +1;

$consultar_amigo = "SELECT * FROM $table_dados WHERE codigo=$var_amigo";
$resultado_amigo = mysqli_query($mysqli,$consultar_amigo);
$vetor_amigo = mysqli_fetch_array($resultado_amigo);

$consulta_seguindo = "SELECT * FROM $table_contatos WHERE usuario='$var_amigo'";
$resultado_seguindo = mysqli_query($mysqli,$consulta_seguindo);
$quantidade_seguindo = mysqli_num_rows($resultado_seguindo);

$consulta_seguidor = "SELECT * FROM $table_contatos WHERE amigo='$var_amigo'";
$resultado_seguidor = mysqli_query($mysqli,$consulta_seguidor);
$quantidade_seguidor = mysqli_num_rows($resultado_seguidor);

$consulta_post = "SELECT * FROM $table_post WHERE usuario='$var_amigo'";
$resultado_post = mysqli_query($mysqli,$consulta_post);
$quantidade_post = mysqli_num_rows($resultado_post);



            ?>          
                                                <div>
                                                    <div class="profile-box friend-box">
                                                        <div class="profile-content">
                                                            <a href="ver_usuario.php?codigo_news=<?php print($vetor_contatos['codigo']); ?>"><div class="image-section">
                                                                <div class="profile-img">
                                                                     <div>
                                                                       <img src="img/<?php print($vetor_contatos['foto']); ?>"
                                                                            class="img-fluid blur-up lazyload bg-img"
                                                                            alt="profile">
                                                                    </div>
                                                                    <span class="stats">
                                                                        <img src="assets/images/icon/verified.png"
                                                                            class="img-fluid blur-up lazyload"
                                                                            alt="verified">
                                                                    </span>
                                                                </div>
                                                            </div></a>
                                                            <div class="profile-detail">
                                                                 <a href="ver_usuario.php?codigo_news=<?php print($vetor_contatos['codigo']); ?>"><h2><?php print($vetor_amigo['nome']); ?> <?php print($vetor_amigo['sobrenome']); ?> <span>❤</span></h2>
</a>                                                                <div class="counter-stats">
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
                                                                <a href="add.php?codigo_news=<?php print($vetor_contatos['codigo']); ?>"
                                                                    class="btn btn-outline">Seguir</a>
                                                            </div>
                                                        </div>
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
                        
                        <div class="post-panel infinite-loader-sec section-t-space">
                           
                          <?php



        $tipo_news = "SELECT video.codigo,video.usuario as post_usuario,video.img,video.descricao,video.nickname,video.status,video.data,video.hora,video.curtidas,  video.compartilhamentos, video.comentarios,
        contatos.amigo, contatos.usuario as cont_usuario,logins.foto from logins, video
LEFT JOIN contatos ON video.usuario = contatos.amigo
WHERE (logins.codigo = video.usuario ) and (video.usuario = $cod_login or contatos.usuario = $cod_login)
  ORDER BY codigo DESC";
                        $tipo_news_resultado = mysqli_query($mysqli, $tipo_news);
                        $tipo_news_quantidade = mysqli_num_rows($tipo_news_resultado);
 
 

for($i=0;$i < $tipo_news_quantidade;$i++)
{
$vetor_news = mysqli_fetch_array($tipo_news_resultado);


?>

    
                           
                         <div class="post-wrapper col-grid-box section-t-space">
                                <div class="post-title">
                                    <div class="profile">
                                        <div class="media">
                                            <a class="popover-cls user-img" data-bs-toggle="popover"  href="ver_usuario.php?codigo_news=<?php print($vetor_news['post_usuario']); ?>"
                                                data-name="<?php print($vetor_news['nickname']); ?>" data-img="img/<?php print($vetor_news['foto']); ?>">
                                                <img src="img/<?php print($vetor_news['foto']); ?>"
                                                    class="img-fluid blur-up lazyload bg-img" alt="user">
                                            </a>
                                            <div class="media-body">
                                                <a href="ver_usuario.php?codigo_news=<?php print($vetor_news['post_usuario']); ?>"><h5><?php print($vetor_news['nickname']); ?></h5></a>
                                                <h6><?php print($vetor_news['data']); ?> ás <?php print($vetor_news['hora']); ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="setting-btn ms-auto setting-dropdown no-bg">
                                        <div class="btn-group custom-dropdown arrow-none dropdown-sm">
                                            <div role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="icon icon-font-color iw-14"
                                                    data-feather="more-horizontal"></i>
                                            </div>
                                            <div class="dropdown-menu dropdown-menu-right custom-dropdown">
                                                <ul>
                                                   
                                                    <li>
                                                        <a href="denunciar_video.php?codigo_news=<?php print($vetor_news['codigo']); ?>&& cod_usuario_post=<?php print($vetor_news['post_usuario']); ?>"><i class="icon-font-light iw-16 ih-16"
                                                                data-feather="x-octagon"></i>Denunciar</a>
                                                    </li>
                                                    <li>
                                                        <a href="excluir_post.php?codigo_news=<?php print($vetor_news['codigo']); ?>"><i class="icon-font-light iw-16 ih-16"
                                                                data-feather="x-square"></i>Excluir Post</a>
                                                    </li>
                                                    <li>
                                                        <a href="deixar_de_seguir2.php?codigo_news=<?php print($vetor_news['post_usuario']); ?>"><i class="icon-font-light iw-16 ih-16"
                                                                data-feather="x-octagon"></i>Deixar de Seguir</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-details">
                                    <div class="img-wrapper">
                                        <video width="483" height="270" controls>
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
                                                <a href="curtida_video.php?codigo_news=<?php print($vetor_news['codigo']); ?> && cod_usuario_post=<?php print($vetor_news['post_usuario']); ?>" class="react-click">
                                                    <i class="iw-18 ih-18" data-feather="smile"></i> Gostei
                                                </a>
                                               
                                            </li>
                                            <li class="comment-click">
                                                <a href="ver_video_publicado.php?codigo_news=<?php print($vetor_news['codigo']); ?> && cod_usuario_post=<?php print($vetor_news['post_usuario']); ?>">
                                                    <i class="iw-18 ih-18" data-feather="message-square"></i> Comentar
                                                </a>
                                            </li>
                                            <li>
                                                <a href="compartilhar_video_publicado.php?codigo_news=<?php print($vetor_news['codigo']); ?> && cod_usuario_post=<?php print($vetor_news['post_usuario']); ?>">
                                                    <i class="iw-16 ih-16" data-feather="share"></i> Compartilhar
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                   
                                </div>
                            </div>    
                           
                            <?php
 }
 ?>         

                           
                        </div>
                         <div id="load-more" class="post-loader">
                            <div class="loader-icon">
                                <i class="icon-theme iw-25 ih-25" data-feather="rotate-ccw"></i>
                            </div>
                            <div class="no-more-text">
                                <p>Não há mais publicações</p>
                            </div>
                        </div>
                    </div>

                    <div class="content-right">
 <?php
             require("ligar.php");
                        $consulta_contatos = "SELECT * FROM $table_post WHERE evento=1 && curtidas >= 2";
                        $resultado_contatos = mysqli_query($mysqli,$consulta_contatos);
                        $quantidade_contatos = mysqli_num_rows($resultado_contatos);
                    
            ?>

                      <?php

for($i=0;$i < $quantidade_contatos;$i++)
{

$vetor_contatos = mysqli_fetch_array($resultado_contatos);



$verificadora_amigos = $i +1;

if($vetor_contatos[1] == $cod_login)
{
$var_amigo = ($vetor_contatos[1]);
}
else
{
$var_amigo = ($vetor_contatos[1]);
}

$consultar_amigo = "SELECT * FROM $table_logins WHERE codigo=$var_amigo";
$resultado_amigo = mysqli_query($mysqli,$consultar_amigo);
$vetor_amigo = mysqli_fetch_array($resultado_amigo);

$consultar_amigo2 = "SELECT * FROM $table_dados WHERE cod_login=$var_amigo";
$resultado_amigo2 = mysqli_query($mysqli,$consultar_amigo2);
$vetor_amigo2 = mysqli_fetch_array($resultado_amigo2);

$consulta_seguindo = "SELECT * FROM $table_contatos WHERE usuario='$var_amigo'";
$resultado_seguindo = mysqli_query($mysqli,$consulta_seguindo);
$quantidade_seguindo = mysqli_num_rows($resultado_seguindo);

$consultar_amigo2 = "SELECT * FROM $table_dados WHERE cod_login=$var_amigo";
$resultado_amigo2 = mysqli_query($mysqli,$consultar_amigo2);
$vetor_amigo2 = mysqli_fetch_array($resultado_amigo2);

$consulta_post = "SELECT * FROM $table_post WHERE usuario='$var_amigo'";
$resultado_post = mysqli_query($mysqli,$consulta_post);
$quantidade_post = mysqli_num_rows($resultado_post);


 if($i >= 1)
            {
            break;
            }



            ?>
                         <!-- profile box -->
                        <div class="profile-box">
                           
                            <div class="profile-content">
                                <a href="ver_usuario.php?codigo_news=<?php print($vetor_amigo['codigo']); ?>" class="image-section">
                                    <div class="profile-img">
                                        <div>
                                            <img src="img/<?php print($vetor_amigo['foto']); ?>"
                                                class="img-fluid blur-up lazyload bg-img" alt="profile">
                                        </div>
                                        <span class="stats">
                                            <img src="assets/images/icon/verified.png"
                                                class="img-fluid blur-up lazyload" alt="verified">
                                        </span>
                                    </div>
                                </a>
                                <div class="profile-detail">
                                    <a href="ver_usuario.php?codigo_news=<?php print($vetor_amigo['codigo']); ?>">
                                        <h2><?php print($vetor_amigo2['nome']); ?> <?php print($vetor_amigo2['sobrenome']); ?><span>❤</span></h2>
                                    </a>
                                    <a href="ver_publicacao.php?codigo_news=<?php print($vetor_contatos['codigo']); ?> && cod_usuario_post=<?php print($vetor_contatos['usuario']); ?>"> <h5><img src="img/<?php print($vetor_contatos['img']); ?>"
                                                class="img-fluid blur-up lazyload"></h5></a>
                                    <div class="description">
                                        <p><?php print($vetor_contatos['curtidas']); ?> Gostaram
                                        </p>
                                          <p>Vencedor!!!
                                        </p>
                                    </div>

                                    <div class="counter-stats">
                                        <ul id="counter">
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
                                    <a href="add.php?codigo_news=<?php print($vetor_amigo['codigo']); ?>" class="btn btn-solid">Seguir</a>
                                </div>
                            </div>

                        </div>

                        <?php
 }
 ?> 

 <?php
             require("ligar.php");
            $consulta3 = "SELECT * FROM $table_evento WHERE status=1";
            $resultado3 = mysqli_query($mysqli,$consulta3);
            $quantos_forum = mysqli_num_rows($resultado3);

            ?>

                      <?php

            for($j=0;$j < $quantos_forum;$j++)
            {
            $variavel = mysqli_fetch_array($resultado3);
 

            ?>

                            <!-- event -->
                            <div class="event-box section-t-space ratio2_3">
                                <div class="image-section">
                                    <img src="evento/<?php print($variavel['img']); ?>" class="img-fluid blur-up lazyload bg-img"
                                        alt="event">
                                    <div class="card-title">
                                        <h3>evento</h3>
                                        
                                    </div>
                                  
                                </div>
                                <div class="event-content">
                                    <h3><?php print($variavel['nome']); ?></h3>
                                    <h6>Início: <?php print($variavel['datain']); ?> Fim: <?php print($variavel['datafim']); ?></h6>
                                    <p><?php print($variavel['descricao']); ?><br>
                                           </p>
                                    <div class="bottom-part">
                                        <a href="ver_evento.php?codigo_news=<?php print($variavel['codigo']); ?> && cod_usuario_post=<?php print($vetor['codigo']); ?> && cod_evento=<?php print($variavel['codigo']); ?>" class="event-btn">Ir para o evento</a>
                                    </div>
                                    <a href="ver_evento.php?codigo_news=<?php print($variavel['codigo']); ?> && cod_usuario_post=<?php print($vetor['codigo']); ?> && cod_evento=<?php print($variavel['codigo']); ?>" class="share-btn">
                                        <i class="icon-dark stroke-width-3 iw-14 ih-14"
                                            data-feather="corner-up-right"></i>
                                    </a>
                                </div>
                            </div>
                             <?php
 }
 ?> 

                        <!-- gallery section -->
                        <div class="gallery-section section-t-space">
                            <div class="gallery-top">
                                <div class="card-title">
                                    <h3>Fotos</h3>
                                      <?php

$consulta_foto = "SELECT * FROM $table_post WHERE usuario='$cod_login' && foto=1";
$resultado_foto = mysqli_query($mysqli,$consulta_foto);
$quantidade_foto = mysqli_num_rows($resultado_foto);

                            ?>
                                    <h5><?php print($quantidade_foto); ?> fotos</h5>
                                    <div class="settings">
                                        
                                        <div class="setting-btn ms-2 setting-dropdown">
                                            <div class="btn-group custom-dropdown arrow-none dropdown-sm">
                                                <a href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="icon-dark stroke-width-3 icon iw-11 ih-11"
                                                        data-feather="sun"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right custom-dropdown">
                                                    <ul>
                                                        <li>
                                                            <a href="ver_fotos.php"><i class="icon-font-light iw-16 ih-16"
                                                                    data-feather="edit"></i>Ver Mais</a>
                                                        </li>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio-section ratio_square">
                                <div class="container-fluid p-0">
                                    <div class="row">

  <?php
             require("ligar.php");
            $consulta3 = "SELECT * FROM $table_post WHERE usuario=$cod_login && foto=1 order by codigo desc";
            $resultado3 = mysqli_query($mysqli,$consulta3);
            $quantos_forum = mysqli_num_rows($resultado3);

            ?>

                      <?php

            for($j=0;$j < $quantos_forum;$j++)
            {
            $variavel = mysqli_fetch_array($resultado3);
  if($j >= 9)
            {
            break;
            }

            ?>

                                        <div class="col-4">
                                            <div class="overlay">
                                                <div class="portfolio-image">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#imageModel">
                                                        <img src="img/<?php print($variavel['img']); ?>" alt=""
                                                            class="img-fluid blur-up lazyload bg-img">
                                                    </a><br>
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
<div class="sticky-top">
 <div class="page-list section-t-space">
                                <div class="card-title">
                                   <h3>mais curtidos de hoje</h3>
                                   
                                    <div class="settings">
                                        
                                        <div class="setting-btn ms-2 setting-dropdown">
                                            <div class="btn-group custom-dropdown arrow-none dropdown-sm">
                                                <a href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="icon-dark stroke-width-3 icon iw-11 ih-11"
                                                        data-feather="sun"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right custom-dropdown">
                                                    <ul>
                                                        <li>
                                                            <a href="noticias.php"><i class="icon-font-light iw-16 ih-16"
                                                                    data-feather="edit"></i>Ver Mais</a>
                                                        </li>
                                                       
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-content">
                                    <ul>

 <?php

date_default_timezone_set('America/Sao_paulo');
$data = date("d/m/Y");


             require("ligar.php");
            $consulta3 = "SELECT * FROM $table_post WHERE data = '$data' && curtidas >=2 order by curtidas desc"; 
            $resultado3 = mysqli_query($mysqli,$consulta3);
            $quantos_forum = mysqli_num_rows($resultado3);

            ?>

                      <?php

            for($j=0;$j < $quantos_forum;$j++)
            {
            $variavel = mysqli_fetch_array($resultado3);
  if($j >= 5)
            {
            break;
            }

            ?>

                                        <li>
                                            <div class="media">
                                                <div class="img-part">
                                                     <img src="img/<?php print($variavel['img']); ?>"
                                                        class="img-fluid blur-up lazyload bg-img" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <a title="" href="ver_publicacao.php?codigo_news=<?php print($variavel['codigo']); ?> && cod_usuario_post=<?php print($variavel['usuario']); ?>"><h4><?php print($variavel['post']); ?></h4></a>
                                                    <h6><?php print($variavel['curtidas']); ?> curtidas, <?php print($variavel['comentarios']); ?> Comentarios, <?php print($variavel['compartilhamentos']); ?> Compartilhamentos
                                                        
                                                    </h6>
                                                </div>
                                            </div>
                                           
                                        </li>
                                                <?php
 }
 ?> 
                                       
                                    </ul>
                                </div>
                            </div>

                        
<div style='display: none;'>
  

    <?php

$consulta_loja = "SELECT * FROM $table_loja WHERE status=1";
$resultado_loja = mysqli_query($mysqli,$consulta_loja);
$quantidade_loja = mysqli_num_rows($resultado_loja);

                            ?>
 <!-- game box -->
                    <div class="suggestion-box section-t-space">
                        <div class="card-title">
                           <a href="loja.php"> <h3>Loja</h3></a>
                            <h5><?php print($quantidade_loja); ?> itens</h5>
                          
                        </div>
                        <div class="suggestion-content ratio_115">
                            <div class="slide-2 no-arrow default-space">

  <?php
             require("ligar.php");
            $consulta3 = "SELECT * FROM $table_loja WHERE status=1";
            $resultado3 = mysqli_query($mysqli,$consulta3);
            $quantos_forum = mysqli_num_rows($resultado3);

            ?>

                      <?php

            for($j=0;$j < $quantos_forum;$j++)
            {
            $variavel = mysqli_fetch_array($resultado3);
 

            ?>

                                <div>
                                    <div class="story-box">
                                        <div class="adaptive-overlay"></div>
                                        <div class="story-bg">
                                            <img src="loja/<?php print($variavel['img']); ?>"
                                                class="img-fluid blur-up lazyload bg-img" data-adaptive-background='1'
                                                alt="">
                                        </div>
                                        <div class="story-content">
                                            <h6><?php print($variavel['nome']); ?></h6>
                                            <span class="player">R$ <?php print($variavel['preco']); ?></span>
                                        </div>
                                    </div>
                                </div>

                                 <?php
 }
 ?> 


                              
                            </div><br>
                          <center>     <a href="loja.php" class="btn btn-solid">Ir para loja</a></center>
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

    <!-- counter js -->
    <script src="assets/js/counter.js"></script>

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