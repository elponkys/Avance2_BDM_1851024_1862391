<?php

session_start();

include "../classes/dbhclasses.php";
include "../classes/noticia-class.php";
include "../classes/asignacion-class.php";



  $id_usuario = $_SESSION['IdUsuario']; 
  $lugar =$_POST["Lugar"];
  $firma = $_SESSION['Nombre'+''+'Apellido_m'+''+'Apellido_p'];
  $nombre =$_POST["Titulo"];
  $descripcion =$_POST["Descripcion"];
  $noticia = $_POST['Noticia'];
  $telefono = $_SESSION['TELEFONO'];
  $fecha = $_POST['Fecha'];
  $keyword = $_POST['Keyword'];
  
  $reNoticia= new NoticiaContr($id_usuario,$lugar,$firma,$nombre,$descripcion,$noticia,$telefono,$fecha,$keyword);
  $reNoticia->registroNoticia();
  $Categorias = $_POST['Categorias'];
 $UltimaNoti=LastNoticia($id_usuario);
 AgregarCategorias($UltimaNoti,$Categorias);
 $Imagenes = $_POST['Imagenes'];
  echo json_encode(true);

    exit(); 
    function LastNoticia($id_usuario){
      $db = $this->connect();
      $stmt = $db->prepare('CALL sp_InsertUsuario(?)');
      if (!$stmt->execute(array($id_usuario))) {
    
          $stmt = null;
          header("location: ./Registro.php?error=stmtfailed");
          exit();
      }
      $UltimaNoticia=$stmt->fetchAll(PDO::FETCH_ASSOC);
      $stmt = null;
      return $UltimaNoticia; 
    }

    function AgregarCategorias($Noticia_id, $Categorias)
{

    foreach($Categorias as $Cat) {
       
  $reAsignacion= new AsignacionContr($Noticia_id,$Cat);
  $reAsignacion->registroasignacion();
    }
}

function AgregarMultimedia($Noticia_id, $Imagenes)
{

    foreach($Imagenes as $Img) {
       
  $reMultimedia= new MultimediaContr($Noticia_id,$Img);
  $reMultimedia->registromultimedia();
    }
}

?>