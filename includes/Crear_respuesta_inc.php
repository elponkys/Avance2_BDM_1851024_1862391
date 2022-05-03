<?php

include_once "../classes/Insertar_respuesta-class.php";
session_start();

    $id_usuario = $_SESSION["IdUsuario"];
    $id_noti = $_POST["NOTICIA_ID"];
    $id_parent = $_POST["COMENTARIO_ID"];
    $comentario = $_POST["respuesta"];
  $subida= new RespuestaContr($id_usuario,$id_noti, $id_parent ,$comentario);
  $subida->registrorespuesta();
  header("location: ../VistaNoticia.php?ID=$id_noti");
    exit(); 


?>