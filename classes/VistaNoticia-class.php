<?php
include_once "VistaNoticia.connect.php";
 class VNoticiaContr extends VNoticia{


    private $id_noticia;
  


public function __construct($id_noticia){

$this->id_noticia=$id_noticia;


}


public function fillVNoticias(){
  
 
    return $this->fill_Vnoticia($this->id_noticia);
}

public function fillVsecciones(){
  
  
    return $this->fill_Vsecciones($this->id_noticia);
}

public function fillVmultimedia(){
  
  
    return $this->fill_Vmultimedia($this->id_noticia);
}

public function fillVcomentarios(){
  
  
    return $this->fill_Vcomentarios($this->id_noticia);
}

public function fillVRespuestas(){
  
  
    return $this->fill_VRespuestas($this->id_noticia);
}

public function fillminiatura(){
  
  
    return $this->fill_miniatura($this->id_noticia);
}

public function subirnoticia(){
  
 
     $this->subir_Vnoticia($this->id_noticia);
}

public function Regresarnoticia(){
  
 
    $this->regresar_Vnoticia($this->id_noticia);
}

}
?>