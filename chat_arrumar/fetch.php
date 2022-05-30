<?php
    //let's copy our db connection code
    try{

        $db = new PDO("mysql:host=localhost;dbname=social","root","");

    }catch(PDOException $e){
        echo "Connection Failed: ". $e->getMessage();
    }


    //Now that we are connected to our database let's create the SELECT query
    $sql = "SELECT * FROM messages ORDER BY id asc";
    $result = $db->query($sql);


    while($data = $result->fetch()){
             

        echo "<a href='../ver_usuario.php?codigo_news=".$data['cod_enviador']."'><b>".$data['nome']." ".$data['sobrenome']." </b></a>escreveu:<p>".$data['message_body']."</p><span class='date'>".$data['data']."</span> ás <span class='date'>".$data['hora']."</span><br><br>";
    }

    //Now let's Refrech our index page and see
    //Now let's style our code

?>