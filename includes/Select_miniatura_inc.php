<?php

include "../classes/VistaNoticia-class.php";


$id = $_POST["ID"];
  $reMiniatura= new VNoticiaContr($id);

  $Si= $reMiniatura->fillminiatura();
  $a= "".base64_encode('$Si').  "";
  echo json_encode($a);


    exit(); 


?>