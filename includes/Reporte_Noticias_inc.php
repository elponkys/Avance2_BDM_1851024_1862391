<?php

include_once "../classes/Reporte-class.php";
$categoria = $_POST["CAT"];
$fecha1 = $_POST["F1"];
$fecha2 = $_POST["F2"];

  $reReporte= new ReporteContr($categoria,$fecha1,$fecha2);

  $Si= $reReporte->getReporte();
  
  echo json_encode($Si);


    exit(); 


?>