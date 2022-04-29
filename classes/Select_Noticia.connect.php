<?php

include_once "dbhclasses.php";
class SNoticia extends Dbh
{
   
    protected function fill_noticias()
    {  
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_SelectNoticiasNA();');
        
        if (!$stmt->execute(array())) {

            $stmt = null;
            header("location: ../Registro.php?error=stmtfailed");
            exit();
        }
        
        if($stmt->rowCount() == 0){
         $stmt = null;
         header("location: ../Registro.php?error=nohaynoticias");
         exit();
        }
      
        $NoticiasNA=$stmt->fetchAll(PDO::FETCH_ASSOC);
        

        $stmt = null;
      return $NoticiasNA;  
        
    }

    protected function fill_noticiasAceptadas()
    {  
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_SelectNoticiasA();');
        
        if (!$stmt->execute(array())) {

            $stmt = null;
            header("location: ../Registro.php?error=stmtfailed");
            exit();
        }
        
        if($stmt->rowCount() == 0){
         $stmt = null;
         header("location: ../Registro.php?error=nohaynoticias");
         exit();
        }
        
        $NoticiasA=$stmt->fetchAll(PDO::FETCH_ASSOC);
        

        $stmt = null;
      return $NoticiasA;  
        
    }

    
    protected function fill_10noticias()
    {  
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_Select10NoticiasA();');
        
        if (!$stmt->execute(array())) {

            $stmt = null;
            header("location: ../Registro.php?error=stmtfailed");
            exit();
        }
        
        if($stmt->rowCount() == 0){
         $stmt = null;
         header("location: ../Registro.php?error=nohaynoticias");
         exit();
        }

        $Noticias10A=$stmt->fetchAll(PDO::FETCH_ASSOC);
        

        $stmt = null;
      return $Noticias10A;  
        
    }
    
}
?>