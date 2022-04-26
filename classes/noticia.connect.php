<?php
include_once "../classes/dbhclasses.php";
class RegisterNoticia extends Dbh
{

    protected function RegisterNoticia($id_usuario, $lugar, $firma, $nombre, $descripcion, $noticia, $telefono, $fecha, $keyword)
    {

        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_InsertNoticia(?, ?, ?, ?, ?, ?, ?, ?, ?)');

        if (!$stmt->execute(array($id_usuario, $lugar, $firma, $nombre, $descripcion, $noticia, $telefono, $fecha, $keyword))) {

            $stmt = null;
            header("location: ./Registro.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }

    protected function LastNoticia($id_usuario)
    {
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_SelectLastNoticia(?)');
        if (!$stmt->execute(array($id_usuario))) {

            $stmt = null;
            header("location: ./Registro.php?error=stmtfailed");
            exit();
        }
        $UltimaNoticia = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $Ultima=$UltimaNoticia[0]["MAX(NOTICIA_ID)"];
        $stmt = null;
      
        return $Ultima;
    }
}
