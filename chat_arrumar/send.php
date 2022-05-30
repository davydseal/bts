<?php

    //Now let's first crete a new data base and a new Table
    //Now that we have created our database let's connect using PDO

    //DB connection code

    try{

        $db = new PDO("mysql:host=localhost;dbname=social","root","");

        require("../ligar.php");
session_start();
$cod_login = $_SESSION["cod_login"];
$nome = $_SESSION["nome"];
$sobrenome = $_SESSION["sobrenome"];

        //Now we need to write the code to insert the message into our database
       
        date_default_timezone_set('America/Sao_paulo');
$data = date("d/m/Y");
$hora = date("H:i");
 
        $message = $_POST["message"];

        //Now we will Add the sql query that will insert to message into our db
        $sql = "INSERT INTO messages (nome,sobrenome,cod_enviador,message_body,data,hora) VALUES ('$nome','$sobrenome', $cod_login,'$message', '$data', '$hora')";
        //Now let's Execute this query
        $db->exec($sql);
        echo "Message sent succefully";
        //now let's test it
        //Now it should work

        //Now we want to redirect to our index page without seeing this page
        header("Location: chat.php");
        //Now let's fetch our database data

    }catch(PDOException $e){
        echo "Connection Failed: ". $e->getMessage();
    }

?>