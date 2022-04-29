<!DOCTYPE html>
<?php

include "classes/VistaNoticia-class.php";

include "classes/Select_Noticia-class.php";


$reNoticia = new SNoticiaContr();

$Si = $reNoticia->fillNoticiasAceptadas();

$Si10= $reNoticia->fill10Noticias();

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carts</title>
    <link rel="stylesheet" href="css/inicio.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span>Mi perfil</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>Cerrar sesion</a></li>
            </ul>
        </div>
    </nav>
    <div class="main">
            <h2>Ultimas Noticias</h2>
           
                <?php

                foreach ($Si10 as $Noti10) {


                    $id10 = $Noti10['NOTICIA_ID'];
                    $reMiniatura10 = new VNoticiaContr($id10);
                    $Min10 = $reMiniatura10->fillminiatura();

                ?>
                <form action="VistaNoticia.php" class="login"  method="POST">
                <input type="hidden" name="ID" value="<?php echo $id; ?>"></input>
                    <div class="card noticard""><div class="image">
                    <img  src='<?php echo $Min10; ?>' />
                       
                    </div>
                    <div class=" title">
                        <h1><?php echo ($Noti10['TITULO']) ?></h1>
                    </div>
                    <div class="date">
                        <p>Fecha de la noticia:<?php echo ($Noti10['FECHA_PUBLICACION']) ?></p>
                    </div>
                    <div class="des">
                        <p><?php echo ($Noti10['DESCRIPCION']) ?></p><input type="submit" value="Leer mas..." name="submit"></input>
                    </div>
                    </form >
            
        </div>
    <?php
                }
    ?>

    </div>
        <!--cards -->
        <div class="main">
            <h2>Noticias subidas a la pagina</h2>
           
                <?php

                foreach ($Si as $Noti) {


                    $id = $Noti['NOTICIA_ID'];
                    $reMiniatura = new VNoticiaContr($id);
                    $Min = $reMiniatura->fillminiatura();

                ?>
                <form action="VistaNoticia.php" class="login"  method="POST">
                <input type="hidden" name="ID" value="<?php echo $id; ?>"></input>
                    <div class="card noticard""><div class="image">
                    <img  src='<?php echo $Min; ?>' />
                       
                    </div>
                    <div class=" title">
                        <h1><?php echo ($Noti['TITULO']) ?></h1>
                    </div>
                    <div class="date">
                        <p>Fecha de la noticia:<?php echo ($Noti['FECHA_PUBLICACION']) ?></p>
                    </div>
                    <div class="des">
                        <p><?php echo ($Noti['DESCRIPCION']) ?></p><input type="submit" value="Leer mas..." name="submit"></input>
                    </div>
                    </form >
            
        </div>
    <?php
                }
    ?>

    </div>
    </div>

</body>