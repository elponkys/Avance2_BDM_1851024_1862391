<?php
include "../classes/asignacion.connect.php";
 class AsignacionContr extends RegisterAsignacion{

    
    private $id_noticia;
    private $id_seccion;


public function __construct($id_noticia,$id_seccion){

$this->id_noticia=$id_noticia;
$this->id_seccion=$id_seccion;
}

public function registroasignacion(){
    if( $this->emptyInputs()==false){
        header("location: ./crearnoticia.php?error=emptyInput");
        exit();
    }

    $this->register($this->id_noticia,$this->id_seccion);
}


private function emptyInputs(){
    $result;
    if(empty($this->id_noticia) || empty($this->id_seccion)){
        $result = false;
    }else{
        $result=true;
    }
    return $result;
}

}
?>