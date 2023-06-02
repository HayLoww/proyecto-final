<?php
    $conn = new mysqli("localhost", "javi", "Proyecto_2023", "csconf");

    if ($conn->connect_error) {
        die("Error: " . $conn->connect_error);
    }

    if (!empty($_POST["submit"])) {
        if (empty($_POST["email"]) || empty($_POST["edad"]) || empty($_POST["telef"]) || empty($_POST["direc"]) || empty($_FILES["imagen"]["tmp_name"])) {
            echo '<b><div>HACE FALTA RELLENAR TODOS LOS DATOS</div></b>';

        } else {
            $fov = $_POST['fov'];
            $offsetx = $_POST['offsetx'];
            $offsety = $_POST['offsety'];
            $offsetz = $_POST['offsetz'];
            $presetpos = $_POST['presetpos'];
            $shiftleftamt = $_POST['shiftleftamt'];
            $shiftrightamt = $_POST['shiftrightamt'];
            $recoil = $_POST['recoil'];
            $fov = $_POST['fov'];
            $righthand = $_POST['righthand'];
            $user_id = $_POST['user_id'];

            $usuario_id = $_SESSION['usuario_id'];

            $conn->query("INSERT INTO viewmodeluser (FOV, OffsetX, OffsetY, OffsetZ, PresetPos, ShiftLeftAmt, ShiftRightAmt, Recoil, RightHand, user_id)
            VALUES ('$FOV', '$OffsetX', '$OffsetY', '$OffsetZ', '$PresetPos', '$ShiftLeftAmt', '$ShiftRightAmt', '$Recoil', '$RightHand', '$usuario_id')");

            $conn->query($sql);
            $conn->close();
            echo '<meta http-equiv="refresh" content="5;url=userinfo.php">';
            echo '<h2>¡Datos actualizados correctamente! Redirigiendo a la página de usuario...</h2>';
            exit();
        }
    }
?>