<?php

    $sql = 'SELECT * FROM users';

    $resultado = $conn->query($sql);

    if (!empty($_POST["submit"])) {
        if (empty($_POST["usuario"]) || empty($_POST["contra1"]) || empty($_POST["contra2"])) {
            echo '<b><div>HACE FALTA INGRESAR UN USUARIO Y CONTRASEÑA</div></b>';
        } else if ($_POST["contra1"] != $_POST["contra2"]) {
            echo '<b><div>LAS CONTRASEÑAS NO COINCIDEN</div></b>';
        } else {
            $usuario = $_POST["usuario"];
    
            // Verificar si el usuario ya existe en la base de datos
            $sql = "SELECT * FROM users WHERE nombre = '" . $usuario . "'";
            $resultado = $conn->query($sql);
    
            if ($resultado->num_rows > 0) {
                echo '<b><div>ESTE USUARIO YA ESTÁ REGISTRADO</div></b>';
            } else {
                $contra = password_hash($_POST["contra1"], PASSWORD_DEFAULT); // Cifra la contraseña
                $sql = "INSERT INTO users (nombre, password, fecha_reg) VALUES ('" . $usuario . "', '" . $contra . "', NOW())";
                $conn->query($sql);
                $conn->close();
                header("location: login.php");
                exit();
            }
        }
    }
    

?>