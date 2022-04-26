<?php
include_once "dbhclasses.php";
class RegisterAsignacion extends Dbh
{
   
    protected function RegisterAsignacion($id_noticia, $id_seccion)
    {  
        
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_InsertAsignacion(? , ?)');
        
        if (!$stmt->execute(array( $id_noticia,$id_seccion))) {

            $stmt = null;
            header("location: ./crearnoticia.php?error=stmtfailed");
            exit();
        }
      
        $stmt = null;
        
    }
}
?>