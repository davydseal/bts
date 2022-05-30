
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


require("ligar.php");


$codigo_news = $_GET["codigo_news"];

$atualizar = "UPDATE $table_noticias  SET view = view +1 WHERE codigo=$codigo_news";
$resultado = mysqli_query($mysqli,$atualizar);





?>

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9971072346509900"
     crossorigin="anonymous"></script>

    

</head>

<body class="bg-white">



    <!-- header start -->
    <header class="header-light">
        <div class="mobile-fix-menu"></div>
        <div class="container-fluid custom-padding">
            <div class="header-section">
                <div class="header-left">
                    <div class="brand-logo">
                        <a href="index.php">
                            <img src="assets/images/icon/logo2.png" width="140" alt="logo"
                                class="img-fluid blur-up lazyload">
                        </a>
                    </div>
                   
                  
                </div>
                <div class="header-right">
                   
                    <ul class="option-list">
                      
                      
                        <li class="header-btn custom-dropdown d-md-none d-block app-btn">
                            <a class="main-link" href="javascript:void(0)">
                                <i class="icon-light stroke-width-3 iw-16 ih-16" data-feather="grid"></i>
                            </a>
                            <div class="overlay-bg app-overlay"></div>
                            <div class="app-box">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="app-icon">
                                            <a href="index.html">
                                                <div class="icon">
                                                    <i data-feather="file" class="bar-icon"></i>
                                                </div>
                                                <h5>Newsfeed</h5>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="app-icon">
                                            <a href="single-page.html">
                                                <div class="icon">
                                                    <i data-feather="star" class="bar-icon"></i>
                                                </div>
                                                <h5>favourite</h5>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="app-icon">
                                            <a href="#">
                                                <div class="icon">
                                                    <i data-feather="users" class="bar-icon"></i>
                                                </div>
                                                <h5>group</h5>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="app-icon">
                                            <a href="music.html">
                                                <div class="icon">
                                                    <i data-feather="headphones" class="bar-icon"></i>
                                                </div>
                                                <h5>music</h5>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="app-icon">
                                            <a href="weather.html">
                                                <div class="icon">
                                                    <i data-feather="cloud" class="bar-icon"></i>
                                                </div>
                                                <h5>weather</h5>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="app-icon">
                                            <a href="event.html">
                                                <div class="icon">
                                                    <i data-feather="calendar" class="bar-icon"></i>
                                                </div>
                                                <h5>calender</h5>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="app-icon">
                                            <a href="#">
                                                <div class="icon">
                                                    <svg class="bar-icon">
                                                        <use class="fill-color"
                                                            xlink:href="https://themes.pixelstrap.com/friendbook/assets/svg/icons.svg#cake"></use>
                                                    </svg>
                                                </div>
                                                <h5>event</h5>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="app-icon">
                                            <a href="games.html">
                                                <div class="icon">
                                                    <svg class="bar-icon">
                                                        <use class="fill-color"
                                                            xlink:href="https://themes.pixelstrap.com/friendbook/assets/svg/icons.svg#game-controller">
                                                        </use>
                                                    </svg>
                                                </div>
                                                <h5>games</h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                     <form class="theme-form" action="verifica_login.php" method="post">
                        <table>
                            <tr>
                                <td><input type="text" name="c_nickname" placeholder="Login" size="15" class="form-control" name=""> </td>
                       <td><input type="password" name="c_senha" placeholder="Senha" size="15" class="form-control" name=""></td>
                       <td><button type="submit" class="btn btn-solid">Entrar</button></td>
                       <td> <a href="registro.php" class="btn btn-solid">Criar nova conta</a></td>
                            </tr>
                        </table>
                         </form>
                       
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

   <br><br><br><br>


  


    <!-- career detail section start -->
    <section class="section-pt-space section-pb-space">
        <div class="container">
            <div class="row">

                <div class="col-lg-9 order-lg-1 order-2">

 <?php
                          $codigo_news = $_GET["codigo_news"];

$tipo_news = "SELECT * FROM $table_noticias WHERE codigo=$codigo_news order by codigo desc";
$tipo_news_resultado = mysqli_query($mysqli, $tipo_news);
$tipo_news_quantidade = mysqli_num_rows($tipo_news_resultado);


                       



for($i=0;$i < $tipo_news_quantidade;$i++)
{
$vetor_news = mysqli_fetch_array($tipo_news_resultado);




?>    

                    <div class="career-about">
                        <h2 class="mb-4"><?php print($vetor_news['titulo']); ?></h2>
                        <div class="career-img">
                            <img src="img/<?php print($vetor_news['img']); ?>" class="img-fluid blur-up lazyload bg-img" alt="">
                        </div>
                        <div class="career-content">
                           
                            <div>
                                <p><?php print($vetor_news['noticia']); ?>
                                </p>
                                
                            </div>
                            
                            
                          
                          
                            
                          
                           
                            
                        </div>
                    </div>

                     <?php
}


?>
                </div>
                <div class="col-lg-3 order-lg-2 order-1">
                    <div class="career-sidebar sticky-cls-top ">
                         <div class="blog-sidebar">
                           
                            
                            <div class="blog-wrapper">
                                <div class="sidebar-title">
                                    <h3>Mais Lidas</h3>
                                </div>
                                <div class="sidebar-content">
                                    <ul class="blog-post">
                                         <?php
             require("ligar.php");
            $consulta3 = "SELECT * FROM $table_noticias order by view desc";
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
                                                <a href="noticias_index2.php?codigo_news=<?php print($variavel['codigo']); ?>"><img class="img-fluid blur-up lazyload blur-up lazyload"
                                                        src="img/<?php print($variavel['img']); ?>"
                                                        alt="Generic placeholder image"></a>
                                                <div class="media-body align-self-center">
                                                    <div>
                                                         <a href="noticias_index2.php?codigo_news=<?php print($variavel['codigo']); ?>"><h5><i data-feather="heart" class="iw-12 ih-12"></i><?php print($variavel['titulo']); ?>
                                                        </h5></a>
                                                        <h5><i data-feather="clock" class="iw-12 ih-12"></i><?php print($variavel['data']); ?> às <?php print($variavel['hora']); ?>
                                                        </h5>
                                                       
                                                    </div>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- career detail section end -->


   




    <!-- latest jquery-->
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <!-- popper js-->
    <script src="assets/js/popper.min.js"></script>

    <!-- slick slider js -->
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/custom-slick.js"></script>

    <!-- feather icon js-->
    <script src="assets/js/feather.min.js"></script>

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
    </script>

</body>

    


</html>