<?php
include "like.connect.php";
 class LikeContr extends RegistrarLike{

    
    private $id_noticia;
    private $id_usuario;


public function __construct($id_noticia,$id_usuario){

$this->id_noticia=$id_noticia;
$this->id_usuario=$id_usuario;
}

public function SumarLike(){


    $this->RegisterLike($this->id_noticia,$this->id_usuario);
}

public function RestarLike(){


    $this->Restar_Like($this->id_noticia,$this->id_usuario);
}

public function RevisarLike(){


    return $this->LikeCheck($this->id_noticia,$this->id_usuario);
}




}
?>