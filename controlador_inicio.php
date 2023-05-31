<?php
session_start();

if (!empty($_POST["submit"])) {
    if (empty($_POST["usuario"]) and empty($_POST["contra"])) {
        echo '<b><div>HACE FALTA INGRESAR UN USUARIO Y CONTRASEÑA</div></b>';
    } else {
        $usuario = $_POST["usuario"];
        $contra = $_POST["contra"];
        $sql = "SELECT * FROM csconf.users WHERE nombre='$usuario'";
        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $hashedPassword = $fila["password"];

            if (password_verify($contra, $hashedPassword)) {
                // La contraseña es correcta
                $_SESSION['usuario'] = $usuario;
                $_SESSION['contra'] = $contra;
                $_SESSION["id"] = $fila["id"];
                header("location: index.php");
                exit();
            } else {
                // La contraseña es incorrecta
                echo '<b><div>EL USUARIO O LA CONTRASEÑA SON INCORRECTOS</div></b>';
            }
        } else {
            // El usuario no existe
            echo '<b><div>EL USUARIO O LA CONTRASEÑA SON INCORRECTOS</div></b>';
        }
    }
}

?>