<?php
include "../classes/dbhclasses.php";
class RegisterSeccion extends Dbh
{
   
    protected function register($seccion, $orden, $color, $usuario)
    {  
        
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_InsertSeccion(? , ?, ? , ?)');
        
        if (!$stmt->execute(array( $seccion,$orden, $color, $usuario))) {

            $stmt = null;
            header("location: ./Registro.php?error=stmtfailed");
            exit();
        }
      
        $stmt = null;
        header("location: ../perfil.php");
    }
}