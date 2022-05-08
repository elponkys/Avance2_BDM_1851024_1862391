<?php
include_once "dbhclasses.php";
class RegisterReporte extends Dbh
{
   
    protected function get_reporte($categoria, $fecha1,$fecha2)
    {  
        
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_SelectNoticiaPopular(? , ?, ?)');
        
        if (!$stmt->execute(array( $categoria,$fecha1,$fecha2))) {

            $stmt = null;
            header("location: ./crearnoticia.php?error=stmtfailed");
            exit();
        }
      
        $Reporte=$stmt->fetchAll(PDO::FETCH_ASSOC);
       

        $stmt = null;
      return $Reporte;  
        
    }

    protected function get_busqueda($categoria, $fecha1,$fecha2)
    {  
        
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_Busqueda3(? , ?, ?)');
        
        if (!$stmt->execute(array( $categoria,$fecha1,$fecha2))) {

            $stmt = null;
            header("location: ./crearnoticia.php?error=stmtfailed");
            exit();
        }
      
        $Reporte=$stmt->fetchAll(PDO::FETCH_ASSOC);
       

        $stmt = null;
      return $Reporte;  
        
    }

    protected function get_busquedakw($categoria, $fecha1,$fecha2)
    {  
        
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_Busqueda4(? , ?, ?)');
        
        if (!$stmt->execute(array( $categoria,$fecha1,$fecha2))) {

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