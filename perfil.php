<!DOCTYPE html>
<?php
session_start();

?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carts</title>
  <link rel="stylesheet" href="css/perfil.css">
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
  <div class="header">
    <?php
    if (isset($_SESSION["Imagen"])) {
      $image = $_SESSION["Imagen"];
    ?>
      <img width="200" height="200" src='<?php echo $image; ?>' />
    <?php
    }
    ?>
    <strong class="user"><?php echo $_SESSION["Nombre"];
                          echo $_SESSION["Apellido_m"];
                          echo $_SESSION["Apellido_p"]; ?></strong><br>
    <strong class="email"><?php echo $_SESSION["Correo"]   ?></strong>
    <a href="Editar.php" class="edit">Editar <i class="fas fa-edit"></i> </a>
    <a href="" class="btn">Eliminar cuenta <i class="fas fa-edit"></i> </a>
  </div>
</body>