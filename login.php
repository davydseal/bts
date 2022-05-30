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

    

</head>

<body>



    <!-- login section start -->
    <section class="login-section">
       
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-5 d-none d-lg-block">
                    <div class="login-welcome">
                        <div>
                         
<video width="444px" loop="true" autoplay="autoplay" controls muted>
  <source src="assets/images/login/vid_index.mp4" type="video/mp4" />

</video>
                            
                          
             
                                
                          
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7 col-md-10 col-12 m-auto">
                    <div class="login-form">
                        <div>
                            <div class="login-title">
                                <h2>Login</h2>
                            </div>
                            <div class="login-discription">
                                <h3>As estrelas em sua galáxia
Não esqueça! finalmente te encontrei!</h3>
                                <h4>Vamos fazer uma porta em seu coração!
                                </h4>
                            </div>
                            <div class="form-sec">
                                <div>
                                    <form class="theme-form" action="verifica_login.php" method="post">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Login</label>
                                            <input type="text" name="c_nickname" class="form-control" id="exampleInputEmail1"
                                                placeholder="Login">
                                            <i class="input-icon iw-20 ih-20" data-feather="user"></i>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Senha</label>
                                            <input type="password" name="c_senha" class="form-control" id="exampleInputPassword1"
                                                placeholder="Senha">
                                            <i class="input-icon iw-20 ih-20" data-feather="eye"></i>
                                            <!-- <i class="input-icon" data-feather="eye-off" width="20" height="20"></i> -->
                                        </div>
                                       
                                        <div class="btn-section">
                                          <button class="btn btn-solid btn-lg" type="submit"><i class="icofont-key"></i> Entrar</button>
                                            <a href="registro.php" class="btn btn-solid btn-lg ms-auto">Criar nova conta</a>
                                        </div>
                                    </form>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </section>
    <!-- login section end -->


    
  


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
        $(".emojiPicker ").emojioneArea({
            inline: true,
            placement: 'absleft',
            pickerPosition: "top left ",
        });
    </script>

</body>



</html>