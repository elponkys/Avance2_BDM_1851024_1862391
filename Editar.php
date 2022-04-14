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
    <div class="wrapper">
        <div class="form-container">
          <div class="form-inner">
            <form action="includes/edit_inc.php" class="login" enctype="multipart/form-data" method="POST">
              <h1>Editar Usuario</h1>
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
              <input type="password" value="<?php  echo $_SESSION['Contraseña'];?>" placeholder="Correo electronico" id="psw" name="contraseña" required>
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
      <script src="./java/loginsito.js"></script>
</body>