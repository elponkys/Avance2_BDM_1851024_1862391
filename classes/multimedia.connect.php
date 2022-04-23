<?php
include "../classes/dbhclasses.php";
class RegisterMultimedia extends Dbh
{
   
    protected function RegisterMultimedia($id_noticia, $multimedia)
    {  
        echo '<script>alert("Welcome multimedia to Geeks for Geeks")</script>';
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_InsertMultimedia(? , ?)');
        
        if (!$stmt->execute(array( $id_noticia,$multimedia))) {

            $stmt = null;
            header("location: ./crearnoticia.php?error=stmtfailed");
            exit();
        }
      
        $stmt = null;
        
    }
}
?>