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

    <link rel='stylesheet'
        href='cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.3/jquery.mCustomScrollbar.min.css'>

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
                                <span>Publica????es</span>
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
                                    <span>Notifica????es</span>
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
                                                            <h5 class="mt-0"><span><?php print($vetor_amigo2[1]); ?> <?php print($vetor_amigo2[2]); ?></span> curtiu sua publica????o!
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
                                                            <h5 class="mt-0"><span><?php print($vetor_amigo2[1]); ?> <?php print($vetor_amigo2[2]); ?></span> Comentou sua publica????o!
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
                                                            <h5 class="mt-0"><span><?php print($vetor_amigo2[1]); ?> <?php print($vetor_amigo2[2]); ?></span> compartilhou uma publica????o com voc??!
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
                                                            <h5 class="mt-0"><span><?php print($vetor_amigo2[1]); ?> <?php print($vetor_amigo2[2]); ?></span> compartilhou um video com voc??!
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
                                                            <h5 class="mt-0">Configura????o</h5>
                                                            <h6>todas as configura????es e privacidade</h6>
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
    


    <!-- messanger section start -->
    <section class="messanger-section">
        <div class="chat-users">
            <div class="user-header">
                <a href="index.html" class="back-btn d-block d-sm-none">
                    <i class="ih-18 iw-18" data-feather="arrow-left"></i>
                </a>
                <div class="search-bar">
                    <i data-feather="search" class="icon-theme icon iw-16"></i>
                    <input type="text" class="form-control" placeholder="find friends...">
                </div>
                <a class="new-chat" href="#"><i class="icon-light iw-14 ih-14" data-feather="edit"></i></a>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">

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


 



            ?>

                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="#user1" role="tab" aria-controls="user1"
                        aria-selected="true">
                        <div class="media list-media">
                            <div class="story-img">
                                <div class="user-img">
                                    <img src="img/<?php print($vetor_amigo['foto']); ?>" class="img-fluid blur-up lazyload bg-img"
                                        alt="user">
                                </div>
                            </div>
                            <div class="media-body">
                                <h5><?php print($vetor_amigo2[1]); ?> <?php print($vetor_amigo2[2]); ?> <span>2.40 PM</span></h5>
                                <h6>online</h6>
                            </div>
                        </div>
                        <div class="chat">
                            <h6>i have arranged the meeting at 2.30 </h6>
                            <span class="count">4</span>
                        </div>
                    </a>
                </li>

                <?php
 }
 ?> 

 

               
            </ul>
        </div>
        <div class="chat-content">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="user1" role="tabpanel" aria-labelledby="user1">
                    <div class="tab-box">
                        <div class="user-chat">
                            <div class="user-title">
                                <div class="back-btn d-block d-sm-none">
                                    <i data-feather="arrow-left"></i>
                                </div>
                                <div class="media list-media">
                                    <div class="story-img">
                                        <div class="user-img">
                                            <img src="assets/images/user/2.jpg"
                                                class="img-fluid blur-up lazyload bg-img" alt="user">
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h5>Paul Moliveee </h5>
                                        <h6>active 10m ago</h6>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="chat-history">
                                <div class="avenue-messenger">
                                    <div class="chat">
                                        <div class="messages-content">
                                            <div class="message new">
                                                Well, I thought the main character???s situation was interesting, but his
                                                attitude toward women bothered me.
                                                <div class="timestamp">15:13</div>
                                                <div class="checkmark-sent-delivered">???</div>
                                                <div class="checkmark-read">???</div>
                                            </div>
                                            <div class="message message-personal new">
                                                I can see that. It definitely seemed like he had some problems with
                                                women.
                                                <div class="timestamp">15:13</div>
                                                <div class="checkmark-sent-delivered">???</div>
                                                <div class="checkmark-read">???</div>
                                            </div>
                                           
                                        </div>
                                        <div class="message-box">
                                            <textarea class="message-input"
                                                placeholder="Escreva a mensagem..."></textarea>
                                            
                                            <a href="#" class="message-submit"><i data-feather="send"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-info">
                            <div class="back-btn d-lg-none d-block">
                                <i data-feather="x" class="icon-theme"></i>
                            </div>
                            <div class="user-image">
                                <img src="assets/images/user/2.jpg" class="img-fluid blur-up lazyload bg-img" alt="">
                            </div>
                            <div class="user-name">
                                <h5>Paul Moliveee </h5>
                                <h6>london, united kingdom</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora possimus magnam
                                    adipisci aspernatur.</p>
                               
                            </div>
                          
                        </div>
                    </div>
                </div>
              
             
            </div>
        </div>
    </section>
    <!-- messanger section end -->


  
    


    <!-- latest jquery-->
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <!-- popper js-->
    <script src="assets/js/popper.min.js"></script>

    <!-- feather icon js-->
    <script src="assets/js/feather.min.js"></script>

    <!-- emoji picker js-->
    <script src="assets/js/emojionearea.min.js"></script>

    <!-- messanger js -->
    <script src="assets/js/jquery-migrate-1.4.1.min.js"></script>
    <script
        src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/js/messanger.js"></script>

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
            placement: 'absright',
            pickerPosition: "top",
        });
    </script>

<?php
}
?>

</body>



</html>