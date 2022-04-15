<?php
include "../classes/seccion.class.php";
 class SeccionContr extends RegisterSeccion{

   
    private $seccion;
    private $orden;
    private $color;
    private $usuario;
   
public function __construct($seccion,$orden,$color,$usuario){

$this->seccion=$seccion;
$this->orden=$orden;
$this->color=$color;
$this->usuario=$usuario;

}

public function registroSeccion(){
    if( $this->emptyInputs()==false){
        header("location: ./Registro.php?error=emptyInput");
        exit();
    }
    if( $this->matchpass()==false){
        header("location: ./Registro.php?error=contraseñaIncorrecta");
        exit();
    }
    $this->register($this->nombre,$this->apellido_m,$this->apellido_p,$this->email,$this->contraseña,$this->telefono,$this->imagen);
}

private function matchpass(){
    $result;
    if($this->contraseña !== $this->confirm){
        $result = false;
    }else{
        $result = true;
    }
return $result;

}
private function emptyInputs(){
    $result;
    if(empty($this->email) || empty($this->nombre) || empty($this->apellido_m) || empty($this->apellido_p) || empty($this->contraseña) || empty($this->telefono) || empty($this->confirm)){
        $result = false;
    }else{
        $result=true;
    }
    return $result;
}

}
?>