<!DOCTYPE html>
<html>
<head>
   <title>CSCONF</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="estilos.css">
   <script src="script.js"></script>

</head>
<body>
   <header>
   <nav>
    <ul class="menu">
        <li><a href="index.php">Inicio</a></li>
        <li><a href="configs.php">Configuraciones</a></li>
        <li class="dropdown">
        <a href="armas.php">Armas</a>
        <ul class="submenu">
            <li><a href="pistolas.php">Pistolas</a></li>
            <li><a href="#">Metralletas</a></li>
            <li><a href="#">Rifles</a></li>
            <li><a href="#">Armas pesadas</a></li>
            <li><a href="#">Granadas</a></li>
        </ul>
        </li>
        <li>
            <?php 
            session_start();
            
            if(empty($_SESSION['usuario'])){
                echo '<a href="login.php">Login</a>';
            } else {
                echo 
                '<li class="dropdown"><a href="kennys.php">'. $_SESSION["usuario"] . '</a>
                <ul class="submenu">
                <li><a href="logout.php">Cerrar sesion</a></li>
                </ul>';
            }?></li>
    </ul>
    </nav>
    
    </header>

    <h1 id="tituloarmas">XANTARES</h1>

    <div id="armas2">
        <div id="texto3">
            <p>SAKJHDBAKDBHSDOIASDJASIKJDASDPJASODSAIKDHNBSADJAS OIUDAIJ ASI HO Y IO JOI H OJ JO UB OIHUIOASHDA</p>
        </div>
        <div class="mw-100">
            <img id="fotoarma" src="gato1.jpg" alt="gato">
        </div>
    </div>

    <hr>

    <div id="contarm">
    <h2 id="titabla1">Mouse</h2>
    <img src="raton.png" alt="raton" id="imgchiquita1">
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
            $conn=new mysqli("localhost","javi", "Proyecto_2023", "csconf");

            if ($conn->connect_error) {
                die("Error: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM mouse where id=3";

            $resultado = $conn->query($sql);


            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<th>".$fila["DPI"]."</a>" . "</th>";
                    echo "<th>".$fila["Sensitivity"]."</a>" . "</th>";
                    echo "<th>".$fila["eDPI"]."</a>" . "</th>";
                    echo "<th>".$fila["ZoomSensitivity"]."</a>" . "</th>";
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
    <img src="teclado.png" alt="raton" id="imgchiquita2">
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
                $sql = "SELECT * FROM crosshair where id=3";

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
                $sql = "SELECT * FROM crosshair where id=3";

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
                $sql = "SELECT * FROM crosshair where id=3";

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
    <img src="ojo.png" alt="raton" id="imgchiquita3">
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
                $sql = "SELECT * FROM viewmodel where id=3";

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
                $sql = "SELECT * FROM viewmodel where id=3";

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
                $sql = "SELECT * FROM viewmodel where id=3";

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
    <img src="monitor.png" alt="raton" id="imgchiquita4">
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
                $sql = "SELECT * FROM video where id=3";

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
                $sql = "SELECT * FROM video where id=3";

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
                $sql = "SELECT * FROM adv where id=3";

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
                $sql = "SELECT * FROM adv where id=3";

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
                $sql = "SELECT * FROM adv where id=3";

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
                $sql = "SELECT * FROM adv where id=3";

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>