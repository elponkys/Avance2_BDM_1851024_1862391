<?php
include_once "Reporte.connect.php";
 class ReporteContr extends RegisterReporte{

    
    private $categoria;
    private $fecha1;
    private $fecha2;


public function __construct($categoria,$fecha1,$fecha2){

$this->categoria=$categoria;
$this->fecha1=$fecha1;
$this->fecha2=$fecha2;
}

public function getReporte(){
    if( $this->emptyInputs()==false){
        header("location: ./crearnoticia.php?error=emptyInput");
        exit();
    }

    return $this->get_reporte($this->categoria,$this->fecha1,$this->fecha2);
}

public function getbusqueda()
{
    if ($this->emptyInputs() == false) {
        header("location: ./crearnoticia.php?error=emptyInput");
        exit();
    }

    return $this->get_busqueda($this->categoria,$this->fecha1,$this->fecha2);
}

public function getbusquedakw()
{
    if ($this->emptyInputs() == false) {
        header("location: ./crearnoticia.php?error=emptyInput");
        exit();
    }

    return $this->get_busquedakw($this->categoria,$this->fecha1,$this->fecha2);
}


private function emptyInputs(){
    $result = null;
    if(empty($this->categoria) || empty($this->fecha1)|| empty($this->fecha2)){
        $result = false;
    }else{
        $result=true;
    }
    return $result;
}

}
?>