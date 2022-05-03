<?php
include_once "Insertar-comentario.connect.php";
 class ComentarioContr extends RegisterComentario{

    
    private $id_usuario;
    private $id_noticia;
    private $comentario;


public function __construct($id_usuario,$id_noticia,$comentario){

$this->id_usuario=$id_usuario;
$this->id_noticia=$id_noticia;
$this->comentario=$comentario;
}

public function registrocomentario(){
    if( $this->emptyInputs()==false){
        header("location: ./crearnoticia.php?error=emptyInput");
        exit();
    }

    $this->RegistrarComentario($this->id_usuario,$this->id_noticia,$this->comentario);
}


private function emptyInputs(){
    $result = null;
    if(empty($this->id_usuario) || empty($this->id_noticia)|| empty($this->comentario)){
        $result = false;
    }else{
        $result=true;
    }
    return $result;
}

}
?>