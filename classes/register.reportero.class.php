<?php
include "../classes/dbhclasses.php";
class Registerreportero extends Dbh
{
   
    protected function register($nombre, $apellido_m, $apellido_p, $email, $contraseña, $telefono, $imagen)
    {  
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_InsertReportero(? , ?, ? , ?, ?, ?, ?)');
        
        if (!$stmt->execute(array( $nombre,$apellido_m, $apellido_p, $email, $contraseña, $telefono, $imagen))) {

            $stmt = null;
            header("location: ./Registro.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
        header("location: ../perfil.php");
    }
}
