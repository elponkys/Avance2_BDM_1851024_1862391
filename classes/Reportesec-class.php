<?php
include_once "Reportesec.connect.php";
 class ReportesecContr extends RegisterReportesec{

    
    private $fecha1;
    private $fecha2;


public function __construct($fecha1,$fecha2){

$this->fecha1=$fecha1;
$this->fecha2=$fecha2;
}

public function getReportesec(){
    if( $this->emptyInputs()==false){
        header("location: ./crearnoticia.php?error=emptyInput");
        exit();
    }

    return $this->get_reportesec($this->fecha1,$this->fecha2);
}

public function getbusqueda()
{
    if ($this->emptyInputs() == false) {
        header("location: ./crearnoticia.php?error=emptyInput");
        exit();
    }

    return $this->get_busqueda($this->fecha1, $this->fecha2);
}

public function getbusquedaporfecha()
{
    if ($this->emptyInputs() == false) {
        header("location: ./crearnoticia.php?error=emptyInput");
        exit();
    }

    return $this->get_busquedaporfecha($this->fecha1, $this->fecha2);
}


private function emptyInputs(){
    $result = null;
    if(empty($this->fecha1)|| empty($this->fecha2)){
        $result = false;
    }else{
        $result=true;
    }
    return $result;
}

}
?>