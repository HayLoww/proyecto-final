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
    <title> CSCONF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
        width: 30%;
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
        width: 30%;
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

    </style>
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


<h1>Listado de peludines</h1>

<?php

    $conn=new mysqli("localhost","javi", "Proyecto_2023", "csconf");

    if ($conn->connect_error) {
        die("Error: " . $conn->connect_error);
    }

    /* Mostrar todas las clases y si se da a los links que filtre por esas letras */

    $sql = "SELECT * FROM csconf.users where id= ". $_SESSION["id"];

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

<form action="crear_configs.php" method="post" style="margin-top:50px">
    <input type="submit" value="Crear nuevo animal" name="crear">
</form>

</body>
</html>