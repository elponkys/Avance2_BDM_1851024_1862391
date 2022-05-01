<?php
include "../classes/noticiaedit.connect.php";
 class NoticiaeditContr extends EditarNoticia{

    private $id_noticia;
    private $lugar;
    private $nombre;
    private $descripcion;
    private $noticia;
    private $fecha;
    private $keyword;


public function __construct($id_noticia,$lugar,$nombre,$descripcion,$noticia,$fecha,$keyword){

$this->id_noticia=$id_noticia;
$this->lugar=$lugar;
$this->nombre=$nombre;
$this->descripcion=$descripcion;
$this->noticia=$noticia;
$this->fecha=$fecha;
$this->keyword=$keyword;


}





public function editnoticia(){
    if( $this->emptyInputs()===false){
        header("location: noticia-class.php?error=emptyInput");
        exit();
    }

    $this->editarNoticia($this->id_noticia,$this->lugar,$this->nombre,$this->descripcion,$this->noticia,$this->fecha,$this->keyword);
}




private function emptyInputs(){
    
    if(empty($this->id_noticia) || empty($this->lugar) || empty($this->nombre) || empty($this->descripcion) || empty($this->noticia) || empty($this->fecha) || empty($this->keyword)){
        header("location: noticia-class.php?error=eaaaaaaaaaaaa");
        
        $result = false;
    }else{
        
        $result=true;
    }
    return $result;
}

}
?>