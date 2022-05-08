<?php

include_once "../classes/Select_rechazadas-class.php";
session_start();
$id = $_POST['IdUsuario'];
$relike = new LikeContr($id, $iduser);
$Si = $relike->SumarLike();

echo json_encode($Si);


exit();
