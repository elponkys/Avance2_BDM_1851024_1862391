<!DOCTYPE html>
<?php
include "classes/VistaNoticia-class.php";
include_once "classes/Buscar-3filtros-class.php";
include_once "classes/Reportesec-class.php";
include_once "classes/Reporte-class.php";
include_once "classes/Select_rechazadas-class.php";
include "classes/Select_Noticia-class.php";


 
    if ($_POST["titulo"]!=null && $_POST["keyword"]!= null && $_POST["fecha1"]!=null && $_POST["fecha2"]!=null) {
        $titulo = $_POST["titulo"];
        $keyword = $_POST["keyword"];
        $fecha1 = $_POST["fecha1"];
        $fecha2 = $_POST["fecha2"];
          $reBusqueda= new BusquedaContr($titulo,$keyword,$fecha1,$fecha2);
        
          $Si= $reBusqueda->getbusqueda();
          

    
    
    }else{ if($_POST["titulo"]!=null && $_POST["keyword"]!=null){
        $titulo = $_POST["titulo"];
        $keyword = $_POST["keyword"];

    
          $reBusqueda= new ReportesecContr($titulo,$keyword);
        
          $Si= $reBusqueda->getbusqueda();
          

    
    }else{if($_POST["titulo"]!=null && $_POST["fecha1"]!=null && $_POST["fecha2"]!=null){
    
        $titulo = $_POST["titulo"];
        $fecha1 = $_POST["fecha1"];
        $fecha2 = $_POST["fecha2"];
     
    
          $reBusqueda= new ReporteContr($titulo,$fecha1,$fecha2);
        
          $Si= $reBusqueda->getbusqueda();
          echo($Si[0]["TITULO"]);
    
    }else{if($_POST["keyword"]!=null && $_POST["fecha1"]!=null && $_POST["fecha2"]!=null){
        $keyword = $_POST["keyword"];
        $fecha1 = $_POST["fecha1"];
        $fecha2 = $_POST["fecha2"];
    
          $reBusqueda= new ReporteContr($keyword,$fecha1,$fecha2);
        
          $Si= $reBusqueda->getbusquedakw();

    
    
    }else{if($_POST["keyword"]!=null){
    
        $keyword = $_POST["keyword"];
      
    
          $reBusqueda= new SNoticiare($keyword);
        
          $Si= $reBusqueda->getbusqueda();
          

    
        
    }else{if($_POST["fecha1"]!=null && $_POST["fecha2"]!=null){
    
    
        $fecha1 = $_POST["fecha1"];
        $fecha2 = $_POST["fecha2"];
    
    
          $reBusqueda= new ReportesecContr($fecha1,$fecha2);
        
          $Si= $reBusqueda->getbusquedaporfecha();
          

    
    }else{if($_POST["titulo"]!=null){
        $titulo = $_POST["titulo"];
      
    
          $reBusqueda= new SNoticiare($titulo);
        
          $Si= $reBusqueda->getbusquedat();

    
    }
    
    }
    
    
    }
    
    
    }
    
    
    }
    
    }
    }

  session_start();




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

<!--cards -->
<div class="main">
    <h2>Resultados de la busqueda</h2>

    <?php
echo($Si[0]["TITULO"]);
    foreach ($Si as $Noti) {


        $id = $Noti['NOTICIA_ID'];
        echo($id);
        $reMiniatura = new VNoticiaContr($id);
        echo($id);
        $Min = $reMiniatura->fillminiatura();
        echo($id);

    ?>
        <form action="VistaNoticia.php" class="login" method="POST">
            <input type="hidden" name="ID" value="<?php echo $id; ?>"></input>
            <div class="card noticard""><div class=" image">
                <img src='<?php echo $Min; ?>' />

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
        </form>

</div>
<?php
    }
?>

</div>
</div>
<script src="java/vista.js"></script>
</body>