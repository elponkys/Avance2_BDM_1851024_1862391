<?php
include_once  "Select_Noticia.connect.php";
 class SNoticiaContr extends SNoticia{




public function fillNoticias(){
  
  
    return $this->fill_noticias();
}


public function fill10Noticias(){
  
  
    return $this->fill_10noticias();
}

public function fillNoticiasAceptadas(){
  
  
    return $this->fill_noticiasAceptadas();
}



}
?>