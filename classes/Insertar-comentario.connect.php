<?php
include_once "dbhclasses.php";
class RegisterComentario extends Dbh
{
   
    protected function RegistrarComentario($id_usuario, $id_noticia,$comentario)
    {  
        
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_InsertComentario(? , ?, ?)');
        
        if (!$stmt->execute(array( $id_usuario,$id_noticia,$comentario))) {

            $stmt = null;
            header("location: ./crearnoticia.php?error=stmtfailed");
            exit();
        }
      
        $stmt = null;
        
    }
}
?>