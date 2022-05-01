<?php
include_once "ComentarioEditor.connect.php";
 class NoticiaComEdContr extends NoticiaComEd{


    private $id_noticia;
    private $comentario;
  


public function __construct($id_noticia,$comentario){

$this->id_noticia=$id_noticia;
$this->comentario=$comentario;


}


public function fillComEd(){
  
 
 $this->fill_ComEd($this->id_noticia,$this->comentario);
}

}
?>