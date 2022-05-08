<?php

include_once "../classes/like-class.php";


$id = $_POST["ID"];
$iduser = $_POST["ID_usuario"];
$relike = new LikeContr($id, $iduser);
$Si = $relike->RevisarLike();
echo json_encode($Si);


exit();
