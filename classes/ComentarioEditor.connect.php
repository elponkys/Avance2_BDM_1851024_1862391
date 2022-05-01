<?php

include_once "dbhclasses.php";
class NoticiaComEd extends Dbh
{
   
    protected function fill_ComEd($id,$comentario)
    {  
        
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_ReturnNoticia(?,?);');
        
        if (!$stmt->execute(array($id,$comentario))) {

            $stmt = null;
            header("location: ../Registro.php?error=stmtfailed");
            exit();
        }
        
        if($stmt->rowCount() == 0){
         $stmt = null;
         header("location: ../Registro.php?error=nohaynoticiaaaaas");
         exit();
        }
        
       

        $stmt = null;
       
        
    }



}
?>