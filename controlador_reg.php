<?php

    $sql = 'SELECT * FROM users';

    $resultado = $conn->query($sql);

    if (!empty($_POST["submit"])) {
        if (empty($_POST["usuario"]) || empty($_POST["contra1"]) || empty($_POST["contra2"])) {
            echo '<script src="usercontra.js"></script>';
        } else if ($_POST["contra1"] != $_POST["contra2"]) {
            echo '<script src="contras.js"></script>';
        } else {
            $usuario = $_POST["usuario"];
    
            // Verificar si el usuario ya existe en la base de datos
            $sql = "SELECT * FROM users WHERE nombre = '" . $usuario . "'";
            $resultado = $conn->query($sql);
    
            if ($resultado->num_rows > 0) {
                echo '<script src="error.js"></script>';
            } else {
                $contra = password_hash($_POST["contra1"], PASSWORD_DEFAULT); // Cifra la contraseña
                $sql = "INSERT INTO users (nombre, password, fecha_reg) VALUES ('" . $usuario . "', '" . $contra . "', NOW())";
                $conn->query($sql);
                $conn->close();
                echo '<script src="success.js"></script>';
                echo '<meta http-equiv="refresh" content="5;url=login.php">';
                exit();
            }
        }
    }
    

?>