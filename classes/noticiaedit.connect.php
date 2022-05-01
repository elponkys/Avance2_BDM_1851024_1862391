<?php
include_once "../classes/dbhclasses.php";
class EditarNoticia extends Dbh
{

    protected function editarNoticia($id_noticia, $lugar, $nombre, $descripcion, $noticia, $fecha, $keyword)
    {

        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_EditNoticia(?, ?, ?, ?, ?, ?, ?)');

        if (!$stmt->execute(array($id_noticia, $lugar, $nombre, $descripcion, $noticia, $fecha, $keyword))) {

            $stmt = null;
            header("location: ./Registro.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    } 

}