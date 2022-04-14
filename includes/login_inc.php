<?php

include "../classes/login-class.php";

if(isset($_POST["submit"])){
  $email =$_POST["email"];
  $contraseña =$_POST["contraseña"];
  $login= new LoginContr($email,$contraseña);
  $login->loginsito();


}

    exit(); 


?>