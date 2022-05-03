<?php
include_once "dbhclasses.php";
class RegisterRespuesta extends Dbh
{
   
    protected function RegistrarRespuesta($id_usuario, $id_noticia,$id_parent,$comentario)
    {  
        
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_InsertRespuesta(? , ?, ?, ?)');
        
        if (!$stmt->execute(array( $id_usuario,$id_noticia,$id_parent,$comentario))) {

            $stmt = null;
            header("location: ./crearnoticia.php?error=stmtfailed");
            exit();
        }
      
        $stmt = null;
        
    }
}
?>