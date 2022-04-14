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
            <form action="includes/register_reportero_inc.php" class="login" enctype="multipart/form-data" method="POST">
              <div class="field">
                <input type="text" placeholder="Nombre" name="nombre" required>
              </div>
              <div class="field">
                <input type="text" placeholder="Apellido paterno" name="apellido_m" required>
              </div>
              <div class="field">
                <input type="text" placeholder="Apellido materno" name="apellido_p" required>
              </div>
              <div class="field">
                <input type="text" placeholder="Telefono" name="telefono" required>
              </div>
              <div class="field">
                <input type="email" placeholder="Correo electronico" name="email" required>
              </div>
              <div class="field">
              
              <input type="password"  placeholder="Contraseña" id="psw" name="contraseña" pattern="(?=.*\d)(?=.*[?;:.,])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
              </div>
              <div class="field">
                <input type="password" placeholder="Confirmar_Contraseña" name="confirm" required>
              </div>
              <div class="field">
                <input type="file" placeholder="imagensita" name="imagen">
              </div>
              <div class="field btn">
                <div class="btn-layer"></div>
                <input type="submit" name="submit" value="Registrar">
              </div>
            </form>
          </div>
          
<div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>special character</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
        </div>
      </div>
      <script src="./java/loginsito.js"></script>
</div>
</body>