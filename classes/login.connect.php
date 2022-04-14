<?php

include "../classes/dbhclasses.php";
class logincon extends Dbh
{
   
    protected function sign_in($email, $contraseña)
    {  
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_LogInUsuario(? , ?)');
        
        if (!$stmt->execute(array( $email,$contraseña))) {

            $stmt = null;
            header("location: ../Registro.php?error=stmtfailed");
            exit();
        }
        $check;
        if($stmt->rowCount() == 0){
         $stmt = null;
         header("location: ../Registro.php?error=credencialesInvalidas");
         exit();
        }
        session_start();
        $Usuario_login=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['IdUsuario'] = $Usuario_login[0]["USUARIO_ID"];
        $_SESSION['Nombre'] = $Usuario_login[0]["NOMBRE"];
        $_SESSION['Apellido_m'] = $Usuario_login[0]["APELLIDO_M"];
        $_SESSION['Apellido_p'] = $Usuario_login[0]["APELLIDO_P"];
        $_SESSION['Correo'] = $Usuario_login[0]["CORREO"];
        $_SESSION['Contraseña'] = $Usuario_login[0]["CONTRASEÑA"];
        $_SESSION['Telefono'] = $Usuario_login[0]["TELEFONO"];
        $_SESSION['Imagen'] = $Usuario_login[0]["IMAGEN"];
        $_SESSION['Fecha_alta'] = $Usuario_login[0]["FECHA_ALTA"];
        $_SESSION['Tipo'] = $Usuario_login[0]["TIPO"];
        $_SESSION['Activo'] = $Usuario_login[0]["ACTIVO"];

        $stmt = null;
        header("location: ../perfil.php");
        
    }
}
?>
