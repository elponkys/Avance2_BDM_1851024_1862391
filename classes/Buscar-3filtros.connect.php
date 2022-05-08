<?php
include_once "dbhclasses.php";
class RegisterBusqueda extends Dbh
{
   
    protected function get_busqueda($titulo, $keyword, $fecha1,$fecha2)
    {  
        
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_Busqueda1(?, ? , ?, ?)');
        
        if (!$stmt->execute(array($titulo, $keyword,$fecha1,$fecha2))) {

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