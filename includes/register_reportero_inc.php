<?php

include "../classes/registro-reportero-class.php";

if(isset($_POST["submit"])){
  if(!empty($_FILES["imagen"]["name"])){
    try{
   
    $nombre = $_POST["nombre"];
    $apellido_m = $_POST["apellido_m"];
    $apellido_p = $_POST["apellido_p"];
     $email = $_POST["email"];
     $contraseña = $_POST["contraseña"];
    $confirm = $_POST["confirm"];
    $telefono = $_POST["telefono"];
    $fileName=basename($_FILES["imagen"]["name"]);
    $imageType=strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
    $allowedTypes = array('png','jpg','gif');
if(in_array($imageType, $allowedTypes)){
$imageName = $_FILES["imagen"]["tmp_name"];
$base64Image=base64_encode(file_get_contents($imageName));
$realImage = 'data:image/'.$imageType.';base64,'.$base64Image;
   
$register= new RegisterContr_reportero($nombre, $apellido_m, $apellido_p,$email, $contraseña,$telefono,$realImage,$confirm);
$register->registroUsuario();
  }else{
    exit();
  }

      

  }
  catch(Exception $error){
    echo $error; 
} 

  }
}

?>