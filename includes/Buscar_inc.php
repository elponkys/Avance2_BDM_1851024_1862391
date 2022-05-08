<?php
include_once "../classes/Buscar-3filtros-class.php";
include_once "../classes/Reportesec-class.php";
include_once "../classes/Reporte-class.php";
if ($_POST["titulo"]!=null && $_POST["keyword"]!= null && $_POST["fecha1"]!=null && $_POST["fecha2"]!=null) {
    $titulo = $_POST["titulo"];
    $keyword = $_POST["keyword"];
    $fecha1 = $_POST["fecha1"];
    $fecha2 = $_POST["fecha2"];
    echo json_encode("aa");
      $reBusqueda= new BusquedaContr($titulo,$keyword,$fecha1,$fecha2);
    
      $Si= $reBusqueda->getbusqueda();
      
      echo json_encode("aa");
      header("location: ../Busqueda.php?Notis=$Si");
    
        exit(); 


}else{ if($_POST["titulo"]!=null && $_POST["keyword"]!=null){
    $titulo = $_POST["titulo"];
    $keyword = $_POST["keyword"];
    echo json_encode("aa");

      $reBusqueda= new ReportesecContr($titulo,$keyword);
    
      $Si= $reBusqueda->getbusqueda();
      
      echo json_encode("aa");
      header("location: ../Busqueda.php?Notis=$Si");
    
        exit(); 

}else{if($_POST["titulo"]!=null && $_POST["fecha1"]!=null && $_POST["fecha2"]!=null){

    $titulo = $_POST["titulo"];
    $fecha1 = $_POST["fecha1"];
    $fecha2 = $_POST["fecha2"];
 

      $reBusqueda= new ReporteContr($titulo,$fecha1,$fecha2);
    
      $Si= $reBusqueda->getbusqueda();
 
      header("location: ../Busqueda.php?Notis=$Si");
    
        exit(); 

}else{if($_POST["keyword"]!=null && $_POST["fecha1"]!=null && $_POST["fecha2"]!=null){
    $keyword = $_POST["keyword"];
    $fecha1 = $_POST["fecha1"];
    $fecha2 = $_POST["fecha2"];

      $reBusqueda= new ReporteContr($keyword,$fecha1,$fecha2);
    
      $Si= $reBusqueda->getbusquedakw();
      
      echo json_encode("aa");
      header("location: ../Busqueda.php?Notis=$Si");
    
        exit(); 


}else{if($_POST["keyword"]!=null){

    $keyword = $_POST["keyword"];
  

      $reBusqueda= new SNoticiare($keyword);
    
      $Si= $reBusqueda->getbusqueda();
      
      echo json_encode("aa");
      header("location: ../Busqueda.php?Notis=$Si");
    
        exit(); 

    
}else{if($_POST["fecha1"]!=null && $_POST["fecha2"]!=null){


    $fecha1 = $_POST["fecha1"];
    $fecha2 = $_POST["fecha2"];


      $reBusqueda= new ReportesecContr($fecha1,$fecha2);
    
      $Si= $reBusqueda->getbusqueda();
      
      echo json_encode("aa");
      header("location: ../Busqueda.php?Notis=$Si");
    
        exit(); 


}else{if($_POST["titulo"]!=null){
    $titulo = $_POST["titulo"];
  

      $reBusqueda= new SNoticiare($titulo);
    
      $Si= $reBusqueda->getbusquedat();
      
      echo json_encode("aa");
      header("location: ../Busqueda.php?Notis=$Si");
    
        exit(); 

}

}


}


}


}

}
}