<html lang="es">
<head>
    <title> CSCONF</title>
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
<?php
        $conn = new mysqli("localhost", "javi", "Proyecto_2023", "csconf");
        if ($conn->connect_error) {
            die("Error: " . $conn->connect_error);
        }

        if (isset($_GET['config_id'])) {
            $config_id = $_GET['config_id'];
            $sql = "SELECT * FROM configurations WHERE config_id = $config_id";
            $resultado = $conn->query($sql);
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    $nombre_configuracion = $fila['config_name'];
                    echo "<h1>" . $nombre_configuracion . "</h1>";
                }
            }
        }
?>

    <div id="contarm">
    <h2 id="titabla1">Mouse</h2>
    <img src="imagenes/raton.png" alt="raton" id="imgchiquita1">
    </div>

    <table class="table table-hover">
    <thead>
        <tr>
        <th>DPI</th>
        <th>Sensitivity</th>
        <th>eDPI</th>
        <th>Zoom Sensitivity</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php
        $conn = new mysqli("localhost", "javi", "Proyecto_2023", "csconf");
        if ($conn->connect_error) {
            die("Error: " . $conn->connect_error);
        }

        if (isset($_GET['config_id'])) {
            $config_id = $_GET['config_id'];
            $sql = "SELECT * FROM mouseuser WHERE id = $config_id";
            $resultado = $conn->query($sql);
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<th>".$fila["DPI"]."</a>" . "</th>";
                    echo "<th>".$fila["Sensitivity"]."</a>" . "</th>";
                    echo "<th>".$fila["eDPI"]."</a>" . "</th>";
                    echo "<th>".$fila["ZoomSensitivity"]."</a>" . "</th>";
                }
            }
        }

        ?>
        </tr>
    </tbody>
    <thead>
        <tr>
        <th>Hz</th>
        <th>Windows Sensitivity</th>
        <th>Raw Input</th>
        <th>Mouse Acceleration</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
                $sql = "SELECT * FROM mouseuser WHERE id = $config_id";

                $resultado = $conn->query($sql);
    
                if ($resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<th>".$fila["Hz"]."</a>" . "</th>";
                        echo "<th>".$fila["WindowsSensitivity"]."</a>" . "</th>";
                        echo "<th>".$fila["RawInput"]."</a>" . "</th>";
                        echo "<th>".$fila["MouseAcceleration"]."</a>" . "</th>";
                    }
                }
            ?>
        </tr>
    </tbody>
    </table>

    <hr>


    <div id="contarm">
    <h2 id="titabla2">Crosshair</h2>
    <img src="imagenes/teclado.png" alt="raton" id="imgchiquita2">
    </div>

    <table class="table table-hover">
    <thead>
        <tr>
        <th>Drawoutline</th>
        <th>Alpha</th>
        <th>Color</th>
        <th>Blue</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php
                $sql = "SELECT * FROM crosshairuser WHERE id = $config_id";

                $resultado = $conn->query($sql);
    
                if ($resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<th>".$fila["DrawOutline"]."</a>" . "</th>";
                        echo "<th>".$fila["Alpha"]."</a>" . "</th>";
                        echo "<th>".$fila["Color"]."</a>" . "</th>";
                        echo "<th>".$fila["Blue"]."</a>" . "</th>";
                    }
                }
            ?>
        </tr>
    </tbody>
    <thead>
        <tr>
        <th>Green</th>
        <th>Red</th>
        <th>Dot</th>
        <th>Gap</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php
                $sql = "SELECT * FROM crosshairuser WHERE id = $config_id";

                $resultado = $conn->query($sql);

                if ($resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<th>".$fila["Green"]."</a>" . "</th>";
                        echo "<th>".$fila["Red"]."</a>" . "</th>";
                        echo "<th>".$fila["Dot"]."</a>" . "</th>";
                        echo "<th>".$fila["Gap"]."</a>" . "</th>";
                    }
                }
            ?>
        </tr>
    </tbody>
    <thead>
        <tr>
        <th>Size</th>
        <th>Style</th>
        <th>Thickness</th>
        <th>Sniper Width</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php
                $sql = "SELECT * FROM crosshairuser WHERE id = $config_id";

                $resultado = $conn->query($sql);
    
                if ($resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<th>".$fila["Size"]."</a>" . "</th>";
                        echo "<th>".$fila["Style"]."</a>" . "</th>";
                        echo "<th>".$fila["Thickness"]."</a>" . "</th>";
                        echo "<th>".$fila["SniperWidth"]."</a>" . "</th>";
                    }
                }
            ?>
        </tr>
    </tbody>
    </table>

    <hr>

    <div id="contarm">
    <h2 id="titabla3">Viewmodel</h2>
    <img src="imagenes/ojo.png" alt="raton" id="imgchiquita3">
    </div>

    <table class="table table-hover">
    <thead>
        <tr>
        <th>FOV</th>
        <th>Offset X</th>
        <th>Offset Y</th>
        <th>Offset Z</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php
                $sql = "SELECT * FROM viewmodeluser where id = $config_id";

                $resultado = $conn->query($sql);
    
                if ($resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<th>".$fila["FOV"]."</a>" . "</th>";
                        echo "<th>".$fila["OffsetX"]."</a>" . "</th>";
                        echo "<th>".$fila["OffsetY"]."</a>" . "</th>";
                        echo "<th>".$fila["OffsetZ"]."</a>" . "</th>";
                    }
                }
            ?>
        </tr>
    </tbody>
    <thead>
        <tr>
        <th>Presetpos</th>
        <th>Shift Left Amt</th>
        <th >Shift Right Amt</th>
        <th>Recoil</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php
                $sql = "SELECT * FROM viewmodeluser where id = $config_id";

                $resultado = $conn->query($sql);
    
                if ($resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<th>".$fila["PresetPos"]."</a>" . "</th>";
                        echo "<th>".$fila["ShiftLeftAmt"]."</a>" . "</th>";
                        echo "<th>".$fila["ShiftRightAmt"]."</a>" . "</th>";
                        echo "<th>".$fila["Recoil"]."</a>" . "</th>";
                    }
                }
            ?>
        </tr>
    </tbody>
    <thead>
        <tr>
        <th  colspan=1 >Righthand</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php
                $sql = "SELECT * FROM viewmodeluser where id = $config_id";

                $resultado = $conn->query($sql);
    
                if ($resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<th colspan=1>".$fila["RightHand"]."</a>" . "</th>";
                    }
                }
            ?>        
            </tr>
    </tbody>
    </table>

    <hr>

    <div id="contarm">
    <h2 id="titabla4">Video Settings</h2>
    <img src="imagenes/monitor.png" alt="raton" id="imgchiquita4">
    </div>

    <table class="table table-hover">
    <thead>
        <tr>
        <th>Resolution</th>
        <th>Aspect Ratio</th>
        <th>Scaling Mode</th>
        <th>Color Mode</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php
                $sql = "SELECT * FROM videouser where id = $config_id";

                $resultado = $conn->query($sql);
    
                if ($resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<th>".$fila["Resolution"]."</a>" . "</th>";
                        echo "<th>".$fila["AspectRatio"]."</a>" . "</th>";
                        echo "<th>".$fila["ScalingMode"]."</a>" . "</th>";
                        echo "<th>".$fila["ColorMode"]."</a>" . "</th>";
                    }
                }
            ?>
        </tr>
    </tbody>
    <thead>
        <tr>
        <th>Brightness</th>
        <th>Display Mode</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php
                $sql = "SELECT * FROM videouser where id = $config_id";

                $resultado = $conn->query($sql);
    
                if ($resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<th style='border-bottom: 0px;'>".$fila["Brightness"]."</a>" . "</th>";
                        echo "<th style='border-bottom: 0px;'>".$fila["DisplayMode"]."</a>" . "</th>";
                    }
                }
            ?>
        </tr>
    </tbody>
    </table>

    <div id="contarm">
    <h2 id="titabla4">Advanced Video Settings</h2>
    </div>

    <table class="table table-hover">
    <thead>
        <tr>
        <th>Global Shadow Quality</th>
        <th>Model / Texture Detail</th>
        <th>Texture Streaming</th>
        <th>Effect Detail</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php
                $sql = "SELECT * FROM advuser where id = $config_id";

                $resultado = $conn->query($sql);
    
                if ($resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<th>".$fila["globalShadowQuality"]."</a>" . "</th>";
                        echo "<th>".$fila["modelTextureDetail"]."</a>" . "</th>";
                        echo "<th>".$fila["textureStreaming"]."</a>" . "</th>";
                        echo "<th>".$fila["effectDetail"]."</a>" . "</th>";
                    }
                }
            ?>
        </tr>
    </tbody>
    <thead>
        <tr>
        <th>Shader Detail</th>
        <th>Boost Player Contrast</th>
        <th>Multicore Rendering</th>
        <th>Multisampling Anti-Aliasing Mode</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php
                $sql = "SELECT * FROM advuser where id = $config_id";

                 $resultado = $conn->query($sql);
    
                if ($resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<th>".$fila["shaderDetail"]."</a>" . "</th>";
                        echo "<th>".$fila["boostPlayerContrast"]."</a>" . "</th>";
                        echo "<th>".$fila["multicoreRendering"]."</a>" . "</th>";
                        echo "<th>".$fila["multisamplingAntiAliasingMode"]."</a>" . "</th>";
                    }
                }
            ?>
        </tr>
    </tbody>
    <thead>
        <tr>
        <th>FXAA Anti-Aliasing</th>
        <th>Texture Filtering Mode</th>
        <th>Wait for Vertical Sync</th>
        <th>Motion Blur</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php
                $sql = "SELECT * FROM advuser where id = $config_id";

                $resultado = $conn->query($sql);
    
                if ($resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<th>".$fila["fxaaAntiAliasing"]."</a>" . "</th>";
                        echo "<th>".$fila["textureFilteringMode"]."</a>" . "</th>";
                        echo "<th>".$fila["waitForVerticalSync"]."</a>" . "</th>";
                        echo "<th>".$fila["motionBlur"]."</a>" . "</th>";
                    }
                }
            ?>
        </tr>
    </tbody>
    <thead>
        <tr>
        <th>Triple-Monitor Mode</th>
        <th>Use Uber Shaders</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php
                $sql = "SELECT * FROM advuser where id = $config_id";

                $resultado = $conn->query($sql);
    
                if ($resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<th style='border-bottom: 0px;'>".$fila["tripleMonitorMode"]."</a>" . "</th>";
                        echo "<th style='border-bottom: 0px;' colspan=1 >".$fila["useUberShaders"]."</a>" . "</th>";
                    }
                }
            ?>

        </tr>
    </tbody>
    </table>