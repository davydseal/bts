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

    <style>
body {
  background-image: url("assets/images/news.jpeg");
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
                <li>
                    <a href="index.php">
                        <img src="https://themes.pixelstrap.com/friendbook/assets/svg/sidebar-vector/news.svg" class="bar-icon-img" alt="news">
                        <h4>Início</h4>
                    </a>
                </li>
              
                 <li>
                    <a href="#">
                        <img src="https://themes.pixelstrap.com/friendbook/assets/svg/sidebar-vector/youtube.svg" class="bar-icon-img" alt="live">
                        <h4>Videos</h4>
                    </a>
                </li>
               
                <li>
                    <a href="noticias_index.php">
                        <img src="https://themes.pixelstrap.com/friendbook/assets/svg/sidebar-vector/comment.svg" class="bar-icon-img" alt="news">
                        <h4>Notícias</h4>
                    </a>
                </li>
                 <li>
                    <a href="curiosidades_index.php">
                        <img src="https://themes.pixelstrap.com/friendbook/assets/svg/sidebar-vector/cake-pop.svg" class="bar-icon-img" alt="event">
                        <h4>Curiosidades</h4>
                    </a>
                </li>
               
                <li class="active">
                    <a href="#">
                        <img src="https://themes.pixelstrap.com/friendbook/assets/svg/sidebar-vector/cart.svg" class="bar-icon-img" alt="shop">
                        <h4>Loja</h4>
                    </a>
                </li>
            </ul>
            <div class="main-icon">
                <a href="login.php">
                    <img src="https://themes.pixelstrap.com/friendbook/assets/svg/sidebar-vector/friends.svg" class="bar-icon-img" alt="logout">
                    <h4>Entrar</h4>
                </a>
            </div>
        </div>
        <!-- sidebar panel end -->



        <div class="page-center">
 <div class="page-center">

          
            

          

            <div class="container-fluid section-t-space px-0">
                <div class="page-content">
                    <div class="content-center w-100">
                        <!-- gallery section -->
                        <div class="gallery-page-section section-b-space">
                            <div class="card-title">
                                <h3>Loja</h3>
                              
                            </div>
                            <div class="tab-section">
                               
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active Choose-photo-modal" id="photo-album"
                                        role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row gallery-album">
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
                                            <div class="col-xl-3 col-lg-4 col-6">
                                                <a href="login.php" class="card collection">
                                                    <img class="card-img-top img-fluid blur-up lazyload bg-img"
                                                        src="loja/<?php print($variavel['img']); ?>" alt="Card image cap">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?php print($variavel['nome']); ?></h5>
                                                        <h6>R$ <?php print($variavel['preco']); ?></h6>
                                                    </div>
                                                </a>
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
                </div>
            </div>
        </div>
          

            <div class="container-fluid section-t-space px-0 layout-default">
                <div class="page-content">
                    <div class="content-left">
                       
                        <div class="sticky-top">
                            
                               
                 


                              
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

    <!-- popover js for custom popover -->
    <script src="assets/js/popover.js"></script>

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

</body>



</html>