<?php

include_once "../classes/Select_rechazadas-class.php";
session_start();
$id = $_SESSION['IdUsuario'];

  $reNoticia= new SNoticiare($id);

  $Si= $reNoticia->fillNoticiasre();
  
  echo json_encode($Si);


    exit(); 


?>