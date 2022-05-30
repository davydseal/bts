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

        <br><br>


    <!-- setting section start -->
    <section class="setting-section section-pb-space section-pt-space">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="setting-sidebar">
                        <div class="back-btn d-lg-none d-block">
                            <i data-feather="x" class="icon-theme"></i>
                        </div>
                         <?php



$consulta = "SELECT * FROM $table_logins WHERE codigo=$cod_login";
$resultado = mysqli_query($mysqli, $consulta);
$vetor = mysqli_fetch_array($resultado);

?>

 <?php



$consulta2 = "SELECT * FROM $table_dados WHERE cod_login=$cod_login";
$resultado2 = mysqli_query($mysqli, $consulta2);
$vetor2 = mysqli_fetch_array($resultado2);

?>  
                        <div class="user-details">
                            <div class="user-img">
                                <img src="img/<?php print($vetor['foto']); ?>" class="img-fluid blur-up lazyload bg-img" alt="">
                            </div>
                            <h5><?php print($vetor['nickname']); ?></h5>
                            <h6><?php print($vetor2['email']); ?></h6>
                        </div>
                        <div class="tab-section">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                
                                <a class="nav-link" data-bs-toggle="pill" href="#personal" role="tab"
                                    aria-controls="personal" aria-selected="false">Dados pessoais</a>
                                <a class="nav-link" data-bs-toggle="pill" href="#account" role="tab"
                                    aria-controls="account" aria-selected="false">Segurança e login</a>
                               
                                <a class="nav-link" data-bs-toggle="pill" href="#foto" role="tab"
                                    aria-controls="notification" aria-selected="false">Foto de perfil</a>
                                <a class="nav-link" data-bs-toggle="pill" href="#capa" role="tab" aria-controls="story"
                                    aria-selected="false">Foto de capa</a>
                              
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="d-lg-none d-block text-right mb-3">
                        <a href="#" class="btn btn-solid setting-menu">
                            setting menu
                        </a>
                    </div>
                    <div class="tab-content" id="v-pills-tabContent">
                       
                        <div class="tab-pane fade" id="personal" role="tabpanel">
                            <div class="setting-wrapper">
                                <div class="setting-title">
                                    <h3>Informações Pessoais</h3>
                                </div>
                                <div class="form-sec">
                                    <div>

<?php
 require("ligar.php");


            $consultar = "SELECT * FROM $table_logins WHERE codigo=$cod_login";
            $resultado = mysqli_query($mysqli, $consultar);
            $vetor = mysqli_fetch_array($resultado);
            
            $consultar2 = "SELECT * FROM $table_dados WHERE cod_login=$cod_login";
            $resultado2 = mysqli_query($mysqli, $consultar2);
            $vetor2 = mysqli_fetch_array($resultado2);
            
            ?>

                                        <form class="theme-form form-sm" method="post" action="configuracao_adm2.php">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Nome</label>
                                                    <input type="text" name="c_nome" value="<?php print($vetor2['nome']);?>" class="form-control"
                                                        placeholder="Nome">
                                                </div>
                                               <div class="form-group col-md-6">
                                                    <label>Sobrenome</label>
                                                    <input type="text" name="c_sobrenome" value="<?php print($vetor2['sobrenome']);?>" class="form-control"
                                                        placeholder="Sobrenome">
                                                </div>
                                              
                                                 <div class="form-group col-12">
                                                    <label for="inputAddress">Email</label>
                                                    <input type="text" name="c_email" value="<?php print($vetor2['email']);?>" class="form-control" id="inputAddress"
                                                        placeholder="email">
                                                </div>
                                               
                                                <div class="form-group col-md-4">
                                                    <label for="city2">Dia</label>
                                                    <select id="city2"  name="dn_dia" class="form-control">
                                                        <option value="<?php print($vetor2['dn_dia']);?>"><?php print($vetor2['dn_dia']);?></option>
 <option value="01">01</option>
      <option value="02">02</option>
      <option value="03">03</option>
      <option value="04">04</option>
      <option value="05">05</option>
      <option value="06">06</option>
      <option value="07">07</option>
      <option value="08">08</option>
      <option value="09">09</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19">19</option>
      <option value="20">20</option>
      <option value="21">21</option>
      <option value="22">22</option>
      <option value="23">23</option>
      <option value="24">24</option>
      <option value="25">25</option>
      <option value="26">26</option>
      <option value="27">27</option>
      <option value="28">28</option>
      <option value="29">29</option>
      <option value="30">30</option>
      <option value="31">31</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="country">Mês</label>
                                                    <select id="country" name="dn_mes" class="form-control">
                                                        <option value="<?php print($vetor2['dn_mes']);?>"><?php print($vetor2['dn_mes']);?></option>
      <option value="Janeiro">Janeiro</option>
      <option value="Fevereiro">Fevereiro</option>
      <option value="Marco">Marco</option>
      <option value="Abril">Abril</option>
      <option value="Maio">Maio</option>
      <option value="Junho">Junho</option>
      <option value="Julho">Julho</option>
      <option value="Agosto">Agosto</option>
      <option value="Setembro">Setembro</option>
      <option value="Outubro">Outubro</option>
      <option value="Novembro">Novembro</option>
      <option value="Dezembro">Dezembro</option>
                                                    </select>
                                                </div>
                                                 <div class="form-group col-md-4">
                                                    <label for="country">Ano</label>
                                                    <select id="country" name="dn_ano" class="form-control">
                                                        <option value="<?php print($vetor2['dn_ano']);?>"><?php print($vetor2['dn_ano']);?></option>
<option value="2021">2021</option>
<option value="2020">2020</option>
<option value="2019">2019</option>
<option value="2018">2018</option>
      <option value="2017">2017</option>    
      <option value="2016">2016</option>
      <option value="2015">2015</option>
      <option value="2014">2014</option>
      <option value="2013">2013</option>
      <option value="2012">2012</option>
      <option value="2011">2011</option>
      <option value="2010">2010</option>
      <option value="2009">2009</option>
      <option value="2008">2008</option>
      <option value="2007">2007</option>
      <option value="2006">2006</option>
      <option value="2005">2005</option>
      <option value="2004">2004</option>
      <option value="2003">2003</option>
      <option value="2002">2002</option>
      <option value="2001">2001</option>
      <option value="2000">2000</option>
      <option value="1999">1999</option>
      <option value="1998">1998</option>
      <option value="1997">1997</option>
      <option value="1996">1996</option>
      <option value="1995">1995</option>
      <option value="1994">1994</option>
      <option value="1993">1993</option>
      <option value="1992">1992</option>
      <option value="1991">1991</option>
      <option value="1990">1990</option>
      <option value="1989">1989</option>
      <option value="1988">1988</option>
      <option value="1987">1987</option>
      <option value="1986">1986</option>
      <option value="1985">1985</option>
      <option value="1984">1984</option>
      <option value="1983">1983</option>
      <option value="1982">1982</option>
      <option value="1981">1981</option>
      <option value="1980">1980</option>
      <option value="1979">1979</option>
      <option value="1978">1978</option>
      <option value="1977">1977</option>
      <option value="1976">1976</option>
      <option value="1975">1975</option>
      <option value="1974">1974</option>
      <option value="1973">1973</option>
      <option value="1972">1972</option>
      <option value="1971">1971</option>
      <option value="1970">1970</option>
      <option value="1969">1969</option>
      <option value="1968">1968</option>
      <option value="1967">1967</option>
      <option value="1966">1966</option>
      <option value="1965">1965</option>
      <option value="1964">1964</option>
      <option value="1963">1963</option>
      <option value="1962">1962</option>
      <option value="1961">1961</option>
      <option value="1960">1960</option>
      <option value="1959">1959</option>
      <option value="1958">1958</option>
      <option value="1957">1957</option>
      <option value="1956">1956</option>
      <option value="1955">1955</option>
      <option value="1954">1954</option>
      <option value="1953">1953</option>
      <option value="1952">1952</option>
      <option value="1951">1951</option>
      <option value="1950">1950</option>
      <option value="1949">1949</option>
      <option value="1948">1948</option>
      <option value="1947">1947</option>
      <option value="1946">1946</option>
      <option value="1945">1945</option>
      <option value="1944">1944</option>
      <option value="1943">1943</option>
      <option value="1942">1942</option>
      <option value="1941">1941</option>
      <option value="1940">1940</option>
      <option value="1939">1939</option>
      <option value="1938">1938</option>
      <option value="1937">1937</option>
      <option value="1936">1936</option>
      <option value="1935">1935</option>
      <option value="1934">1934</option>
      <option value="1933">1933</option>
      <option value="1932">1932</option>
      <option value="1931">1931</option>
      <option value="1930">1930</option>
                                                    </select>
                                                </div>
  <div class="form-group col-12">
                                                    <label for="inputAddress">Escreva um pouco sobre você</label>
                                                    <input type="text" name="c_sobre" value="<?php print($vetor2['sobre']);?>" class="form-control" id="inputAddress"
                                                        placeholder="Sobre você">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Cpf</label>
                                                    <input type="text" name="c_cpf" maxlength="11" value="<?php print($vetor2['cpf']);?>" class="form-control"
                                                        placeholder="Cpf">
                                                </div>
                                               <div class="form-group col-md-6">
                                                    <label>Telefone</label>
                                                    <input type="text" name="c_telefone" maxlength="11" value="<?php print($vetor2['telefone']);?>" class="form-control"
                                                        placeholder="Telefone">
                                                </div>

                                                  <div class="form-group col-md-4">
                                                    <label for="city1">Rua</label>
                                                    <input  type="text" name="c_rua" value="<?php print($vetor2['rua']);?>" class="form-control" id="city1" placeholder="Rua">
                                                </div>
                                               <div class="form-group col-md-4">
                                                    <label for="city1">Número</label>
                                                    <input  type="text" name="c_numero" value="<?php print($vetor2['numero']);?>" class="form-control" id="city1" placeholder="Número">
                                                </div>
                                                 <div class="form-group col-md-4">
                                                    <label for="city1">Bairro</label>
                                                    <input  type="text" name="c_bairro" value="<?php print($vetor2['bairro']);?>" class="form-control" id="city1" placeholder="Bairro">
                                                </div>


                                                 <div class="form-group col-md-4">
                                                    <label for="city1">Cidade</label>
                                                    <input name="c_cidade" value="<?php print($vetor2['cidade']);?>" type="text" class="form-control" id="city1" placeholder="Cidade">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="city2">Estado</label>
                                                    <select id="city2" name="c_estado" class="form-control">
                                                       
                                                          <option value="<?php print($vetor2['estado']);?>"><?php print($vetor2['estado']);?></option>
                                                        <option value="AC">Acre</option>
                                                      
    <option value="AL">Alagoas</option>
    <option value="AP">Amapá</option>
    <option value="AM">Amazonas</option>
    <option value="BA">Bahia</option>
    <option value="CE">Ceará</option>
    <option value="DF">Distrito Federal</option>
    <option value="ES">Espírito Santo</option>
    <option value="GO">Goiás</option>
    <option value="MA">Maranhão</option>
    <option value="MT">Mato Grosso</option>
    <option value="MS">Mato Grosso do Sul</option>
    <option value="MG">Minas Gerais</option>
    <option value="PA">Pará</option>
    <option value="PB">Paraíba</option>
    <option value="PR">Paraná</option>
    <option value="PE">Pernambuco</option>
    <option value="PI">Piauí</option>
    <option value="RJ">Rio de Janeiro</option>
    <option value="RN">Rio Grande do Norte</option>
    <option value="RS">Rio Grande do Sul</option>
    <option value="RO">Rondônia</option>
    <option value="RR">Roraima</option>
    <option value="SC">Santa Catarina</option>
    <option value="SP">São Paulo</option>
    <option value="SE">Sergipe</option>
    <option value="TO">Tocantins</option>

                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="country">Cep</label>
                                                <input name="c_cep"  maxlength="8" value="<?php print($vetor2['cep']);?>" type="text" class="form-control" id="city1" placeholder="Cep">
                                                </div>

                                               
 <div class="form-group col-12">
                                                    <label for="inputAddress">Complemento</label>
                                                    <input type="text" name="c_complemento" value="<?php print($vetor2['complemento']);?>" class="form-control" id="inputAddress"
                                                        placeholder="Complemento">
                                                </div>
                                                
                                               
                                            </div><br>
                                            <div class="text-right">
                                                    <center><button type="submit" class="btn btn-solid">Salvar</button></center>
                                             
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account" role="tabpanel">
                            <div class="setting-wrapper">
                                <div class="setting-title">
                                    <h3>Segurança e Login</h3>
                                </div>
                                <div class="form-sec">
                                    <div>

<?php
 require("ligar.php");


            $consultar = "SELECT * FROM $table_logins WHERE codigo=$cod_login";
            $resultado = mysqli_query($mysqli, $consultar);
            $vetor = mysqli_fetch_array($resultado);
            
            $consultar2 = "SELECT * FROM $table_dados WHERE cod_login=$cod_login";
            $resultado2 = mysqli_query($mysqli, $consultar2);
            $vetor2 = mysqli_fetch_array($resultado2);
            
            ?>

                                        <form method="post" action="dados_sistema2.php" class="theme-form form-sm">
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label>Login</label>
                                                    <input type="text" name="c_nick" value="<?php print($vetor['nickname']);?>" class="form-control"
                                                        placeholder="Login">
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Senha Atual</label>
                                                    <input type="password" name="c_senha_atual" class="form-control"
                                                        placeholder="Senha atual">
                                                </div>
                                               
                                                <div class="form-group col-sm-6">
                                                    <label>Nova Senha</label>
                                                    <input type="password" name="c_senha" class="form-control"
                                                        placeholder="Nova Senha">
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>Repita a Senha</label>
                                                    <input type="password" name="c_confirmar_senha" class="form-control"
                                                        placeholder="Repita a Senha">
                                                </div>
                                                
                                               
                                            </div><br>
                                            <div class="text-right">
                                                <center><button type="submit" class="btn btn-solid">Salvar</button></center>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="tab-pane fade" id="foto" role="tabpanel">
                            <div class="setting-wrapper">
                                <div class="setting-title">
                                    <h3>Foto de perfil</h3>
                                </div>
                                <div class="form-sec">
                                    <div>


                                        <form method="post" action="mudar_foto2.php" enctype="multipart/form-data" class="theme-form form-sm">
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    
                                                    <input type="file" name="Arquivo" id="Arquivo" class="form-control">
                                                   
                                                </div>
                                              
                                                
                                               
                                            </div>
                                            <div class="text-right">

                                               <button type="submit" class="btn btn-solid">Salvar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                           <div class="tab-pane fade" id="capa" role="tabpanel">
                            <div class="setting-wrapper">
                                <div class="setting-title">
                                    <h3>Foto de capa</h3>
                                </div>
                                <div class="form-sec">
                                    <div>


                                        <form method="post" action="mudar_capa2.php" enctype="multipart/form-data" class="theme-form form-sm">
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    
                                                    <input type="file" name="Arquivo" id="Arquivo" class="form-control">
                                                   
                                                </div>
                                              
                                                
                                               
                                            </div>
                                            <div class="text-right">

                                               <button type="submit" class="btn btn-solid">Salvar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- setting section end -->


    <!-- subscribe section start -->
    


    


   
   


    <!-- latest jquery-->
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <!-- popper js-->
    <script src="assets/js/popper.min.js"></script>

    <!-- slick slider js -->
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/custom-slick.js"></script>

    <!-- feather icon js-->
    <script src="assets/js/feather.min.js"></script>

    <!-- Date picker js-->
    <script src="assets/js/date-picker.js"></script>

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
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>

    <?php
}
?>

</body>



</html>