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


if(($system_control != 1) || ($status != 1))
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
    <header>
        <div class="mobile-fix-menu"></div>
        <div class="container-fluid custom-padding">
            <div class="header-section">
                <div class="header-left">
                   
                   
                    <ul class="btn-group">
                        <li class="header-btn home-btn">
                            <a class="main-link" href="admin.php">
                                <i class="icon-light stroke-width-3 iw-16 ih-16" data-feather="home"></i>
                            </a>
                        </li>
                       
                    </ul>
                </div>
                 <?php

$consulta_feed = "SELECT * FROM $table_feedback";
$resultado_feed = mysqli_query($mysqli,$consulta_feed);
$quantidade_feed = mysqli_num_rows($resultado_feed);

                  ?>
                 <?php

$consulta_usuario = "SELECT * FROM $table_logins WHERE status=2";
$resultado_usuario = mysqli_query($mysqli,$consulta_usuario);
$quantidade_usuario = mysqli_num_rows($resultado_usuario);

                  ?>
                    <?php

$consulta_admin = "SELECT * FROM $table_logins WHERE status=1";
$resultado_admin = mysqli_query($mysqli,$consulta_admin);
$quantidade_admin = mysqli_num_rows($resultado_admin);

                  ?>
               <?php

$consulta_public= "SELECT * FROM $table_post";
$resultado_public = mysqli_query($mysqli,$consulta_public);
$quantidade_public = mysqli_num_rows($resultado_public);

                  ?>
                  <?php

$consulta_vid= "SELECT * FROM $table_video";
$resultado_vid = mysqli_query($mysqli,$consulta_vid);
$quantidade_vid = mysqli_num_rows($resultado_vid);

                  ?>
                   <?php

$consulta_lojaa= "SELECT * FROM $table_loja";
$resultado_lojaa = mysqli_query($mysqli,$consulta_lojaa);
$quantidade_lojaa = mysqli_num_rows($resultado_lojaa);

                  ?>
                          <?php

$consulta_report_public= "SELECT * FROM $table_report";
$resultado_report_public = mysqli_query($mysqli,$consulta_report_public);
$quantidade_report_public = mysqli_num_rows($resultado_report_public);

                  ?>

                   

                    <?php

$consulta_report_video= "SELECT * FROM $table_report_video";
$resultado_report_video = mysqli_query($mysqli,$consulta_report_video);
$quantidade_report_video = mysqli_num_rows($resultado_report_video);

                  ?>
                <div class="header-right">
                    <div class="post-stats">
                        <ul>
                           
                            <li>
                                 <a href="exibir_feed.php"><h3><?php print($quantidade_feed); ?></h3>
                                <span>Feed</span></a>
                            </li>
                            <li>
                                 <a href="exibir_usuario_adm.php"><h3><?php print($quantidade_usuario); ?></h3>
                                <span>Usuarios</span></a>
                            </li>

                            <li>
                               <a href="exibir_adm.php"><h3><?php print($quantidade_admin); ?></h3>
                                <span>Adms</span></a>
                            </li>
                            <li>
                                 <a href="admin.php"><h3><?php print($quantidade_public); ?></h3>
                                <span>Public</span></a>
                            </li>
                            <li>
                               <a href="ver_videos_adm.php"><h3><?php print($quantidade_vid); ?></h3>
                                <span>Videos</span></a>
                            </li>
                             <li>
                                <a href="loja_adm.php"><h3><?php print($quantidade_lojaa); ?></h3>
                                <span>Loja</span></a>
                            </li>
                          <li>
                                  <a href="exibir_post_report.php"><h3><?php print($quantidade_report_public); ?></h3>
                                <span>Public Report</span></a>
                            </li>

                            <li>
                                <a href="exibir_video_report.php"><h3><?php print($quantidade_report_video); ?></h3>
                                <span>Vid Report</span></a>
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
                                                <a href="mensagens_adm.php">
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
                                           <a href="ver_usuario_adm.php?codigo_news=<?php print($vetor_amigo['codigo']); ?>"> <div class="media">
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
                                            <a href="meu_perfil_adm.php">
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
                                            <a href="exibir_evento.php">
                                                <div class="media">
                                                    <i data-feather="star"></i>
                                                    <div class="media-body">
                                                        <div>
                                                            <h5 class="mt-0">Evento</h5>
                                                            <h6>Adicionar Novo Evento</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                            <li>
                                            <a href="mensagens_adm.php">
                                                <div class="media">
                                                    <i data-feather="message-circle"></i>
                                                    <div class="media-body">
                                                        <div>
                                                            <h5 class="mt-0">Mensagens</h5>
                                                            <h6>Mensagens</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="configuracao_adm.php">
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
    <div class="page-body container-fluid newsfeed-style2">

        <!-- sidebar panel start -->
        <div class="sidebar-panel panel-lg">
            <div class="main-icon">
                <a href="#">
                    <img src="https://themes.pixelstrap.com/friendbook/assets/svg/sidebar-vector/menu.svg" class="bar-icon-img" alt="menu">
                    <h4>Menu</h4>
                </a>
            </div>
            <ul class="sidebar-icon">
                <li class="active">
                    <a href="admin.php">
                        <img src="https://themes.pixelstrap.com/friendbook/assets/svg/sidebar-vector/news.svg" class="bar-icon-img" alt="news">
                        <h4>Início</h4>
                    </a>
                </li>
                <li>
                    <a href="exibir_usuario_adm.php">
                        <img src="https://themes.pixelstrap.com/friendbook/assets/svg/sidebar-vector/friends.svg" class="bar-icon-img" alt="group">
                        <h4>Usuarios</h4>
                    </a>
                </li>
 <li>
                    <a href="exibir_adm.php">
                        <img src="https://themes.pixelstrap.com/friendbook/assets/svg/sidebar-vector/games.svg" class="bar-icon-img" alt="games">
                        <h4>Administradores</h4>
                    </a>
                </li>  
                             
                 <li>
                    <a href="ver_videos_adm.php">
                        <img src="https://themes.pixelstrap.com/friendbook/assets/svg/sidebar-vector/youtube.svg" class="bar-icon-img" alt="live">
                        <h4>Videos</h4>
                    </a>
                </li>
               
                <li>
                    <a href="exibir_noticias.php">
                        <img src="https://themes.pixelstrap.com/friendbook/assets/svg/sidebar-vector/comment.svg" class="bar-icon-img" alt="news">
                        <h4>Notícias</h4>
                    </a>
                </li>
                 <li>
                    <a href="exibir_curiosidades.php">
                        <img src="https://themes.pixelstrap.com/friendbook/assets/svg/sidebar-vector/cake-pop.svg" class="bar-icon-img" alt="event">
                        <h4>Curiosidades</h4>
                    </a>
                </li>
               
                <li>
                    <a href="loja_adm.php">
                        <img src="https://themes.pixelstrap.com/friendbook/assets/svg/sidebar-vector/cart.svg" class="bar-icon-img" alt="shop">
                        <h4>Loja</h4>
                    </a>
                </li>
            </ul>
            <div class="main-icon">
                <a href="sair.php">
                    <img src="https://themes.pixelstrap.com/friendbook/assets/svg/sidebar-vector/next.svg" class="bar-icon-img" alt="logout">
                    <h4>Sair</h4>
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
                                                    <a href="configuracao_adm.php"><i class="icon-font-light iw-16 ih-16"
                                                            data-feather="edit"></i>editar perfil</a>
                                                </li>
                                                <li>
                                                    <a href="meu_perfil_adm.php"><i class="icon-font-light iw-16 ih-16"
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


                            <div class="profile-content">
                                <a href="meu_perfil_adm.php" class="image-section">
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
                                    <a href="meu_perfil_adm.php">
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
                                                <h3 class="counter-value"><?php print($quantidade_post); ?></h3>
                                                <h5>Publicações</h5>
                                            </li>
                                           
                                        </ul>
                                    </div>
                                    <a href="meu_perfil_adm.php" class="btn btn-solid">Ver Perfil</a>
                                </div>
                            </div>
                        </div>
                        
                       
                            <!-- like page -->
                            
                               
                       <div class="page-list section-t-space">
                                <div class="card-title">
                                    <h3>Notícias</h3>
                                   
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
                                                            <a href="exibir_noticias.php"><i class="icon-font-light iw-16 ih-16"
                                                                    data-feather="search"></i>exibir notícias</a>
                                                        </li>
                                                          <li>
                                                            <a href="add_noticia.php"><i class="icon-font-light iw-16 ih-16"
                                                                    data-feather="edit"></i>nova notícia</a>
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
                                                 <a title="" href="noticias_adm2.php?codigo_news=<?php print($variavel['codigo']); ?>"><div class="img-part">
                                                     <img src="img/<?php print($variavel['img']); ?>"
                                                        class="img-fluid blur-up lazyload bg-img" alt="">
                                                </div></a>
                                                <div class="media-body">
                                                    <a title="" href="noticias_adm2.php?codigo_news=<?php print($variavel['codigo']); ?>"><h4><?php print($variavel['titulo']); ?></h4></a>
                                                   <h6><?php print($variavel['descricao']); ?>
                                                        
                                                    </h6>
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
                                   <h3>Curiosidades</h3>
                                  
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
                                                            <a href="exibir_curiosidades.php"><i class="icon-font-light iw-16 ih-16"
                                                                    data-feather="search"></i>exibir curiosidades</a>
                                                        </li>
                                                          <li>
                                                            <a href="add_curiosidade.php"><i class="icon-font-light iw-16 ih-16"
                                                                    data-feather="edit"></i>nova curiosidade</a>
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
                                                <a title="" href="curiosidades_adm2.php?codigo_news=<?php print($variavel['codigo']); ?>"><div class="img-part">
                                                    <img src="curiosidade/<?php print($variavel['img']); ?>"
                                                        class="img-fluid blur-up lazyload bg-img" alt="">
                                                </div></a>
                                                <div class="media-body">
                                                    <a title="" href="curiosidades_adm2.php?codigo_news=<?php print($variavel['codigo']); ?>"><h4><?php print($variavel['titulo']); ?></h4></a>
                                                    <h6><?php print($variavel['descricao']); ?>
                                                        
                                                    </h6>
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
                       
                        <div class="overlay-bg"></div>
                        <div class="post-panel infinite-loader-sec section-t-space">
                       
                           
                           
                           
                             <?php
             require("ligar.php");
                        $consulta_contatos = "SELECT * FROM $table_post order by codigo desc";
                        $resultado_contatos = mysqli_query($mysqli,$consulta_contatos);
                        $quantidade_contatos = mysqli_num_rows($resultado_contatos);
                    
            ?>

                      <?php

for($i=0;$i < $quantidade_contatos;$i++)
{

$vetor_contatos = mysqli_fetch_array($resultado_contatos);

if($vetor_contatos[1] == $cod_login)
{
$var_amigo = ($vetor_contatos[1]);
}
else
{
$var_amigo = ($vetor_contatos[1]);
}

$verificadora_amigos = $i +1;

$consultar_amigo = "SELECT * FROM $table_logins WHERE codigo=$var_amigo";
$resultado_amigo = mysqli_query($mysqli,$consultar_amigo);
$vetor_amigo = mysqli_fetch_array($resultado_amigo);

$consultar_amigo2 = "SELECT * FROM $table_dados WHERE cod_login=$var_amigo";
$resultado_amigo2 = mysqli_query($mysqli,$consultar_amigo2);
$vetor_amigo2 = mysqli_fetch_array($resultado_amigo2);




            ?>

    
                           
                         <div class="post-wrapper col-grid-box section-t-space">
                                <div class="post-title">
                                    <div class="profile">
                                        <div class="media">
                                            <a class="popover-cls user-img" data-bs-toggle="popover"  href="ver_usuario_adm.php?codigo_news=<?php print($vetor_amigo['codigo']); ?>"
                                                data-name="<?php print($vetor_amigo['nickname']); ?>" data-img="img/<?php print($vetor_amigo['foto']); ?>">
                                                <img src="img/<?php print($vetor_amigo['foto']); ?>"
                                                    class="img-fluid blur-up lazyload bg-img" alt="user">
                                            </a>
                                            <div class="media-body">
                                                <a href="ver_usuario_adm.php?codigo_news=<?php print($vetor_amigo['codigo']); ?>"><h5><?php print($vetor_amigo2['nome']); ?> <?php print($vetor_amigo2['sobrenome']); ?></h5></a>
                                                <h6><?php print($vetor_contatos['data']); ?> ás <?php print($vetor_contatos['hora']); ?></h6>
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
                                                        <a href="excluir_post_adm.php?codigo_news=<?php print($vetor_contatos['codigo']); ?>"><i class="icon-font-light iw-16 ih-16"
                                                                data-feather="x-square"></i>Excluir Post</a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-details">
                                    <div class="img-wrapper">
                                        <img src="img/<?php print($vetor_contatos['img']); ?>" class="img-fluid blur-up lazyload"
                                            alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h3><?php print($vetor_contatos['post']); ?></h3>
                                     
                                       
                                       
                                        
                                    </div>
                                    <div class="like-panel">
                                       
                                        <div class="right-stats">
                                            <ul>
                                                <li>
                                                    <h5>
                                                        <i class="iw-16 ih-16" data-feather="smile"></i>
                                                        <span><?php print($vetor_contatos['curtidas']); ?></span> Curtidas
                                                    </h5>
                                                </li>
                                                <li>
                                                    <h5>
                                                        <i class="iw-16 ih-16" data-feather="message-square"></i>
                                                        <span><?php print($vetor_contatos['comentarios']); ?></span> Comentarios
                                                    </h5>
                                                </li>
                                                <li>
                                                    <h5>
                                                        <i class="iw-16 ih-16" data-feather="share"></i><span><?php print($vetor_contatos['compartilhamentos']); ?></span>
                                                        Compartilhamentos
                                                    </h5>
                                                </li>
                                            </ul>
                                        </div>
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

$consulta_seguidor = "SELECT * FROM $table_contatos WHERE amigo='$var_amigo'";
$resultado_seguidor = mysqli_query($mysqli,$consulta_seguidor);
$quantidade_seguidor = mysqli_num_rows($resultado_seguidor);

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
                                <a href="ver_usuario_adm.php?codigo_news=<?php print($vetor_amigo['codigo']); ?>" class="image-section">
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
                                    <a href="ver_usuario_adm.php?codigo_news=<?php print($vetor_amigo['codigo']); ?>">
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
                            <div class="event-box ratio2_3">
                                <div class="image-section">
                                    <img src="evento/<?php print($variavel['img']); ?>" class="img-fluid blur-up lazyload bg-img"
                                        alt="event">
                                    <div class="card-title">
                                        <h3>evento</h3>
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
                                                            <a href="exibir_evento.php"><i class="icon-font-light iw-16 ih-16"
                                                                    data-feather="search"></i>Ver Todos</a>
                                                        </li>
                                                          <li>
                                                            <a href="add_evento.php"><i class="icon-font-light iw-16 ih-16"
                                                                    data-feather="edit"></i>Adicionar evento</a>
                                                        </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                  
                                </div>
                                <div class="event-content">
                                    <h3><?php print($variavel['nome']); ?></h3>
                                    <h6>Início: <?php print($variavel['datain']); ?> Fim: <?php print($variavel['datafim']); ?></h6>
                                    <p><?php print($variavel['descricao']); ?><br>
                                                      </p>
                                    <div class="bottom-part">
                                        <a href="ver_evento_adm.php?codigo_news=<?php print($variavel['codigo']); ?> && cod_usuario_post=<?php print($vetor['codigo']); ?> && cod_evento=<?php print($variavel['codigo']); ?>" class="event-btn">Ir para o evento</a>
                                    </div>
                                    <a href="ver_evento_adm.php?codigo_news=<?php print($variavel['codigo']); ?> && cod_usuario_post=<?php print($vetor['codigo']); ?> && cod_evento=<?php print($variavel['codigo']); ?>" class="share-btn">
                                        <i class="icon-dark stroke-width-3 iw-14 ih-14"
                                            data-feather="corner-up-right"></i>
                                    </a>
                                </div>
                            </div>
                            <br>
                             <?php
 }
 ?> 

                      

 <div class="page-list section-t-space">
                                <div class="card-title">
                                   <h3>mais curtidos de hoje</h3>
                                   
                                  
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
                                                    <a title="" href="#"><h4><?php print($variavel['post']); ?></h4></a>
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

                        <div class="sticky-top">

 

    <?php

$consulta_loja = "SELECT * FROM $table_loja WHERE status=1";
$resultado_loja = mysqli_query($mysqli,$consulta_loja);
$quantidade_loja = mysqli_num_rows($resultado_loja);

                            ?>
 <!-- game box -->
                    <div class="suggestion-box section-t-space">
                        <div class="card-title">
                          <h3>Loja</h3>
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
                          <center>     <a href="loja_adm.php" class="btn btn-solid">Ir para loja</a></center>
                        </div>
                    </div>


                          
                        </div>
                        </div>
                      
                        


                       
                       
                    </div>
                </div>
            </div>

        </div>

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