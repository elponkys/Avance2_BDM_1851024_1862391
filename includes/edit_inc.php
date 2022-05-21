<?php

include "../classes/edit-class.php";

if (isset($_POST["submit"])) {
  if (!empty($_FILES["imagen"]["name"])) {
    try {
      session_start();
      $id=$_SESSION['IdUsuario'];
      $nombre = $_POST["nombre"];
      $apellido_m = $_POST["apellido_m"];
      $apellido_p = $_POST["apellido_p"];
      $email = $_POST["email"];
      $contraseña = $_POST["contraseña"];
      $telefono = $_POST["telefono"];
      $fileName = basename($_FILES["imagen"]["name"]);
      $imageType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
      $allowedTypes = array('png', 'jpg', 'gif');
      
      echo("pepino"); 
      if (in_array($imageType, $allowedTypes)) {
        $imageName = $_FILES["imagen"]["tmp_name"];
        $base64Image = base64_encode(file_get_contents($imageName));
        $realImage = 'data:image/' . $imageType . ';base64,' . $base64Image;

        $edit = new editcon();
        
        echo($id); 
        
        echo($nombre); 
        
        $edit->edit($id,$nombre, $apellido_m, $apellido_p, $email, $contraseña, $telefono, $realImage);
      } else {
        exit();
      }
    } catch (Exception $error) {
      echo $error;
    }
  }
}
