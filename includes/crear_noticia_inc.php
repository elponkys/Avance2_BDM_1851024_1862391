<?php

session_start();


include_once "../classes/noticia-class.php";
include_once "../classes/asignacion-class.php";
include_once "../classes/multimedia-class.php";

$id_usuario = $_SESSION['IdUsuario'];
$lugar = $_POST["Lugar"];
$nombre = $_SESSION['Nombre'];
$apellido1 = $_SESSION['Apellido_m'];
$apellido2 = $_SESSION['Apellido_p'];
$firma = $nombre . " " . $apellido1 . " " . $apellido2;
$nombre = $_POST["Titulo"];
$descripcion = $_POST["Descripcion"];
$noticia = $_POST['Noticia'];
$telefono = $_SESSION['Telefono'];
$fecha = $_POST['Fecha'];
$keyword = $_POST['Keyword'];

$reNoticia = new NoticiaContr($id_usuario, $lugar, $firma, $nombre, $descripcion, $noticia, $telefono, $fecha, $keyword);
$reNoticia->registroNoticia();

$Categorias =  json_decode(stripslashes($_POST['Categorias']));

$UltimaNoti = $reNoticia->UltimaNoticia();

AgregarCategorias($UltimaNoti, $Categorias);

$Imagenes = $_FILES['Imagenes']['tmp_name'];
$imagenesArray = range(1, count($Imagenes), 1);
    for ($i = 0; $i < count($Imagenes); $i++) {
        $imagenesArray[$i] = addslashes(file_get_contents($Imagenes[$i]));
        
    }
    AgregarMultimedia($UltimaNoti, $imagenesArray);

//foreach ($Imagenes as $Imgsita) {
  //$fileName = basename($_FILES["Imagenes[" . $Imgsita . "]"]["name"]);
  //$imageType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
  //$allowedTypes = array('png', 'jpg', 'gif', 'mp4', 'AVI');
  //if (in_array($imageType, $allowedTypes)) {
    //$imageName = $_FILES["Imagenes[" . $Imgsita . "]"]["tmp_name"];
    //$base64Image = base64_encode(file_get_contents($imageName));
    //$realImage = 'data:image/' . $imageType .
      //';base64,' . $base64Image;
    //AgregarMultimedia($UltimaNoti, $realImage);
 // }
//}
echo json_encode(true);

exit();



function AgregarCategorias($Noticia_id, $pCategorias)
{

  for ($i = 0; $i < count($pCategorias); $i++) {
    $reAsignacion = new AsignacionContr($Noticia_id, $pCategorias[$i]);
  
    $reAsignacion->registroasignacion();
  }


  // foreach($Categorias as $Cat) {

  // $reAsignacion = new AsignacionContr($Noticia_id, $Cat);
  //$reAsignacion -> registroasignacion();
  //}
}

function AgregarMultimedia($Noticia_id, $Imagenes)
{

 
  for ($i = 0; $i < count($Imagenes); $i++) {
    $reMultimedia = new MultimediaContr($Noticia_id, $Imagenes[$i]);
    $reMultimedia->registroMultimedia();
  }
}
