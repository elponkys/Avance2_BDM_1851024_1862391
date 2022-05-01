<?php

include "../classes/VistaNoticia-class.php";


    $id = $_POST["ID"];
  $subida= new VNoticiaContr($id);
  $subida->Regresarnoticia();



header("location: ../notilista_pendientes.php");
    exit(); 


?>