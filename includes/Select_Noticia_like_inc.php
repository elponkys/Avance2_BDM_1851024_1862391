<?php

include_once "classes/VistaNoticia-class.php";
$id = $_POST["ID"];
$reNoticia = new VNoticiaContr($id);
$noti = $reNoticia->fillVNoticias();


echo json_encode($noti);


exit();