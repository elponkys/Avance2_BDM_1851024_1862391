<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carts</title>
    <link rel="stylesheet" href="css/categoria.css"> 
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
          <li><a  onclick="window.location.href='Registro_reportero.php'" href="#">Agregar Reportero</a></li>

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
      <div class="main">     
        <h2>Nuevas categorias</h2>
        <!--cards -->
        <form action="includes/crear_seccion_inc.php" enctype="multipart/form-data" method="POST" id="crearseccion">
            <div class="card cat">   
                <h4 class="text-black">Categoria</h4>
                <input type="text" name="categoria" class = "form-control" id="cate">
                <h4 class="text-black">Numero de orden</h4>
                <input type="text" name="orden" class = "form-control" id="orden">
                <label for="exampleColorInput" class="form-label">Color picker</label>
                <input type="color" name="color" class="form-control form-control-color" id="exampleColorInput" value="#563d7c" title="Color">
                <input type="submit"id="btn_secc" value="Crear categoria"></input>
            </div>
      </form>
      </div>
<script src="java/inicionoseccion.js"></script>
       

</body>