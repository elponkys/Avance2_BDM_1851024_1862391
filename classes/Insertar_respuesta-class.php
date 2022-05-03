<?php
include_once "Insertar_respuesta.connect.php";
 class RespuestaContr extends RegisterRespuesta{

    
    private $id_usuario;
    private $id_noticia;
    private $id_parent;
    private $comentario;


public function __construct($id_usuario,$id_noticia,$id_parent,$comentario){

$this->id_usuario=$id_usuario;
$this->id_noticia=$id_noticia;
$this->id_parent=$id_parent;
$this->comentario=$comentario;
}

public function registrorespuesta(){
    if( $this->emptyInputs()==false){
        header("location: ./crearnoticia.php?error=emptyInput");
        exit();
    }

    $this->RegistrarRespuesta($this->id_usuario,$this->id_noticia,$this->id_parent,$this->comentario);
}


private function emptyInputs(){
    $result = null;
    if(empty($this->id_usuario) || empty($this->id_noticia)|| empty($this->id_parent)|| empty($this->comentario)){
        $result = false;
    }else{
        $result=true;
    }
    return $result;
}

}
?>