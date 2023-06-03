<html lang="es">
<head>
    <title> Listado de peludines</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="estilos.css">
   <script src="script.js"></script>

    <style type="text/css">
    
    body {
        text-align: center;
        background: linear-gradient(#2b2b36,80%, rgb(68, 1, 77));
        position: relative;
    }

    form{
        margin-top: 30px;
        color: white;
        font-weight:bold;
        text-shadow: 4px 4px 4px black;
        font-size: 23px;
        
    }
    
    div{
        color:red;
        text-shadow: 4px 4px 4px black;
        font-size:20px;
    }

    input[type=text] {
        padding: 7px 10px;
        margin: 20px 10;
        box-sizing: border-box;
        box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.15);
        font-size: 110%;
        width: 50%;
        height: 40px;
        text-align:center;
        border-radius: 15px;

    }

    input[type=password] {
        padding: 7px 10px;
        margin: 20px 10;
        box-sizing: border-box;
        box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.15);
        font-size: 110%;
        width: 100%;
        height: 40px;
        text-align:center;
        border-radius: 15px;

    }

    input[type=submit]{
        margin-top:30px;
        width: 12%;
        height: 40px;
        font-size: 105%;
        background-color: #4B0082;
        color: white;
        box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.15);
        border-style:solid;
        border-color: black;
        border-radius: 5px;
        font-weight:bold;
        margin-bottom:50px;
    }

    footer{
        font-size: 105%;
        text-align: center;
        font-weight:bold;
        text-shadow: 4px 4px 4px black;
        color: white;
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 40px;
    }

    h1{
        text-align:center;
        color: #f4c02b;
        text-shadow: 4px 4px 4px black;
        margin-top:100px;
        font-size:60px;
    }

    a{
        font-size:20px;
        color: yellow;
        text-shadow: 4px 4px 4px black;

    }
    
    #view{
        color:white;
        width:100%;
        position:relative;
    }
    
    .view-container {
        margin-bottom: 20px;
    }

    </style>
</head>

<header>
<nav>
    <ul class="menu">
        <li><a href="index.php">Inicio</a></li>
        <li><a href="configs.php">Configuraciones</a></li>
        <li><a href="crosshair/index.php">Crosshair</a></li>
        <li class="dropdown">
        <a href="armas.php">Armas</a>
        <ul class="submenu">
        <?php
                  $conn = new mysqli("localhost", "javi", "Proyecto_2023", "csconf");
                  if ($conn->connect_error) {
                     die("Error: " . $conn->connect_error);
                  }
            // Consulta para obtener las armas

                  $sql = "SELECT * FROM armas";
                  $resultado = $conn->query($sql);

                  // Recorrer los resultados y mostrar en la tabla
                  while ($fila = $resultado->fetch_assoc()) {
                     echo '<li><a href="arma.php?id=' . $fila['id'] . '"">'.$fila['nombre'].'</a>';
                  }
               ?>
        </ul>
        </li>
        <li>
            <?php 
            session_start();

            if (empty($_SESSION['usuario'])) {
              echo '<a href="login.php">Login</a>';
          } else {
              echo '
              <li class="dropdown"><a href="lista_configs.php">' . $_SESSION["usuario"] . '</a>
                  <ul class="submenu">
                      <li><a href=';
          
              $conn = new mysqli("localhost", "javi", "Proyecto_2023", "csconf");
          
              if ($conn->connect_error) {
                  die("Error: " . $conn->connect_error);
              }
          
              $sql = 'SELECT * FROM users where  id=' . $_SESSION["id"];
          
              $resultado = $conn->query($sql);
          
              if ($resultado->num_rows > 0) {
                  while ($fila = $resultado->fetch_assoc()) {
                      if (empty($fila["email"])) {
                          echo "completa.php";
                      } else {
                          echo "userinfo.php";
                      }
                  }
              }
          
              echo '>Ver perfil</a></li>
                      <li><a href="logout.php">Cerrar sesión</a></li>
                  </ul>
              </li>';
          }
          ?>
            </li>
    </ul>
    </nav>
    </header>

<body>

<h1>INSERTA LOS DATOS DEL MODELO DE VISTA</h1>

<form action="" method="POST" >
Nombre de la configuración:
<input type="text" name="config_name" required><br>    
<div class="row view-container">
        <div class="col-lg-4 col-md-6 mb-4">
            <h1>MOUSE</h1>
            DPI <br> <input type="text" name="dpi">
            <br>
            Sensitivity <br>  <input type="text" name="sensitivity">
            <br>
            eDPI <br> <input type="text" name="edpi">
            <br>
            ZoomSensitivity <br> <input type="text" name="zoomsensitivity">
            <br>
            Hz <br> <input type="text" name="hz">
            <br>
            WindowsSensitivity <br> <input type="text" name="windowssensitivity">
            <br>
            RawInput <br> <input type="text" name="rawinput">
            <br>
            MouseAcceleration <br> <input type="text" name="mouseacceleration">
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
            <h1>CROSSHAIR</h1>
            DrawOutline <br> <input type="text" name="drawoutline">
            <br>
            Alpha <br>  <input type="text" name="alpha">
            <br>
            Color <br> <input type="text" name="color">
            <br>
            Blue <br> <input type="text" name="blue">
            <br>
            Green <br> <input type="text" name="green">
            <br>
            Red <br> <input type="text" name="red">
            <br>
            Dot <br> <input type="text" name="dot">
            <br>
            Gap <br> <input type="text" name="gap">
            <br>
            Size <br> <input type="text" name="size">
            <br>
            Style <br> <input type="text" name="style">
            <br>
            Thickness <br> <input type="text" name="thickness">
            <br>
            SniperWidth <br> <input type="text" name="wniperwidth">
        </div>


        <div class="col-lg-4 col-md-6 mb-4">
            <h1>VIEWMODEL</h1>
            FOV <br> <input type="text" name="fov">
            <br>
            OffsetX <br>  <input type="text" name="offsetx">
            <br>
            OffsetY <br> <input type="text" name="offsety">
            <br>
            OffsetZ <br> <input type="text" name="offsetz">
            <br>
            PresetPos <br> <input type="text" name="presetpos">
            <br>
            ShiftLeftAmt <br> <input type="text" name="shiftleftamt">
            <br>
            ShiftRightAmt <br> <input type="text" name="shiftrightamt">
            <br>
            Recoil <br> <input type="text" name="recoil">
            <br>
            RightHand <br> <input type="text" name="righthand">

        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <h1>VIDEO SETTINGS</h1>
            Resolution <br> <input type="text" name="resolution">
            <br>
            AspectRatio <br>  <input type="text" name="aspectratio">
            <br>
            ScalingMode <br> <input type="text" name="scalingmode">
            <br>
            ColorMode <br> <input type="text" name="colormode">
            <br>
            Brightness <br> <input type="text" name="brightness">
            <br>
            DisplayMode <br> <input type="text" name="displaymode">
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <h1>ADVANCED VIDEO SETTINGS</h1>
            globalShadowQuality <br>  <input type="text" name="globalshadowquality">
            <br>
            modelTextureDetail <br> <input type="text" name="modeltexturedetail">
            <br>
            textureStreaming <br> <input type="text" name="texturestreaming">
            <br>
            effectDetail <br> <input type="text" name="effectdetail">
            <br>
            shaderDetail <br> <input type="text" name="shaderdetail">
            <br>
            boostPlayerContrast <br> <input type="text" name="boostplayercontrast">
            <br>
            multicoreRendering <br> <input type="text" name="multicorerendering">
            <br>
            multisamplingAntiAliasingMode <br> <input type="text" name="multisamplingantialiasingmode">
            <br>
            fxaaAntiAliasing <br> <input type="text" name="fxaaantialiasing">
            <br>
            textureFilteringMode <br> <input type="text" name="texturefilteringmode">
            <br>
            waitForVerticalSync <br> <input type="text" name="waitforverticalsync">
            <br>
            motionBlur <br> <input type="text" name="motionblur">
            <br>
            tripleMonitorMode <br> <input type="text" name="triplemonitormode">
            <br>
            useUberShaders <br> <input type="text" name="useubershaders">

        </div>

        
    </div>
    <br><br>
    <input type="submit" value="Crear" name="crear">

</form>
<?php
        include 'controlador_configs.php'; 
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
