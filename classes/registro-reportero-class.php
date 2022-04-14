<?php
include "../classes/register.reportero.class.php";
 class RegisterContr_reportero extends Registerreportero{

   
    private $nombre;
    private $apellido_m;
    private $apellido_p;
     private $email;
     private $contraseña;
    private $telefono;
    private $imagen;
    private $confirm;

public function __construct($nombre,$apellido_m,$apellido_p,$email,$contraseña,$telefono,$imagen,$confirm){

$this->nombre=$nombre;
$this->apellido_m=$apellido_m;
$this->apellido_p=$apellido_p;
$this->email=$email;
$this->contraseña=$contraseña;
$this->telefono=$telefono;
$this->imagen=$imagen;
$this->confirm=$confirm;
}

public function registroUsuario(){
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