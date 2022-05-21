<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carts</title>
    <link rel="stylesheet" href="css/notilist.css">
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
    <div class="main">
      
    <h1>Reporte de noticias</h1>
    <h2>Reporte de noticias por categoria y fecha</h2>
    <h4 class="text-black">Durante estas fechas</h4>
        <input type="date" name="fecha" class="form-control" id="fecha_noti1">
        <input type="date" name="fecha" class="form-control" id="fecha_noti2">
        <h4 class="text-black">Categoria</h4>
        <select class="form-control" name="categoria" id="cat_noti">
            <input type="submit" class="btn btn_pub" id="btn_noti" value="BUSCAR"></input>
            <div class="main">
                <div class="cat-conteiner" id="catconteiner">

                </div>


            </div>
    </div>
    <div class="main">
    <h2>Reporte de noticias por fecha</h2>
    <h4 class="text-black">Durante este tiempo</h4>
        <input type="date" name="fecha" class="form-control" id="fechacat_noti1">
        <input type="date" name="fecha" class="form-control" id="fechacat_noti2">
            <input type="submit" class="btn btn_pub" id="btn_noti2" value="BUSCAR"></input>
            <div class="main">
                <div class="cat-conteiner" id="catsito-conteiner">

                </div>


            </div>
    </div>
    <script src="java/notilistreportes.js"></script>

</body>