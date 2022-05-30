<?php

$hostname  = "localhost";
$bancodedados = "social";
$usuario = "root";
$senha = "";
$table_logins = "logins";
$table_dados= "dados";
$table_noticias= "noticias";
$table_contato= "contato";
$table_post= "post";
$table_video= "video";
$table_contatos= "contatos";
$table_comentario= "comentario";
$table_sms= "sms";
$table_curtidas= "curtidas";
$table_curtidas_video= "curtidas_video";
$table_feedback= "feedback";
$table_fotos_login= "fotos_login";
$table_curiosidades= "curiosidades";
$table_visitas= "visitas";
$table_compartilhados= "compartilhados";
$table_video_compartilhados= "video_compartilhados";
$table_report= "report";
$table_report_video= "report_video";
$table_comentario_video= "comentario_video";
$table_compartilhar_videos= "compartilhar_videos";
$table_generos_musicais= "generos_musicais";
$table_add_genero= "add_genero";
$table_bandas= "bandas";
$table_add_banda= "add_banda";
$table_loja= "loja";
$table_evento= "evento";
$table_curtidas_comentarios= "curtidas_comentarios";
$table_curtidas_comentarios_videos= "curtidas_comentarios_videos";
$table_comentario_produto= "comentario_produto";
$table_chat_room= "chat_room";



$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
if ($mysqli->connect_errno){
	echo "falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
} 

//else
//echo "conectado!";