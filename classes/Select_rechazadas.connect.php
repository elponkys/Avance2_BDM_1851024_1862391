<?php

include_once "dbhclasses.php";
class SNoticiarech extends Dbh
{
   
    protected function fill_noticiasre($id)
    {  
        
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_SelectNoticiasRe(?);');
        
        if (!$stmt->execute(array($id))) {

            $stmt = null;
            header("location: ../Registro.php?error=stmtfailed");
            exit();
        }
        
        if($stmt->rowCount() == 0){
         $stmt = null;
         header("location: ../Registro.php?error=nohaynoticiaaaaas");
         exit();
        }
        
        $Noticia=$stmt->fetchAll(PDO::FETCH_ASSOC);
       

        $stmt = null;
      return $Noticia;  
        
    }

    
    protected function delete_asignacion($id)
    {  
        
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_DeleteAsignacion(?);');
        
        if (!$stmt->execute(array($id))) {

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


    protected function delete_multi($id)
    {  
        
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_DeleteMultimedia(?);');
        
        if (!$stmt->execute(array($id))) {

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

    protected function get_busqueda($fecha1)
    {  
        
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_Busqueda5(?)');
        
        if (!$stmt->execute(array($fecha1))) {

            $stmt = null;
            header("location: ./crearnoticia.php?error=stmtfailed");
            exit();
        }
      
        $Reporte=$stmt->fetchAll(PDO::FETCH_ASSOC);
       

        $stmt = null;
      return $Reporte;  
        
    }

    
    protected function get_busquedat($fecha1)
    {  
        
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_Busqueda5(?)');
        
        if (!$stmt->execute(array($fecha1))) {

            $stmt = null;
            header("location: ./crearnoticia.php?error=stmtfailed");
            exit();
        }
      
        $Reporte=$stmt->fetchAll(PDO::FETCH_ASSOC);
       

        $stmt = null;
      return $Reporte;  
        
    }


}
?>