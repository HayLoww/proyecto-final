<?php
    $conn = new mysqli("localhost", "javi", "Proyecto_2023", "csconf");

    if ($conn->connect_error) {
        die("Error: " . $conn->connect_error);
    }

    if (!empty($_POST["submit"])) {
        if (empty($_POST["email"]) || empty($_POST["edad"])  || empty($_POST["telef"]) || empty($_POST["direc"]) || empty($_FILES["imagen"]["tmp_name"])) {

            echo '<b><div>HACE FALTA RELLENAR TODOS LOS DATOS</div></b>';

        } else {
            $email = $_POST["email"];
            $edad = $_POST["edad"];
            $telef = $_POST["telef"];
            $direc = $_POST["direc"];

            // EL "time()" GARANTIZA QUE EL ARCHIVO DE LA IMAGEN SEA ÚNICO
            $nombre_imagen = time() . '_' . $_FILES["imagen"]["name"];

            // AQUÍ GUARDO LA RUTA DE LA IMAGEN
            $ruta_imagen = "imagenes/" . $nombre_imagen;

            // AQUÍ USO EL "move_uploaded_file" PARA MOVER EL ARCHIVO TEMPORAL A LA RUTA
            // ANTES ESPECIFICADA
            move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta_imagen);

            $sql = "UPDATE users SET email='" . $email . "', edad=" . $edad . ", telefono=" . $telef . ", direccion='" . $direc . "', image='" . $ruta_imagen . "' WHERE id=" . $_SESSION["id"];
            $conn->query($sql);
            $conn->close();
            echo '<meta http-equiv="refresh" content="5;url=userinfo.php">';
            echo '<h2>¡Datos actualizados correctamente! Redirigiendo a la página de usuario...</h2>';
            exit();
        }
    }
?>