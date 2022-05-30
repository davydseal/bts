<?php session_start();?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon" />
    <title>Universe BTS</title>
    <!-- Use the Jquery CDN you can find it in the description -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="main.css?v=1.1">
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

  require("../ligar.php");





?>

</head>
<body>
    

<video autoplay muted loop id="myVideo">
  <source src="../bvideo.mp4" type="video/mp4">
</video>
  
  

    <div class="container">

     

        <form method="POST" name="chat_form"  <?php echo 'action = "send.php?"'?>>

            <textarea name="message" placeholder ="Escreva uma mensagem" required></textarea><br>
            <button type="submit">Enviar</button>
        </form>
        <!-- Create the chat room section -->
    <div id="room" style="background-color: #FFF; overflow-y:scroll; height:400px; width: 640px; " class="room">
            <?php
                //Now let's Try to simulate a conversation
                //we have a problem, as you can see for the other side of the conversation we need to refrech to display
                // the new data, so we need to use jquery to solve this
                include('fetch.php');
            ?>
        </div>
   
    </div>


<!-- Now we need to create a script -->
    <script>

        setInterval(() => {
            //we have selected our chat div and every 0.5 seconds we will load the fecth page
            //let's test
            $("#room").load('fetch.php')
        }, 500);//this function will refrech every 0.5 seconds
    </script>
<?php
}
?>
</body>
</html>