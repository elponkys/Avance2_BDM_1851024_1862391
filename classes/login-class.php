<?php
include "../classes/login.connect.php";
 class LoginContr extends logincon{

    private $email;
    private $contraseña;
    

public function __construct($email,$contraseña){

$this->email=$email;
$this->contraseña=$contraseña;

}

public function loginsito(){
    if( $this->emptyInputs()==false){
        header("location: ./Registro.php?error=emptyInput");
        exit();
    }
    
    $this->sign_in($this->email,$this->contraseña);
}
private function emptyInputs(){
    $result=null;
    if(empty($this->email) || empty($this->contraseña) ){
        $result = false;
    }else{
        $result=true;
    }
    return $result;
}

}


?>