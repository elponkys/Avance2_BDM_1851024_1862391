<?php

include "../classes/combo-seccion-class.php";


  $reSeccion= new comboSeccionContr();

  $Si= $reSeccion->fillSeccion();
  echo json_encode($Si);


    exit(); 


?>