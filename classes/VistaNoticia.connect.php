<?php

include_once "dbhclasses.php";
class VNoticia extends Dbh
{
   
    protected function fill_Vnoticia($id)
    {  
        
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_SelectNoticia(?);');
        
        if (!$stmt->execute(array($id))) {

            $stmt = null;
            header("location: ../Registro.php?error=stmtfailed");
            exit();
        }
        
        if($stmt->rowCount() == 0){
         $stmt = null;
         header("location: ../Registro.php?error=nohaynoticiaaaaas");
         exit();
        }
        
        $Noticia=$stmt->fetchAll(PDO::FETCH_ASSOC);
       

        $stmt = null;
      return $Noticia;  
        
    }

    protected function fill_Vcomentarios($id)
    {  
        
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_SelectComentarios(?);');
        
        if (!$stmt->execute(array($id))) {

            $stmt = null;
            header("location: ../Registro.php?error=stmtfailed");
            exit();
        }
        
  
        
        $Comentarios=$stmt->fetchAll(PDO::FETCH_ASSOC);
       

        $stmt = null;
      return $Comentarios;  
        
    }

    protected function fill_VRespuestas($id)
    {  
        
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_SelectRespuestas(?);');
        
        if (!$stmt->execute(array($id))) {

            $stmt = null;
            
            exit();
        }
        
        
        $Respuestas=$stmt->fetchAll(PDO::FETCH_ASSOC);
       

        $stmt = null;
      return $Respuestas;  
        
    }

    protected function fill_Vsecciones($id)
    {  
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_SelectSeccionesbynoticia(?);');
        
        if (!$stmt->execute(array($id))) {

            $stmt = null;
            header("location: ../Registro.php?error=stmtfailed");
            exit();
        }
        
        if($stmt->rowCount() == 0){
         $stmt = null;
         header("location: ../Registro.php?error=nohaysecciones");
         exit();
        }
        
        $Secciones=$stmt->fetchAll(PDO::FETCH_ASSOC);
        

        $stmt = null;
      return $Secciones;  
        
    }

    protected function fill_Vmultimedia($id)
    {  
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_SelectMultimediabynoticia(?);');
        
        if (!$stmt->execute(array($id))) {

            $stmt = null;
            header("location: ../Registro.php?error=stmtfailed");
            exit();
        }
        
        if($stmt->rowCount() == 0){
         $stmt = null;
         header("location: ../Registro.php?error=nohayimageness");
         exit();
        }
        
        $Multimedia=$stmt->fetchAll(PDO::FETCH_ASSOC);
        

        $stmt = null;
      return $Multimedia;  
        
    }

    protected function fill_miniatura($id)
    {  
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_SelectMiniatura(?);');
        
        if (!$stmt->execute(array($id))) {

            $stmt = null;
            header("location: ../Registro.php?error=stmtfailed");
            exit();
        }
        
        if($stmt->rowCount() == 0){
         $stmt = null;
        
         exit();
        }
        
        $Miniaturas=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $Miniatura= $Miniaturas[0]["ARCHIVO"];
        

        $stmt = null;
      return $Miniatura;  
        
    }
    
    protected function subir_Vnoticia($id)
    {  
        
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_AceptarNoticia(?);');
        
        if (!$stmt->execute(array($id))) {

            $stmt = null;
            header("location: ../Registro.php?error=stmtfailed");
            exit();
        }
        
        if($stmt->rowCount() == 0){
         $stmt = null;
         header("location: ../Registro.php?error=nohaynoticiaaaaas");
         exit();
        }
        
      

        $stmt = null;
   
        
    }

    protected function regresar_Vnoticia($id)
    {  
        
        $db = $this->connect();
        $stmt = $db->prepare('CALL sp_RegresarNoticia(?);');
        
        if (!$stmt->execute(array($id))) {

            $stmt = null;
            header("location: ../Registro.php?error=stmtfailed");
            exit();
        }
        
        if($stmt->rowCount() == 0){
         $stmt = null;
         header("location: ../Registro.php?error=nohaynoticiaaaaas");
         exit();
        }
        
      

        $stmt = null;
   
        
    }
}
?>