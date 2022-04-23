<?php
include "../classes/dbhclasses.php";
class Register extends Dbh
{
   
    protected function RegisterNoticia($id_usuario,$lugar,$firma,$nombre,$descripcion,$noticia,$telefono,$fecha,$keyword)
    {  
        echo '<script>alert("Welcome noticia to Geeks for Geeks")</script>';
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_InsertUsuario(?, ?, ?, ?, ?, ?, ?, ?, ?)');
        
        if (!$stmt->execute(array($id_usuario,$lugar,$firma,$nombre,$descripcion,$noticia,$telefono,$fecha,$keyword))) {

            $stmt = null;
            header("location: ./Registro.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
}
?>