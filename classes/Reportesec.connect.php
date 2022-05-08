<?php
include_once "dbhclasses.php";
class RegisterReportesec extends Dbh
{
   
    protected function get_reportesec($fecha1,$fecha2)
    {  
        
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_SelectSeccionPopular(?, ?)');
        
        if (!$stmt->execute(array($fecha1,$fecha2))) {

            $stmt = null;
            header("location: ./crearnoticia.php?error=stmtfailed");
            exit();
        }
      
        $Reporte=$stmt->fetchAll(PDO::FETCH_ASSOC);
       

        $stmt = null;
      return $Reporte;  
        
    }

    protected function get_busqueda($fecha1,$fecha2)
    {  
        
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_Busqueda2(?, ?)');
        
        if (!$stmt->execute(array($fecha1,$fecha2))) {

            $stmt = null;
            header("location: ./crearnoticia.php?error=stmtfailed");
            exit();
        }
      
        $Reporte=$stmt->fetchAll(PDO::FETCH_ASSOC);
       

        $stmt = null;
      return $Reporte;  
        
    }

    protected function get_busquedaporfecha($fecha1,$fecha2)
    {  
        
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_Busqueda6(?, ?)');
        
        if (!$stmt->execute(array($fecha1,$fecha2))) {

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