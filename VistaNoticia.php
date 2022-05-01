<?php

include "classes/VistaNoticia-class.php";

if (isset($_POST["submit"])) {

  try {

    $id = $_POST["ID"];
    $reNoticia = new VNoticiaContr($id);
    $noti = $reNoticia->fillVNoticias();
    $sec = $reNoticia->fillVsecciones();
    $mult = $reNoticia->fillVmultimedia();
  } catch (Exception $error) {
    echo $error;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagina principal</title>
  <link rel="stylesheet" href="css/noticia.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/boxicons@2.1.1/dist/boxicons.js"></script>
</head>

<body>
  <nav class="navbar navbar-light" style="background-color: #000000;">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Pitufinoticias</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Inicio</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Secciones
            <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Deportes</a></li>
            <li><a href="#">Salud</a></li>
            <li><a href="#">Titulares</a></li>
          </ul>
        </li>
        <li><a href="#">Buscar</a></li>

        <?php
        if (isset($_SESSION["Tipo"]) && $_SESSION["Tipo"] == "Reportero") {
        ?>
          <li><a href="#" onclick="window.location.href='crearnoticia.php'">Crear noticia</a></li>
          <li><a href="#">Mis noticias</a></li>

        <?php
        }

        ?>

        <?php

        if (isset($_SESSION["Tipo"]) && $_SESSION["Tipo"] == "Admin") {
        ?>
          <li><a onclick="window.location.href='categorias.php'" href="#">Crear Categoria</a></li>
          <li><a href="#" onclick="window.location.href='noticiaslist.php'">Administrar noticias</a></li>
          <li><a href="#">Administrar usuarios</a></li>
          <li><a href="#">Reporte de noticias</a></li>
          <li><a onclick="window.location.href='Registro_reportero.php'" href="#">Agregar Reportero</a></li>

        <?php
        }

        ?>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>Mi perfil</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>Cerrar sesion</a></li>
      </ul>
    </div>
  </nav>
  <section id="iniciop">
    <section id="publicaciones">
      <article class="post">
        <h2 class="titulo">
          <?php

          echo $noti[0]["TITULO"];

          ?>
        </h2>
        <h4 class="descripcion" style="text-align: center;"> <?php

                                                              echo $noti[0]["DESCRIPCION"];

                                                              ?></h4>
        <p class="pregunta-texto">
          <strong>Noticia hecha por:</strong>
          <span class="datos"><?php

                              echo $noti[0]["FIRMA"];

                              ?></span><br>
          <strong>Fecha de la noticia:</strong>
          <span class="datos"><?php

                              echo $noti[0]["FECHA_ACONTECIMIENTO"];

                              ?></span><br>
          <strong>Publicado:</strong>
          <span class="datos"><?php

                              echo $noti[0]["FECHA_PUBLICACION"];

                              ?></span><br>
          <strong>Lugar de lo sucedido:</strong>
          <span class="datos"><?php

                              echo $noti[0]["LUGAR"];

                              ?></span><br>
          <strong>Categorias</strong> <?php


                                      for ($i = 0; $i < count($sec); $i++) {

                                      ?>
            <span class="datos"> <?php
                                        echo $sec[$i]["DESCRIPCION"];
                                  ?> </span>
          <?php
                                      }
          ?>
          <br><span class="datos"></span><br>
          <strong>Palabras claves</strong> <span class="datos"><?php

                                                                echo $noti[0]["KEYWORD"];

                                                                ?></span><br>

        </p>
        <?php
        $allowedTypesimg = array('png', 'jpg', 'gif');
        $allowedTypesvid = array('mp4');

        for ($i = 0; $i < count($mult); $i++) {
          $posicion_coincidencia = strpos(strval($mult[$i]["ARCHIVO"]), "image/png");

          $posicion_coincidencia2 = strpos(strval($mult[$i]["ARCHIVO"]), "image/jpg");

          $posicion_coincidencia3 = strpos(strval($mult[$i]["ARCHIVO"]), "image/gif");

          if ($posicion_coincidencia === 5 || $posicion_coincidencia2 === 5 || $posicion_coincidencia3 === 5) {
        ?>
            <img width="200" height="200" src='<?php echo $mult[$i]["ARCHIVO"]; ?>' ></img>
          <?php
          } else { ?>
            <video width="200" controls height="200" src='<?php echo $mult[$i]["ARCHIVO"]; ?>' ></video>
        <?php
          }
        }
        ?>
        <p class="pregunta-texto">
          <?php

          echo $noti[0]["TEXTO"];

          ?>
        <div class="cont">
          <button id="likebtn">
            <box-icon type='solid' name='heart'></box-icon>
          </button>
          <input type="number" id=input1 value="0" name="" class="btn_num" tabindex="-1">

          <a href="" class="comentarios"> Comentar </a>
          <input type=text placeholder="" class="incoment">
        </div>

        <div class="container">

        </div>

        </p>
      </article>
    </section>
  </section>
</body>