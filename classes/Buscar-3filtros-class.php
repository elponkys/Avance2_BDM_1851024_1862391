<?php
include_once "Buscar-3filtros.connect.php";
class BusquedaContr extends RegisterBusqueda
{

    private $titulo;
    private $keyword;
    private $fecha1;
    private $fecha2;


    public function __construct($titulo, $keyword, $fecha1, $fecha2)
    {
        $this->titulo = $titulo;
        $this->keyword = $keyword;
        $this->fecha1 = $fecha1;
        $this->fecha2 = $fecha2;
    }

    public function getbusqueda()
    {
        if ($this->emptyInputs() == false) {
            header("location: ./crearnoticia.php?error=emptyInput");
            exit();
        }

        return $this->get_busqueda($this->titulo,$this->keyword, $this->fecha1, $this->fecha2);
    }


    private function emptyInputs()
    {
        $result = null;
        if (empty($this->titulo) || empty($this->keyword) || empty($this->fecha2) || empty($this->fecha1)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
