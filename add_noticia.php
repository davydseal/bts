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

      <?php



$consulta = "SELECT * FROM $table_logins WHERE codigo=$cod_login";
$resultado = mysqli_query($mysqli, $consulta);
$vetor = mysqli_fetch_array($resultado);

?>


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
    <div class="page-body container-fluid custom-padding">

         <!-- sidebar panel start -->
        <div class="sidebar-panel">
            <div class="main-icon">
                <a href="#">
                    <i data-feather="grid" class="bar-icon"></i>
                </a>
            </div>
            <ul class="sidebar-icon">
                <li>
                    <a href="admin.php">
                        <i data-feather="file" class="bar-icon"></i>
                        <div class="tooltip-cls">
                            <span>Início</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="meu_perfil_adm.php">
                        <i data-feather="users" class="bar-icon"></i>
                        <div class="tooltip-cls">
                            <span>Perfil</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="mensagens_adm.php">
                        <i data-feather="message-circle" class="bar-icon"></i>
                        <div class="tooltip-cls">
                            <span>Mensagens</span>
                        </div>
                    </a>
                </li>
                
                <li>
                    <a href="ver_videos_adm.php">
                        <i data-feather="headphones" class="bar-icon"></i>
                        <div class="tooltip-cls">
                            <span>Videos</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="configuracao_adm.php">
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





          
           

           

            <div class="container-fluid section-t-space px-0">
                <div class="page-content">

                    <div class="content-center w-100">
                        <!-- friend list -->
                        <div class="friend-list-box section-b-space">
                            <div class="card-title">
                                <h3>Nova Notícia</h3>
                               
                            </div>
                            <div class="container-fluid">
                                <div class="friend-list friend-page-list">
                                    <ul>
<table align="center">
    <form method="post" action="add_noticia2.php" enctype="multipart/form-data" class="c-form">

 
  <tr>
                        
                        <td><input type="text" name="c_titulo" style="width:1000px;" placeholder="Título!" class="form-control"></td><br>

                    </tr>

                     <tr>
                        
                        <td><textarea rows="4" size="50" class="form-control" name="c_descricao" placeholder="Descrição!"></textarea></td><br>

                    </tr>
   

                  <tr>
                        
                        <td><textarea rows="10" size="50" class="form-control" name="c_noticia" placeholder="Notícia!"></textarea></td><br>

                    </tr>
                     <tr>
                        
                        <td> <input type="file" name="arquivo" id="arquivo"></td><br>

                    </tr>
                    <tr>
                        
                       <td><button type="submit" class="btn btn-solid">Cadastrar</button></td>
                   </tr>
                    </form>
</table>
              
                                       
                                    </ul>
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
<form action="pesquisar_adm.php" method="post">
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
                                <a href="ver_usuario_adm.php?codigo_news=<?php print($vetor_amigo['codigo']); ?>" class="popover-cls user-img" data-bs-toggle="popover" data-placement="bottom"
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