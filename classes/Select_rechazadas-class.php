<?php
include_once  "Select_rechazadas.connect.php";
 class SNoticiare extends SNoticiarech{

    private $id_usuario;

    public function __construct($id_usuario){

        $this->id_usuario=$id_usuario;
        
        
        }

public function fillNoticiasre(){
  
  
    return $this->fill_noticiasre($this->id_usuario);
}

public function deleteasignacion(){
  
  $this->delete_asignacion($this->id_usuario);
}

public function deletemulti(){
  
    $this->delete_multi($this->id_usuario);
  }



}
?>