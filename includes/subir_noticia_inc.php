<?php

include "../classes/VistaNoticia-class.php";


    $id = $_POST["ID"];
  $subida= new VNoticiaContr($id);
  $subida->subirnoticia();



header("location: ../noticiaslist.php");
    exit(); 


?>