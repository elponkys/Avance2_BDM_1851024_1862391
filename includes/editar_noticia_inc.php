<?php

session_start();


include_once "../classes/noticiaedit-class.php";
include_once "../classes/Select_rechazadas-class.php";
include_once "../classes/asignacion-class.php";
include_once "../classes/multimedia-class.php";

$id_noticia = $_POST["ID"];
$lugar = $_POST["Lugar"];
$nombre = $_POST["Titulo"];
$descripcion = $_POST["Descripcion"];
$noticia = $_POST['Noticia'];
$fecha = $_POST['Fecha'];
$keyword = $_POST['Keyword'];

$reNoticia = new NoticiaeditContr($id_noticia, $lugar, $nombre, $descripcion, $noticia, $fecha, $keyword);
$reNoticia->editNoticia();

$Categorias =  json_decode(stripslashes($_POST['Categorias']));
$reBorrarSecciones = new SNoticiare($id_noticia);
$reBorrarSecciones->deleteasignacion();
$reBorrarSecciones->deletemulti();
AgregarCategorias($id_noticia, $Categorias);
$conteo = count($_FILES["archivos"]["name"]);

echo $conteo;
for ($i = 0; $i < $conteo; $i++) {

  $fileName = basename($_FILES["archivos"]["name"][$i]);
  $imageType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
  $allowedTypesimg = array('png', 'jpg', 'gif');
  $allowedTypesvid = array('mp4');
  
  if (in_array($imageType, $allowedTypesimg)) {

    $imageName = $_FILES["archivos"]["tmp_name"][$i];
    $base64Image = base64_encode(file_get_contents($imageName));
    $realImage = 'data:image/' . $imageType . ';base64,' . $base64Image;
    AgregarMultimedia($id_noticia, $realImage);
  } else if (in_array($imageType, $allowedTypesvid)) {
    $imageName = $_FILES["archivos"]["tmp_name"][$i];
    $base64Image = base64_encode(file_get_contents($imageName));
    $realImage = 'data:video/' . $imageType . ';base64,' . $base64Image;
    AgregarMultimedia($id_noticia, $realImage);
  }
}

echo json_encode(true);

exit();



function AgregarCategorias($Noticia_id, $pCategorias)
{

  for ($i = 0; $i < count($pCategorias); $i++) {
    $reAsignacion = new AsignacionContr($Noticia_id, $pCategorias[$i]);

    $reAsignacion->registroasignacion();
  }

}


function AgregarMultimedia($Noticia_id, $Imagenes)
{



  $reMultimedia = new MultimediaContr($Noticia_id, $Imagenes);
  $reMultimedia->registroMultimedia();
}
