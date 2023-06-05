<?php

$conn = new mysqli("localhost", "javi", "Proyecto_2023", "csconf");

if ($conn->connect_error) {
    die("Error: " . $conn->connect_error);
}

// Verificar si los campos $_POST están vacíos
if (!empty($_POST["crear"])) {
    $camposVacios = false;

    if (empty($_POST['config_name']) || empty($_POST['dpi']) || empty($_POST['sensitivity']) || empty($_POST['edpi']) || empty($_POST['zoomsensitivity']) || empty($_POST['hz']) || empty($_POST['windowssensitivity']) || empty($_POST['rawinput']) || empty($_POST['mouseacceleration']) || empty($_POST['drawoutline']) || empty($_POST['alpha']) || empty($_POST['color']) || empty($_POST['blue']) || empty($_POST['green']) || empty($_POST['red']) || empty($_POST['dot']) || empty($_POST['gap']) || empty($_POST['size']) || empty($_POST['style']) || empty($_POST['thickness']) || empty($_POST['wniperwidth']) || empty($_POST['fov']) || empty($_POST['offsetx']) || empty($_POST['offsety']) || empty($_POST['offsetz']) || empty($_POST['presetpos']) || empty($_POST['shiftleftamt']) || empty($_POST['shiftrightamt']) || empty($_POST['recoil']) || empty($_POST['righthand']) || empty($_POST['resolution']) || empty($_POST['aspectratio']) || empty($_POST['scalingmode']) || empty($_POST['colormode']) || empty($_POST['brightness']) || empty($_POST['displaymode']) || empty($_POST['globalshadowquality']) || empty($_POST['modeltexturedetail']) || empty($_POST['texturestreaming']) || empty($_POST['effectdetail']) || empty($_POST['shaderdetail']) || empty($_POST['boostplayercontrast']) || empty($_POST['multicorerendering']) || empty($_POST['multisamplingantialiasingmode']) || empty($_POST['fxaaantialiasing']) || empty($_POST['texturefilteringmode']) || empty($_POST['waitforverticalsync']) || empty($_POST['motionblur']) || empty($_POST['triplemonitormode']) || empty($_POST['useubershaders'])) {
        $camposVacios = true;
    }
    
    if ($camposVacios) {
        echo "<h1  id='error'>Por favor, complete todos los campos.</h1>";
    
        } else {
        // Insertar el nombre de configuración en la tabla configurations
        $config_name = $_POST['config_name'];
        $sql = "INSERT INTO configurations (config_name, user_id)
                VALUES ('$config_name', '" . $_SESSION['id'] . "')";

        if ($conn->query($sql) === TRUE) {
            $config_id = $conn->insert_id;

            // Insertar los datos en la tabla mouseuser
            $dpi = $_POST['dpi'];
            $sensitivity = $_POST['sensitivity'];
            $edpi = $_POST['edpi'];
            $zoomsensitivity = $_POST['zoomsensitivity'];
            $hz = $_POST['hz'];
            $windowssensitivity = $_POST['windowssensitivity'];
            $rawinput = $_POST['rawinput'];
            $mouseacceleration = $_POST['mouseacceleration'];
            $sql = "INSERT INTO mouseuser (DPI, Sensitivity, eDPI, ZoomSensitivity, Hz, WindowsSensitivity, RawInput, MouseAcceleration, user_id, config_id)
                    VALUES ('$dpi', '$sensitivity', '$edpi', '$zoomsensitivity', '$hz', '$windowssensitivity', '$rawinput', '$mouseacceleration', '" . $_SESSION['id'] . "', '$config_id')";
            $conn->query($sql);
    
            // Insertar los datos en la tabla crosshairuser
            $drawoutline = $_POST['drawoutline'];
            $alpha = $_POST['alpha'];
            $color = $_POST['color'];
            $blue = $_POST['blue'];
            $green = $_POST['green'];
            $red = $_POST['red'];
            $dot = $_POST['dot'];
            $gap = $_POST['gap'];
            $size = $_POST['size'];
            $style = $_POST['style'];
            $thickness = $_POST['thickness'];
            $wniperwidth = $_POST['wniperwidth'];
            $sql = "INSERT INTO crosshairuser (DrawOutline, Alpha, Color, Blue, Green, Red, Dot, Gap, Size, Style, Thickness, sniperWidth, user_id, config_id)
                    VALUES ('$drawoutline', '$alpha', '$color', '$blue', '$green', '$red', '$dot', '$gap', '$size', '$style', '$thickness', '$wniperwidth', '" . $_SESSION['id'] . "', '$config_id')";
            $conn->query($sql);
    
            // Insertar los datos en la tabla viewmodeluser
            $fov = $_POST['fov'];
            $offsetx = $_POST['offsetx'];
            $offsety = $_POST['offsety'];
            $offsetz = $_POST['offsetz'];
            $presetpos = $_POST['presetpos'];
            $shiftleftamt = $_POST['shiftleftamt'];
            $shiftrightamt = $_POST['shiftrightamt'];
            $recoil = $_POST['recoil'];
            $sql = "INSERT INTO viewmodeluser (FOV, OffsetX, OffsetY, OffsetZ, PresetPos, ShiftLeftAmt, ShiftRightAmt, Recoil, righthand, user_id, config_id)
                    VALUES ('$fov', '$offsetx', '$offsety', '$offsetz', '$presetpos', '$shiftleftamt', '$shiftrightamt', '$recoil', '".$_POST['righthand']."', '" . $_SESSION['id'] . "', '$config_id')";
            $conn->query($sql);
    
            // Insertar los datos en la tabla videouser
            $resolution = $_POST['resolution'];
            $aspectratio = $_POST['aspectratio'];
            $scalingmode = $_POST['scalingmode'];
            $colormode = $_POST['colormode'];
            $brightness = $_POST['brightness'];
            $displaymode = $_POST['displaymode'];
            $sql = "INSERT INTO videouser (Resolution, AspectRatio, ScalingMode, ColorMode, Brightness, DisplayMode, user_id, config_id)
                    VALUES ('$resolution', '$aspectratio', '$scalingmode', '$colormode', '$brightness', '$displaymode', '" . $_SESSION['id'] . "', '$config_id')";
            $conn->query($sql);
    
            // Insertar los datos en la tabla advuser
            $globalshadowquality = $_POST['globalshadowquality'];
            $modeltexturedetail = $_POST['modeltexturedetail'];
            $texturestreaming = $_POST['texturestreaming'];
            $effectdetail = $_POST['effectdetail'];
            $shaderdetail = $_POST['shaderdetail'];
            $boostplayercontrast = $_POST['boostplayercontrast'];
            $multicorerendering = $_POST['multicorerendering'];
            $multisamplingantialiasingmode = $_POST['multisamplingantialiasingmode'];
            $fxaaantialiasing = $_POST['fxaaantialiasing'];
            $texturefilteringmode = $_POST['texturefilteringmode'];
            $waitforverticalsync = $_POST['waitforverticalsync'];
            $motionblur = $_POST['motionblur'];
            $triplemonitormode = $_POST['triplemonitormode'];
            $useubershaders = $_POST['useubershaders'];
            $sql = "INSERT INTO advuser (nombre_configuracion, GlobalShadowQuality, ModelTextureDetail, TextureStreaming, EffectDetail, ShaderDetail, BoostPlayerContrast, MultiCoreRendering, MultisamplingAntialiasingMode, FXAAAntialiasing, TextureFilteringMode, WaitForVerticalSync, MotionBlur, TripleMonitorMode, UseUberShaders, user_id, config_id)
                    VALUES ('$config_name','$globalshadowquality', '$modeltexturedetail', '$texturestreaming', '$effectdetail', '$shaderdetail', '$boostplayercontrast', '$multicorerendering', '$multisamplingantialiasingmode', '$fxaaantialiasing', '$texturefilteringmode', '$waitforverticalsync', '$motionblur', '$triplemonitormode', '$useubershaders', '" . $_SESSION['id'] . "', '$config_id')";
            $conn->query($sql);
    
            echo '<meta http-equiv="refresh" content="5;url=lista_configs.php">';
            echo '<h1 id="acierto">¡Datos insertados correctamente! Redirigiendo a la página de usuario...</h1>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

