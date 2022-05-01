<?php

include_once "../classes/ComentarioEditor-class.php";


    $id = $_POST["ID"];
    $comentario = $_POST["comentario"];
    
  $subida= new NoticiaComEdContr($id,$comentario);
  $subida->fillComEd();



header("location: ../noticiaslist.php");
    exit(); 


?>