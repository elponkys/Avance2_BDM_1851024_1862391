<?php

include "../classes/Select_Noticia-class.php";


  $reNoticia= new SNoticiaContr();

  $Si= $reNoticia->fillNoticias();
  echo json_encode($Si);


    exit(); 


?>