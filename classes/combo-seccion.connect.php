<?php

include "../classes/dbhclasses.php";
class ComboSeccion extends Dbh
{
   
    protected function fill_data()
    {  
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_SelectSecciones();');
        
        if (!$stmt->execute(array())) {

            $stmt = null;
            header("location: ../Registro.php?error=stmtfailed");
            exit();
        }
        
        if($stmt->rowCount() == 0){
         $stmt = null;
         header("location: ../Registro.php?error=nohaysecciones");
         exit();
        }
        session_start();
        $Combo_secciones=$stmt->fetchAll(PDO::FETCH_ASSOC);
      

        $stmt = null;
      return $Combo_secciones;  
        
    }
}
?>
