<?php
include_once "dbhclasses.php";
class RegistrarLike extends Dbh
{
   
    protected function RegisterLike($id_noticia, $id_usuario)
    {  
        
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_InsertLike(? , ?)');
        
        if (!$stmt->execute(array( $id_noticia,$id_usuario))) {

            $stmt = null;
            header("location: ./crearnoticia.php?error=stmtfailed");
            exit();
        }
      
        $stmt = null;
        
    }

       
    protected function Restar_Like($id_noticia, $id_usuario)
    {  
        
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_DeleteLike(? , ?)');
        
        if (!$stmt->execute(array( $id_noticia,$id_usuario))) {

            $stmt = null;
            header("location: ./crearnoticia.php?error=stmtfailed");
            exit();
        }
      
        $stmt = null;
        
    }

      
    protected function LikeCheck($id_noticia, $id_usuario)
    {  
        $like = false;
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_SelectLike(? , ?)');
        
        if (!$stmt->execute(array( $id_noticia,$id_usuario))) {

            $stmt = null;
            header("location: ./crearnoticia.php?error=stmtfailed");
            exit();
        }
        if($stmt->rowCount() == 0){
            $stmt = null;
            $like = true;
            return $like;
            exit();
           }
           return $like;
        $stmt = null;
        
    }
}
?>