<?php
include "../classes/noticia.connect.php";
 class NoticiaContr extends RegisterNoticia{

    
    private $id_usuario;
    private $lugar;
    private $firma;
    private $nombre;
    private $descripcion;
    private $noticia;
    private $telefono;
    private $fecha;
    private $keyword;

public function __construct($id_usuario,$lugar,$firma,$nombre,$descripcion,$noticia,$telefono,$fecha,$keyword){

$this->id_usuario=$id_usuario;
$this->lugar=$lugar;
$this->firma=$firma;
$this->nombre=$nombre;
$this->descripcion=$descripcion;
$this->noticia=$noticia;
$this->telefono=$telefono;
$this->fecha=$fecha;
$this->keyword=$keyword;
}

public function registronoticia(){
    if( $this->emptyInputs()==false){
        header("location: ./Registro.php?error=emptyInput");
        exit();
    }

    $this->register($this->id_usuario,$this->lugar,$this->firma,$this->nombre,$this->descripcion,$this->noticia,$this->telefono,$this->fecha,$this->keyword);
}


private function emptyInputs(){
    $result;
    if(empty($this->id_usuario) || empty($this->lugar) || empty($this->firma) || empty($this->nombre) || empty($this->descripcion) || empty($this->noticia) || empty($this->telefono)|| empty($this->fecha)|| empty($this->keyword)){
        $result = false;
    }else{
        $result=true;
    }
    return $result;
}

}
?>