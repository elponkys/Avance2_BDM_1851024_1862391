<?php

include_once "../classes/like-class.php";
include_once "../classes/VistaNoticia-class.php";
$id = $_POST["ID"];
$iduser = $_POST["ID_usuario"];

  $relike = new LikeContr($id,$iduser);
  $relike->SumarLike();
  $reNoticia = new VNoticiaContr($id);
  $noti = $reNoticia->fillVNoticias();
  
  
  echo json_encode($noti);


    exit(); 


?>