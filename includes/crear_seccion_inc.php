<?php

include "../classes/seccion-class.php";

if(isset($_POST["submit"])){
  $seccion =$_POST["categoria"];
  $orden =$_POST["orden"];
  $color =$_POST["color"];
  $usuario = $_SESSION['IdUsuario'];
  $reSeccion= new SeccionContr($seccion,$orden,$color,$usuario);
  $reSeccion->registroSeccion();


}

    exit(); 


?>