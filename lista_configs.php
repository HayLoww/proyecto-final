<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    // DEBERIA DE SALIR ESTE ERROR PERO NO SALE XD
    echo '<script language="javascript">alert("Introduce el usuario y la contraseña para acceder a esta pagina");</script>';
    header('Location: inicio.php');
    exit;
}
?>

<html lang="es">
<head>    
    <title> Listado de peludines</title>
    <style type="text/css">
    
    body {
        text-align: center;
        background-image: url("imagenes/wallpaper.jpg");
        height: 570px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-attachment:fixed;
        position: relative;
    }

    h1{
        margin-top:50px;
        margin-bottom:50px;
        text-align:center;
        color: white;
        font-weight:bold;
        text-shadow: 1px 1px 2px black;
        font-size:40px;
    }

    input[type=submit]{
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
    }
    </style>
</head>
<body>

<form action="logout.php" method="post" style="text-align:left;margin:20px;">
    <input type="submit" value="Cerrar Sesión" name="vuelve">
</form>

<h1>Listado de peludines</h1>

<?php

    $conn=new mysqli("localhost","javi", "Proyecto_2023", "csconf");

    if ($conn->connect_error) {
        die("Error: " . $conn->connect_error);
    }

    /* Mostrar todas las clases y si se da a los links que filtre por esas letras */

    $sql = "SELECT * FROM csconf.users where id= ";

    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        // Recorremos cada fila y la mostramos en una tabla
        echo "<table align=\"center\">";
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>" ;
            echo "<td>" . "<a href=animal.php?id=". $fila["id"]." style='color:white;text-shadow: 1px 1px 2px black;margin-right:200px;font-weight:bold;font-size:20px;'>".$fila["nombre"]."</a>" . "</td>";
            
            // Llamada get para borrar con un link (MUCHO TEXTO EL CSS AL IGUAL QUE EL DE ARRIBA XD)
            
            echo "<td style='font-weight:bold;border-style:solid;border-color:#870000;background-color:#870000;border-radius:5px;width:100px;height:35px;text-align:center;'><a style='color: white; text-decoration: none;text-shadow: 1px 1px 2px black;' href='animales_borrar.php?id=" . $fila['id'] .  "'>Borrar</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='color:#FBC76C;text-shadow: 1px 1px 2px black;font-weight:bold;font-size:20px;'>Sin resultados</p>";
    }


    $conn->close();
?>

<form action="crear_animales.php" method="post" style="margin-top:50px">
    <input type="submit" value="Crear nuevo animal" name="crear">
</form>

</body>
</html>