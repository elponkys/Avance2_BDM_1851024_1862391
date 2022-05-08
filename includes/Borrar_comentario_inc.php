<?php

include_once "../classes/VistaNoticia-class.php";

$id = $_POST["ID"];

  $reborrar = new VNoticiaContr($id);
  $reborrar->BorrarComentario();
  


    exit(); 


?>