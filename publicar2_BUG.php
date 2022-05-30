
<?php
include 'ligar.php';
  session_start();
$cod_login = $_SESSION["cod_login"];
$c_descricao = $_POST["c_descricao"];
$nickname = $_SESSION["nickname"];


date_default_timezone_set('America/Sao_paulo');
$data = date("d/m/Y");
$hora = date("H:i");
         
 require("ligar.php");                                       

                       $consulta_exp = "SELECT * FROM $table_logins WHERE codigo=$cod_login && exp = 1000000";
                       $resultado_consulta_exp = mysqli_query($mysqli, $consulta_exp);
                       $quantos_registros_exp = mysqli_num_rows($resultado_consulta_exp);

                       if($quantos_registros_exp != 0)
                       {

                       }
                
                       else
                       {
                                                            

 
           require("ligar.php");


$expp = "UPDATE $table_logins  SET exp = exp +100 WHERE codigo=$cod_login";
$resultado_exp = mysqli_query($mysqli,$expp);          

                    
}


if(isset($_POST['submit']))
{
  $extension=array('jpeg','jpg','png','gif');
  foreach ($_FILES['image']['tmp_name'] as $key => $value) {
    $filename=$_FILES['image']['name'][$key];
    $filename_tmp=$_FILES['image']['tmp_name'][$key];
    echo '<br>';
    $ext=pathinfo($filename,PATHINFO_EXTENSION);

    $finalimg='';
    if(in_array($ext,$extension))
    {
      if(!file_exists('img/'.$filename))
      {
      move_uploaded_file($filename_tmp, 'img/'.$filename);
      $finalimg=$filename;
      }else
      {
         $filename=str_replace('.','-',basename($filename,$ext));
         $newfilename=$filename.time().".".$ext;
         move_uploaded_file($filename_tmp, 'img/'.$newfilename);
         $finalimg=$newfilename;
      }
    
      //insert
      $insertqry="INSERT INTO post(img,usuario,post,nickname,data,hora,status) VALUES ('$finalimg',$cod_login,'$c_descricao','$nickname','$data', '$hora',1)";
      mysqli_query($mysqli,$insertqry);

      header('Location: usuario.php');
    }else
    {
      //display error
    }
  }
}

?>