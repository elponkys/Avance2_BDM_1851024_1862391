<?php

include "../classes/dbhclasses.php";
class editcon extends Dbh
{
   
    public function edit($ID,$nombre, $apellido_m, $apellido_p, $email, $contraseña, $telefono, $imagen)
    {  
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_EditUsuario(? ,? , ?, ? , ?, ?, ? ,?)');
        
        if (!$stmt->execute(array( $ID,$nombre, $apellido_m, $apellido_p, $email, $contraseña, $telefono, $imagen))) {

            $stmt = null;
            header("location: ../perfil.php?error=stmtfailed");
            exit();
        }
        
        if($stmt->rowCount() == 0){
         $stmt = null;
         header("location: ../perfil.php?error=usernotfound");
         exit();
        }
        $_SESSION['IdUsuario'] = $ID;
        $_SESSION['Nombre'] = $nombre;
        $_SESSION['Apellido_m'] = $apellido_m;
        $_SESSION['Apellido_p'] = $apellido_p;
        $_SESSION['Correo'] = $email;
        $_SESSION['Contraseña'] = $contraseña;
        $_SESSION['Telefono'] = $telefono;
        $_SESSION['Imagen'] = $imagen;

        $stmt = null;
        header("location: ../perfil.php");
        
    }
}
?>
