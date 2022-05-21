<?php

include "classes/VistaNoticia-class.php";


try {
  if (isset($_GET["ID"])) {
    $id = $_GET["ID"];
  } else {
    $id = $_POST["ID"];
  }
  session_start();



  $reNoticia = new VNoticiaContr($id);
  $noti = $reNoticia->fillVNoticias();
  $likesnum = $noti[0]["LIKES"];
  $sec = $reNoticia->fillVsecciones();
  $mult = $reNoticia->fillVmultimedia();
  $comments = $reNoticia->fillVcomentarios();
} catch (Exception $error) {
  echo $error;
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
        <a class="navbar-brand" onclick="window.location.href='noticia.php'" href="#">Pitufinoticias</a>
      </div>
      <ul class="nav navbar-nav">
        <?php
        if (isset($_SESSION["Tipo"]) && $_SESSION["Tipo"] == "Reportero") {
        ?>
          <li><a href="#" onclick="window.location.href='crearnoticia.php'">Crear noticia</a></li>
          <li><a href="#" onclick="window.location.href='notilista_pendientes.php'">Mis noticias</a></li>

        <?php
        }

        ?>

        <?php
        if (isset($_SESSION["Tipo"]) && $_SESSION["Tipo"] == "Admin") {
        ?>
          <li><a onclick="window.location.href='categorias.php'" href="#">Crear Categoria</a></li>
          <li><a href="#" onclick="window.location.href='noticiaslist.php'">Administrar noticias</a></li>
          <li><a href="#" onclick="window.location.href='Reportes.php'">Reporte de noticias</a></li>
          <li><a onclick="window.location.href='Registro_reportero.php'" href="#">Agregar Reportero</a></li>

        <?php
        }

        ?>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a onclick="window.location.href='perfil.php'"><span onclick="window.location.href='perfil.php'" class="glyphicon glyphicon-log-in"></span>Mi perfil</a></li>
        <li><a onclick="window.location.href='Registro.php'"><span onclick="window.location.href='Registro.php'" class="glyphicon glyphicon-log-in"></span>Cerrar sesion</a></li>
      </ul>
    </div>
  </nav>
  <section id="iniciop">
    <section id="publicaciones">
      <article class="post">
        <h1  style="color:#113258;"class="titulo">


          <?php

          echo $noti[0]["TITULO"];

          ?>
        </h1>
        
        <strong style="color: black;"class="datos">Descripción:</strong>
        <h4 class="descripcion" style="text-align: center;"> <?php

                                                              echo $noti[0]["DESCRIPCION"];

                                                              ?></h4>
        <p class="pregunta-texto">
          <strong style="color: black;"class="datos">Noticia hecha por:</strong>
          <span class="datos"><?php

                              echo $noti[0]["FIRMA"];

                              ?></span><br>
          <strong style="color: black;" class="datos">Fecha de la noticia:</strong>
          <span class="datos"><?php

                              echo $noti[0]["FECHA_ACONTECIMIENTO"];

                              ?></span><br>
          <strong style="color: black;" class="datos">Publicado:</strong>
          <span class="datos"><?php

                              echo $noti[0]["FECHA_PUBLICACION"];

                              ?></span><br>
          <strong style="color: black;" class="datos">Lugar de lo sucedido:</strong>
          <span class="datos"><?php

                              echo $noti[0]["LUGAR"];

                              ?></span><br>
          <strong style="color: black;" class="datos">Categorias</strong> <?php


                                      for ($i = 0; $i < count($sec); $i++) {

                                      ?>
            <span class="datos"> <?php
                                        echo $sec[$i]["DESCRIPCION"];
                                  ?> </span>
          <?php
                                      }
          ?>
          <br><span class="datos"></span><br>
          <strong  style="color: black;" class="datos">Palabras claves</strong> <span class="datos"><?php

                                                                echo $noti[0]["KEYWORD"];

                                                                ?></span><br>

        </p>
        <p class="noti-texto">
          <?php

          echo $noti[0]["TEXTO"];

          ?>
        </p>
        <div style="margin: 10px;">
        <?php
        $allowedTypesimg = array('png', 'jpg', 'gif');
        $allowedTypesvid = array('mp4');

        for ($i = 0; $i < count($mult); $i++) {
          $posicion_coincidencia = strpos(strval($mult[$i]["ARCHIVO"]), "image/png");

          $posicion_coincidencia2 = strpos(strval($mult[$i]["ARCHIVO"]), "image/jpg");

          $posicion_coincidencia3 = strpos(strval($mult[$i]["ARCHIVO"]), "image/gif");


          if ($posicion_coincidencia === 5 || $posicion_coincidencia2 === 5 || $posicion_coincidencia3 === 5) {
        ?>
            <img width="270" height="200" src='<?php echo $mult[$i]["ARCHIVO"]; ?>'></img>
          <?php
          } else { ?>
            <video width="270" controls height="200" src='<?php echo $mult[$i]["ARCHIVO"]; ?>'></video>
        <?php
          }
        }
        ?><br>
        </div>
        <script>
          function accion($ide) {
            var idesita = $ide;
            console.log(idesita);
            $.ajax({

              url: "includes/Borrar_comentario_inc.php",
              type: "POST",
              data: {
                "ID": idesita
              },
              success: function(msg) {
                console.log(msg);

              },

            });
          }

          function like($ide, $ideu) {
            var idesita = $ide;
            var idesota = $ideu;
            var likecheck = "false";
            $.ajax({

              url: "includes/Revisar-like_inc.php",
              type: "POST",
              data: {
                "ID": idesita,
                "ID_usuario": idesota
              },
              success: function(msg) {
                console.log(msg);
                likecheck = msg;
                if (likecheck === "true") {
                  $.ajax({

                    url: "includes/Sumar_like_inc.php",
                    type: "POST",
                    data: {
                      "ID": idesita,
                      "ID_usuario": idesota
                    },
                    success: function(msg) {
                      var NoticiasNA = $.parseJSON(msg);

                      $("#input1").change().val(NoticiasNA[0]['LIKES']);
                    },

                  });
                } else {
                  $.ajax({

                    url: "includes/Restar_like_inc.php",
                    type: "POST",
                    data: {
                      "ID": idesita,
                      "ID_usuario": idesota
                    },
                    success: function(msg) {
                      console.log(msg);
                      var NoticiasNA = $.parseJSON(msg);

                      $("#input1").change().val(NoticiasNA[0]['LIKES']);

                    },

                  });
                }
              },

            });



          }
        </script>
        <?php if (isset($_SESSION["Tipo"])) {     ?>
          <div class="cont" >
            <button id="likebtn" onClick=" like(<?php echo $noti[0]["NOTICIA_ID"] ?>,<?php echo $_SESSION["IdUsuario"] ?>);">
              <box-icon type='solid' id="valorsito" value="<?php echo $noti[0]["NOTICIA_ID"] ?>" name='heart'></box-icon>
            </button>
            <input type="number" id="input1" value="<?php echo $likesnum  ?>" name="" class="btn_num" tabindex="-1">
            <script type="text/javascript">
            function shareFB() {
              var score=$("#txtScore").val();
              shareScore (score);
            }
            </script>
            <div class="compartir">
            <input id="txtScore" type="number" name="" placeholder="Escribe la puntuacion">
              <button style="color:blue"onclick="shareFB();">Compartir en Facebook</button>
            </div>
            <form action="includes/Crear_comentario_inc.php" class="login" method="POST" style="margin: 10px;">
              <input type=hidden name="usuario_noti" placeholder="" value=" <?php echo $_SESSION["IdUsuario"] ?>" class="incoment">
              <input type=hidden name="noti_noti" placeholder="" value=" <?php echo $id ?>" class="incoment">
              <input type=text name="comentario" placeholder="Comentar" class="incoment">
              
              <input type="submit" name="submit  href="" id=" btn-comment" class="comentarios" style=" border: none;background-color: #88FA7C; width: 100px; font-weight: bold;">  </input>
            </form>
          <?php
        }
          ?>
          </div>
          <?php

          for ($i = 0; $i < count($comments); $i++) {
            $reRespuestas = new VNoticiaContr($comments[$i]["COMENTARIO_ID"]);
            $respuestas = $reRespuestas->fillVRespuestas();
          ?>

            <div class="container_comentarios">
              <form action="includes/Crear_respuesta_inc.php" class="login" method="POST">
                <div class="coment" >
                  <div class="user">
                    <strong><?php echo $comments[$i]["NOMBRE"] ?></strong>
                    <img width="100" height="100" src='<?php echo $comments[$i]["IMAGEN"] ?>' />
                  </div>
                  <div class="contenido">
                    <strong><?php echo $comments[$i]["CREATION_DATE"] ?></strong>
                    <p class="pregunta-texto"><?php echo $comments[$i]["COMENTARIO_TEXT"] ?> </p>
                  </div>
                </div>
                <input type=hidden name="COMENTARIO_ID" placeholder="" value=" <?php echo $comments[$i]["COMENTARIO_ID"] ?>" class="incoment">
                <input type=hidden name="NOTICIA_ID" placeholder="" value=" <?php echo $id ?>" class="incoment">
                <?php $comentarioid = $comments[$i]["COMENTARIO_ID"]; ?>
                <?php if ($_SESSION["Tipo"] == "Admin" || $_SESSION["IdUsuario"] == $noti[0]["USUARIO_ID"]) {     ?>
                  <button type="button" class="deletec" onClick=" accion(<?php echo $comments[$i]["COMENTARIO_ID"] ?>);$(this).parent().remove();">X</button>
                <?php }   ?>
                <?php
                for ($u = 0; $u < count($respuestas); $u++) {  ?>
               <div>
               <div class="answer">
                    <div class="user">
                      <strong><?php echo $respuestas[$u]["NOMBRE"] ?></strong>
                      <img width="100" height="100" src='<?php echo $respuestas[$u]["IMAGEN"] ?>' />
                    </div>
                    <div class="contenido">
                      <strong><?php echo $respuestas[$u]["CREATION_DATE"] ?></strong>
                      <p class="pregunta-texto"><?php echo $respuestas[$u]["COMENTARIO_TEXT"] ?> </p>
                    </div>
                  </div>
                  <?php if ($_SESSION["Tipo"] == "Admin" || $_SESSION["IdUsuario"] == $noti[0]["USUARIO_ID"]) {     ?>
                    <button type="button" class="deletec" onClick=" accion(<?php echo $respuestas[$u]["COMENTARIO_ID"] ?>);$(this).parent().remove();">X</button>
                  <?php
                  }
                  ?>
                <?php
              
               
                }
                ?>
                 </div>
                <?php if (isset($_SESSION["Tipo"])) {     ?>
                  <input type=text name="respuesta" placeholder="Responder..." class="incoment">
                  <input type="submit" name="submit" style=" border: none; border-radius: 5px;background-color: #88FA7C; width: 100px; height: 30px;font-weight: bold;"value="Enviar">
                <?php
                }
                ?>
              </form>
            </div>

          <?php
          }
          ?>
          </div>


      </article>
    </section>
  </section>
  <script src="./java/vista.js"></script>
</body>