<?php
include "../classes/multimedia.connect.php";
 class MultimediaContr extends RegisterMultimedia{

    
    private $id_noticia;
    private $multimedia;


public function __construct($id_noticia,$multimedia){

$this->id_noticia=$id_noticia;
$this->multimedia=$multimedia;
}

public function registroMultimedia(){
    if( $this->emptyInputs()==false){
        header("location: ./crearnoticia.php?error=emptyInput");
        exit();
    }

    $this->RegisterMultimedia($this->id_noticia,$this->multimedia);
}


private function emptyInputs(){
    $result=null;
    if(empty($this->id_noticia) || empty($this->multimedia)){
        $result = false;
    }else{
        $result=true;
    }
    return $result;
}

}
?>