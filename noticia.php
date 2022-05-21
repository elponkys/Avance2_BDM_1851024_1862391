<!DOCTYPE html>
<?php

include "classes/VistaNoticia-class.php";

include "classes/Select_Noticia-class.php";


$reNoticia = new SNoticiaContr();

$Si = $reNoticia->fillNoticiasAceptadas();

$Si10 = $reNoticia->fill10Noticias();

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
        <a class="navbar-brand" onclick="window.location.href='noticia.php'" href="#">Pitufinoticias</a>
      </div>
      <ul class="nav navbar-nav">
        <?php
        if (isset($_SESSION["Tipo"]) && $_SESSION["Tipo"] == "Reportero") {
        ?>
          <li><a href="#" onclick="window.location.href='crearnoticia.php'" >Crear noticia</a></li>
          <li><a href="#" onclick="window.location.href='notilista_pendientes.php'">Mis noticias</a></li>

        <?php
        }

        ?>

        <?php
        if (isset($_SESSION["Tipo"]) && $_SESSION["Tipo"] == "Admin") {
        ?>
          <li><a onclick="window.location.href='categorias.php'"  href="#">Crear Categoria</a></li>
          <li><a href="#" onclick="window.location.href='noticiaslist.php'">Administrar noticias</a></li>
          <li><a href="#"  onclick="window.location.href='Reportes.php'">Reporte de noticias</a></li>
          <li><a  onclick="window.location.href='Registro_reportero.php'" href="#">Agregar Reportero</a></li>

        <?php
        }

        ?>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a  onclick="window.location.href='perfil.php'"><span onclick="window.location.href='perfil.php'" class="glyphicon glyphicon-log-in"></span>Mi perfil</a></li>
        <li><a onclick="window.location.href='Registro.php'"><span onclick="window.location.href='Registro.php'" class="glyphicon glyphicon-log-in"></span>Cerrar sesion</a></li>
      </ul>
    </div>
  </nav>
    <form action="Busqueda.php" class="buscar" method="POST">
    <h1 style="color: #000000;">Titulo</h1>
    <div class="field">
        <input type="text" id="titulo"  name="titulo" >
    </div>
    <h1 style="color: #000000;">Palabra clave</h1>
    <div class="field">
        <input type="text" id="keyword"  name="keyword" >
    </div>
    <h1 style="color: #000000;">Durante este tiempo</h1>
    <input type="date" name="fecha1" class="form-control" id="fechaca1"><br>
    <input type="date" name="fecha2" class="form-control" id="fechaca2"><br>
 
    <input type="submit" class="btn btn_pub" id="btn_noti2" value="BUSCAR"></input>

    </form>
    
    <h2>Ultimas Noticias</h2>
    <div class="main">

        <?php

        foreach ($Si10 as $Noti10) {


            $id10 = $Noti10['NOTICIA_ID'];
            $reMiniatura10 = new VNoticiaContr($id10);
            $Min10 = $reMiniatura10->fillminiatura();

        ?>
            <form action="VistaNoticia.php" class="login" method="POST">
                <input type="hidden" name="ID" value="<?php echo $id10; ?>"></input>
                <div class="card noticard"><div class=" image">
                    <img src='<?php echo $Min10; ?>' />

                </div>
                <div class=" title">
                    <h1><?php echo ($Noti10['TITULO']) ?></h1>
                </div>
                <div class="date">
                    <p>Fecha de la noticia:<?php echo ($Noti10['FECHA_PUBLICACION']) ?></p>
                </div>
                <div class="des">
                    <p><?php echo ($Noti10['DESCRIPCION']) ?></p><input class="btn_noti" type="submit" value="Leer mas..." name="submit"></input>
                </div>
            </form>

    </div>
<?php
        }
?>

</div>
<!--cards -->
<h2>Noticias subidas a la pagina</h2>
<div class="main">
    

    <?php

    foreach ($Si as $Noti) {


        $id = $Noti['NOTICIA_ID'];
        $reMiniatura = new VNoticiaContr($id);
        $Min = $reMiniatura->fillminiatura();

    ?>
        <form action="VistaNoticia.php" class="login" method="POST" >
            <input type="hidden" name="ID" value="<?php echo $id; ?>"></input>
            <div class="card noticard"><div class=" image">
                <img src='<?php echo $Min; ?>' />

            </div>
            <div class=" title">
                <h1><?php echo ($Noti['TITULO']) ?></h1>
            </div>
            <div class="date">
                <p>Fecha de la noticia:<?php echo ($Noti['FECHA_PUBLICACION']) ?></p>
            </div>
            <div class="des">
                <p><?php echo ($Noti['DESCRIPCION']) ?></p><input type="submit" class="btn_noti"value="Leer mas..." name="submit"></input>
            </div>
        </form>

</div>
<?php
    }
?>

</div>
</div>
<script src="java/vista.js"></script>
</body>