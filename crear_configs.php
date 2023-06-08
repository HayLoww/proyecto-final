<html lang="es">
<head>
    <title> CSOCNF</title>
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
        font-size:20px;
        color: white;
        text-shadow: 4px 4px 4px black;
        text-align:center;
        justify-content: center;
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
        margin-top:-30px;
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
        margin-bottom:50px;
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

    #error{
        color:red;
        margin-top:-20px;
    }

    #acierto{
        color:green;
        margin-top:-20px;
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

<h1>INSERTA LOS DATOS DE LA CONFIGURACION</h1>

<form action="" method="POST" >
Nombre de la configuración:
<input type="text" name="config_name" required><br>    
<div class="row">
                <div class="col-lg-12">
                    <h1>MOUSE</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="dpi">DPI:</label>
                    </div>
                    <input type="text" name="dpi" id="dpi">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="sensitivity">Sensitivity:</label>
                    </div>
                    <input type="text" name="sensitivity" id="sensitivity">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="edpi">eDPI:</label>
                    </div>
                    <input type="text" name="edpi" id="edpi">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="zoomsensitivity">Zoom Sensitivity:</label>
                    </div>
                    <input type="text" name="zoomsensitivity" id="zoomsensitivity">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="hz">Hz:</label>
                    </div>
                    <input type="text" name="hz" id="hz">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="windowssensitivity">Windows Sensitivity:</label>
                    </div>
                    <input type="text" name="windowssensitivity" id="windowssensitivity">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="rawinput">Raw Input:</label>
                    </div>
                    <input type="text" name="rawinput" id="rawinput">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="mouseacceleration">Mouse Acceleration:</label>
                    </div>
                    <input type="text" name="mouseacceleration" id="mouseacceleration">
                </div>
            </div>
        </div>

        <div class="row">
                <div class="col-lg-12">
                    <h1>CROSSHAIR</h1>
                </div>
            </div>
        <div class="row">
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="drawoutline">DrawOutline:</label>
                    </div>
                    <input type="text" name="drawoutline" id="drawoutline">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="alpha">Alpha:</label>
                    </div>
                    <input type="text" name="alpha" id="alpha">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="color">Color:</label>
                    </div>
                    <input type="text" name="color" id="color">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="blue">Blue:</label>
                    </div>
                    <input type="text" name="blue" id="blue">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="green">Green:</label>
                    </div>
                    <input type="text" name="green" id="green">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="red">Red:</label>
                    </div>
                    <input type="text" name="red" id="red">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="dot">Dot:</label>
                    </div>
                    <input type="text" name="dot" id="dot">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="gap">Gap:</label>
                    </div>
                    <input type="text" name="gap" id="gap">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="size">Size:</label>
                    </div>
                    <input type="text" name="size" id="size">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="style">Style:</label>
                    </div>
                    <input type="text" name="style" id="style">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="thickness">Thickness:</label>
                    </div>
                    <input type="text" name="thickness" id="thickness">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="wniperwidth">SniperWidth:</label>
                    </div>
                    <input type="text" name="wniperwidth" id="wniperwidth">
                </div>

            </div>
        </div>

        <div class="row">
                <div class="col-lg-12">
                    <h1>VIEWMODEL</h1>
                </div>
            </div>
        <div class="row">
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="fov">Fov:</label>
                    </div>
                    <input type="text" name="fov" id="fov">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="offsetx">Offset X:</label>
                    </div>
                    <input type="text" name="offsetx" id="offsetx">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="offsety">Offset Y:</label>
                    </div>
                    <input type="text" name="offsety" id="offsety">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="offsetz">OLffset Z:</label>
                    </div>
                    <input type="text" name="offsetz" id="offsetz">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="presetpos">PresetPos:</label>
                    </div>
                    <input type="text" name="presetpos" id="presetpos">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="shiftleftamt">Shift Left Amt:</label>
                    </div>
                    <input type="text" name="shiftleftamt" id="shiftleftamt">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="shiftrightamt">Shift Right Amt:</label>
                    </div>
                    <input type="text" name="shiftrightamt" id="shiftrightamt">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="recoil">Recoil:</label>
                    </div>
                    <input type="text" name="recoil" id="recoil">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="righthand">RightHand:</label>
                    </div>
                    <input type="text" name="righthand" id="righthand">
                </div>
            </div>
        </div>

        <div class="row">
                <div class="col-lg-12">
                    <h1>VIDEO SETTINGS</h1>
                </div>
            </div>
        <div class="row">
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="resolution">Resolution:</label>
                    </div>
                    <input type="text" name="resolution" id="resolution">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="aspectratio">Aspect Ratio:</label>
                    </div>
                    <input type="text" name="aspectratio" id="aspectratio">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="scalingmode">Scaling Mode:</label>
                    </div>
                    <input type="text" name="scalingmode" id="scalingmode">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="colormode">Color Mode:</label>
                    </div>
                    <input type="text" name="colormode" id="colormode">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="brightness">Brightness:</label>
                    </div>
                    <input type="text" name="brightness" id="brightness">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="displaymode">Display Mode:</label>
                    </div>
                    <input type="text" name="displaymode" id="displaymode">
                </div>
            </div>
        </div>

        <div class="row">
                <div class="col-lg-12">
                    <h1>ADVANCED VIDEO SETTINGS</h1>
                </div>
            </div>
        <div class="row">
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="globalshadowquality">Global Shadow Quality:</label>
                    </div>
                    <input type="text" name="globalshadowquality" id="globalshadowquality">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="modeltexturedetail">Model / Texture Detail:</label>
                    </div>
                    <input type="text" name="modeltexturedetail" id="modeltexturedetail">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="texturestreaming">Texture Streaming:</label>
                    </div>
                    <input type="text" name="texturestreaming" id="texturestreaming">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="effectdetail">Effect Detail:</label>
                    </div>
                    <input type="text" name="effectdetail" id="effectdetail">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="shaderdetail">Shader Detail:</label>
                    </div>
                    <input type="text" name="shaderdetail" id="shaderdetail">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="boostplayercontrast">Boost Player Contrast:</label>
                    </div>
                    <input type="text" name="boostplayercontrast" id="boostplayercontrast">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="multicorerendering">Multicore Rendering:</label>
                    </div>
                    <input type="text" name="multicorerendering" id="multicorerendering">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="multisamplingantialiasingmode">Multisampling Anti-Aliasing Mode:</label>
                    </div>
                    <input type="text" name="multisamplingantialiasingmode" id="multisamplingantialiasingmode">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="fxaaantialiasing">FXAA Anti-Aliasing:</label>
                    </div>
                    <input type="text" name="fxaaantialiasing" id="fxaaantialiasing">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="texturefilteringmode">Texture Filtering Mode:</label>
                    </div>
                    <input type="text" name="texturefilteringmode" id="texturefilteringmode">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="waitforverticalsync">Wait for Vertical Sync:</label>
                    </div>
                    <input type="text" name="waitforverticalsync" id="waitforverticalsync">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="motionblur">Motion Blur:</label>
                    </div>
                    <input type="text" name="motionblur" id="motionblur">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="triplemonitormode">Triple-Monitor Mode:</label>
                    </div>
                    <input type="text" name="triplemonitormode" id="triplemonitormode">
                </div>
                <div class="col-lg-3">
                    <div class="input-container">
                        <label for="useubershaders">Use Uber Shaders:</label>
                    </div>
                    <input type="text" name="useubershaders" id="useubershaders">
                </div>

            </div>
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
