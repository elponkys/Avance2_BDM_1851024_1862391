<?php

include_once "../classes/Reportesec-class.php";
session_start();
$fecha1 = $_POST["F1"];
$fecha2 = $_POST["F2"];

  $reReportesec= new ReportesecContr($fecha1,$fecha2);

  $Si= $reReportesec->getReportesec();
  
  echo json_encode($Si);


    exit(); 


?>