<?php
include_once "../classes/seccion.connect.php";
class SeccionContr extends RegisterSeccion
{


    private $seccion;
    private $orden;
    private $color;
    private $usuario;

    public function __construct($seccion, $orden, $color, $usuario)
    {

        $this->seccion = $seccion;
        $this->orden = $orden;
        $this->color = $color;
        $this->usuario = $usuario;
    }

    public function registroSeccion()
    {
        if ($this->emptyInputs() == false) {
            header("location: ./Registro.php?error=emptyInput");
            exit();
        }

        $this->register($this->seccion, $this->orden, $this->color, $this->usuario);
    }

    private function emptyInputs()
    {
        $result=null;
        if (empty($this->seccion) || empty($this->orden) || empty($this->color)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
