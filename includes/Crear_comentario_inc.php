<?php

include_once "../classes/Insertar-comentario-class.php";


    $id_usuario = $_POST["usuario_noti"];
    $id_noti = $_POST["noti_noti"];
    $comentario = $_POST["comentario"];
  $subida= new ComentarioContr($id_usuario,$id_noti ,$comentario);
  $subida->registrocomentario();

  header("location: ../VistaNoticia.php?ID=$id_noti");
    exit(); 


?>