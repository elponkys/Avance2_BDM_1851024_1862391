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
          <li><a href="#" onclick="window.location.href='crearnoticia.php'" >Crear noticia</a></li>
          <li><a href="#">Mis noticias</a></li>

        <?php
        }

        ?>

        <?php
        if (isset($_SESSION["Tipo"]) && $_SESSION["Tipo"] == "Admin") {
        ?>
          <li><a onclick="window.location.href='categorias.php'"  href="#">Crear Categoria</a></li>
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
        <h2>Noticias subidas a la pagina</h2>
        <div class="cat-conteiner">   
            <div class="content">   
                <h4 class="text-black" style="text-align: center;">Descubre las diferencias entre el perejil y el cilandro</h4>
                <h5 class="text-black">Articulo hecho para diferenciar el cilandro y el perejil</h5>
                <strong>Noticia hecha por:Antonio Lopez</strong><br>
                <strong style="font-style: italic;">Fecha de la noticia:20/Enero/2022</strong>
                <strong class="datos">Estado de la noticia:En redacción</strong>
                <p class="datos">Desde años el ser humano ha confundido el cilandro por perejil y en este articulo...</p>
                <input type="button"id="btn_delete" value="Eliminar noticia"></input>
                <input type="button"id="btn_update" value="Subir noticia"></input>
                <input type="button"id="btn_update" value="Hacer comentario"></input>
                <input type="button"id="btn_update" value="Ver noticia"></input>
            </div>
            </div>


      </div>
      <script src="./java/notilist.js"></script>

</body>