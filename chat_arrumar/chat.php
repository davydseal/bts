<?php session_start();?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.com/friendbook/html/messanger.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Sep 2021 17:08:05 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="friendbook">
    <meta name="keywords" content="friendbook">
    <meta name="author" content="friendbook">
    <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon" />
    <title>Friendbook</title>

    <!--Google font-->
    <link href="../fonts.googleapis.com/css22868.css?family=Roboto:wght@400;500;700;900&amp;display=swap" rel="stylesheet">
    <link href="../fonts.googleapis.com/css237f4.css?family=Montserrat:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">

    <link rel='stylesheet'
        href='../cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.3/jquery.mCustomScrollbar.min.css'>

    <!-- Theme css -->
    <link id="change-link" rel="stylesheet" type="text/css" href="../assets/css/style.css">

     <?php

$status = $_SESSION["status"];
$system_control = $_SESSION["system_control"];


if(($system_control != 1) || ($status != 2))
{
?>
<script language="javascript">
alert("Acesso Negado!!");
document.location.href="../index.php";
</script>
<?php
}
else
{

   $cod_login = $_SESSION["cod_login"];
$nickname = $_SESSION["nickname"];

  require("../ligar.php");





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
                        <a href="../usuario.php">
                            <img src="../assets/images/icon/logo2.png" width="140" alt="logo"
                                class="img-fluid blur-up lazyload">
                        </a>
                    </div>
                    <div class="search-box">
                        <i data-feather="search" class="icon iw-16 icon-light"></i>
                        <form action="../pesquisar.php" method="post">
                        <input type="text" name="c_nickname" class="form-control search-type" placeholder="Encontrar Amigos...">
                    </form>
                        <div class="icon-close">
                            <i data-feather="x" class="iw-16 icon-light"></i>
                        </div>
                       
                    </div>
                    <ul class="btn-group">
                        <li class="header-btn home-btn">
                            <a class="main-link" href="../usuario.php">
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
                                                <a href="../mensagens.php">
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
             require("../ligar.php");
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
             require("../ligar.php");
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
                                           <a href="../ver_usuario.php?codigo_news=<?php print($vetor_amigo['codigo']); ?>"> <div class="media">
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
<?php



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
                                    <form method="post" action="../limpar_notificacao.php">
                                        <input type="hidden" value="<?php print($vetor_no['codigo']); ?>" name="c_cod_usuario">

                                    <center><span><button type="submit" class="btn btn-solid">Marcar todos como lido</button></span></center>
</form>
                                    <br>
                                    <ul class="friend-list">
                                         <?php
             require("../ligar.php");
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
                                            <a href="../ver_publicacao.php?codigo_news=<?php print($vetor_contatos['cod_post']); ?> && cod_usuario_post=<?php print($vetor_contatos['cod_usuario']); ?>">
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
             require("../ligar.php");
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
                                            <a href="../ver_publicacao.php?codigo_news=<?php print($vetor_contatos['post']); ?> && cod_usuario_post=<?php print($vetor_contatos['cod_usuario_post']); ?>">
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
             require("../ligar.php");
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
                                            <a href="../ver_publicacao.php?codigo_news=<?php print($vetor_contatos['id_post']); ?> && cod_usuario_post=<?php print($vetor_contatos['id_compartilhador']); ?>">
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
             require("../ligar.php");
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
                                            <a href="../ver_video_publicado.php?codigo_news=<?php print($vetor_contatos['id_post']); ?> && cod_usuario_post=<?php print($vetor_contatos['id_compartilhador']); ?>">
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
                                        <img src="../img/<?php print($vetor['foto']); ?>"
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
                                            <a href="../meu_perfil.php">
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
                                            <a href="../chat/chat.php" target="_blank">
                                                <div class="media">
                                                    <i data-feather="edit"></i>
                                                    <div class="media-body">
                                                        <div>
                                                            <h5 class="mt-0">Chat</h5>
                                                            <h6>Chat em tempo real</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                       
                                            <li>
                                            <a href="../feedback.php">
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
                                            <a href="../configuracao.php">
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
                                            <a href="../sair.php">
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
           
        </div>
        <div class="chat-content">
            <div class="tab-content" id="myTabContent">
              
                <?php



$consultad = "SELECT * FROM $table_dados WHERE cod_login=$cod_login";
$resultadod = mysqli_query($mysqli, $consultad);
$vetord = mysqli_fetch_array($resultadod);

?>
                <div class="tab-pane fade show active" id="user3" role="tabpanel" aria-labelledby="user3">
                    <div class="tab-box">
                        <div class="user-chat">
                            <div class="user-title">
                                <div class="back-btn d-block d-sm-none">
                                    <i data-feather="arrow-left"></i>
                                </div>
                                <div class="media list-media">
                                    <div class="story-img">
                                        <div class="user-img">
                                            <img src="../img/<?php print($vetor['foto']); ?>"
                                                class="img-fluid blur-up lazyload bg-img" alt="user">
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h5><?php print($vetord['nome']); ?> <?php print($vetord['sobrenome']); ?></h5>
                                       
                                    </div>
                                </div>
                               
                            </div>
                            <div class="chat-history">
                                <div class="avenue-messenger">
                                    <div class="chat">
                                        <div class="messages-content">
                                            <div class="message new">
                                                <?php
                //Now let's Try to simulate a conversation
                //we have a problem, as you can see for the other side of the conversation we need to refrech to display
                // the new data, so we need to use jquery to solve this
                include('fetch.php');
            ?>
                                               
                                            </div>
                                          
                                        </div>
                                        <div class="message-box">
                                             <form method="POST"   <?php echo 'action = "send.php?"'?>>
                                            <textarea class="message-input"
                                                name="message" cols="70" placeholder="Escreva uma mensagem"></textarea>
                                           
                                            <button type="submit" class="message-submit">Enviar</button>
        </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
               
               
            
            </div>
        </div>
    </section>
    <!-- messanger section end -->


   
    <script>

        setInterval(() => {
            //we have selected our chat div and every 0.5 seconds we will load the fecth page
            //let's test
            $("#room").load('fetch.php')
        }, 500);//this function will refrech every 0.5 seconds
    </script>


    <!-- latest jquery-->
    <script src="../assets/js/jquery-3.6.0.min.js"></script>

    <!-- popper js-->
    <script src="../assets/js/popper.min.js"></script>

    <!-- feather icon js-->
    <script src="../assets/js/feather.min.js"></script>

    <!-- emoji picker js-->
    <script src="../assets/js/emojionearea.min.js"></script>

    <!-- messanger js -->
    <script src="../assets/js/jquery-migrate-1.4.1.min.js"></script>
    <script
        src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    

    <!-- Bootstrap js-->
    <script src="../assets/js/bootstrap.js"></script>

    <!-- lazyload js-->
    <script src="../assets/js/lazysizes.min.js"></script>

    <!-- theme setting js-->
    <script src="../assets/js/theme-setting.js"></script>

    <!-- Theme js-->
    <script src="../assets/js/script.js"></script>

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


<!-- Mirrored from themes.pixelstrap.com/friendbook/html/messanger.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Sep 2021 17:08:13 GMT -->
</html>