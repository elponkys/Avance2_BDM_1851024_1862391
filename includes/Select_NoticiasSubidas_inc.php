<?php

include "../classes/Select_Noticia-class.php";


  $reNoticia= new SNoticiaContr();

  $Si= $reNoticia->fillNoticiasAceptadas();
  echo json_encode($Si);


    exit(); 


?>