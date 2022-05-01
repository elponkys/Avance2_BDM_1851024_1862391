<!DOCTYPE html>
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

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carts</title>
    <link rel="stylesheet" href="css/crearnoticia.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="java/jquery-2.1.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
                    <li><a href="#">Crear noticia</a></li>
                    <li><a href="#">Mis noticias</a></li>

                <?php
                }

                ?>

                <?php
                if (isset($_SESSION["Tipo"]) && $_SESSION["Tipo"] == "Admin") {
                ?>
                    <li><a href="#">Crear Categoria</a></li>
                    <li><a href="#">Administrar noticias</a></li>
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
    <div class="container">
        <div id="newnoti">
            <div class="form-group text">
                <h1 class="text-black">Nueva noticia</h1>
            </div>
            <div class="form-group">
                <h4 class="text-black">Nombre</h4>
                <input type="text" value=" <?php echo $noti[0]["TITULO"]; ?>" name="nombre" class="form-control" id="nom_noti">
                <input type="hidden" value=" <?php echo $id; ?>" name="nombre" class="form-control" id="id_noti">
                <h4 class="text-black">Descripción de la noticia</h4>
                <input type="text" value="<?php

                                            echo $noti[0]["DESCRIPCION"];

                                            ?>" name="descripcion" class="form-control" id="desc_noti">
                <h4 class="text-black">Lugar</h4>
                <input type="text" value="<?php

                                            echo $noti[0]["LUGAR"];

                                            ?>" name="lugar" class="form-control" id="lugar_noti">
                <h4 class="text-black">Fecha del acontecimiento</h4>
                <input type="date" value="<?php
                                            $fechita = substr($noti[0]["FECHA_ACONTECIMIENTO"], 0, -9);
                                            echo $fechita;

                                            ?>" name="fecha" class="form-control" id="fecha_noti">
                <h4 class="text-black">Noticia</h4>
                <textarea class="form-control" value="<?php

                                                        echo $noti[0]["TEXTO"];

                                                        ?>" name="noticia" id="noti"><?php

                                echo $noti[0]["TEXTO"];

                                ?></textarea>
                <h4 class="text-black">Palabra clave</h4>
                <input type="text" name="keyword" value="<?php

                                                            echo $noti[0]["KEYWORD"];

                                                            ?>" class="form-control" id="keyword_noti">
                <h4 class="text-black">Categoria</h4>
                <select class="form-control" name="categoria" id="cat_noti">


                </select>
                <div class="cat-conteiner">
                </div>
            </div>
            <div class="container2">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Inserte elementos multimedia</label>
                    <input class="form-control" type="file" multiple id="formFile">
                </div>
                <input type="submit" class="btn btn_pub" id="btn_noti" value="Publicar"></input>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="java/edit.js"></script>
</body>