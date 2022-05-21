<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css" >
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="java/jquery-2.1.4.min.js"></script>
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
    <div class="wrapper">
        <div class="form-container">
          <div class="form-inner">
            <form action="includes/edit_inc.php" class="login" enctype="multipart/form-data" method="POST">
              <h1 style="text-align: center;">Editar Usuario</h1>
              <div class="field">
                <input type="text" value="<?php  session_start(); echo $_SESSION['Nombre'];?>" name="nombre" required>
              </div>
              <div class="field">
                <input type="text" value="<?php  echo $_SESSION['Apellido_m'];?>" name="apellido_m" required>
              </div>
              <div class="field">
                <input type="text"value="<?php echo $_SESSION['Apellido_p'];?>" name="apellido_p" required>
              </div>
              <div class="field">
                <input type="text" value="<?php echo $_SESSION['Telefono'];?>"  placeholder="Telefono" name="telefono" required>
              </div>
              <div class="field">
                <input type="email" value="<?php echo $_SESSION['Correo'];?>" placeholder="Correo electronico" name="email" required>
              </div>
              <div class="field">
              <input type="password" value="<?php  echo $_SESSION['Contraseña'];?>" placeholder="Contraseña" id="psw" name="contraseña" required>
              </div>
              <div class="field">
                <input type="file" placeholder="imagensita" name="imagen">
              </div>
              <div class="field btn">
                <div class="btn-layer"></div>
                <input type="submit" name="submit" value="Guardar cambios">
              </div>
            </form>
          </div>
          
        </div>
      </div>
</body>