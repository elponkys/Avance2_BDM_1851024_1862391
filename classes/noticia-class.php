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

    if( $this->emptyInputs()===false){
        header("location: noticia-class.php?error=emptyInput");
        exit();
    }

    $this->RegisterNoticia($this->id_usuario,$this->lugar,$this->firma,$this->nombre,$this->descripcion,$this->noticia,$this->telefono,$this->fecha,$this->keyword);
}


public function UltimaNoticia(){
   

    
$ultimita=$this->LastNoticia($this->id_usuario);
return $ultimita;
    
}


private function emptyInputs(){
    
    if(empty($this->id_usuario) || empty($this->lugar) || empty($this->firma) || empty($this->nombre) || empty($this->descripcion) || empty($this->noticia) || empty($this->telefono)|| empty($this->fecha)|| empty($this->keyword)){
        header("location: noticia-class.php?error=eaaaaaaaaaaaa");
        
        $result = false;
    }else{
        
        $result=true;
    }
    return $result;
}

}
?>