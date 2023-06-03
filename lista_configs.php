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

    
    div{
        color:red;
        text-shadow: 4px 4px 4px black;
        font-size:20px;
    }



    input[type=submit]{
        margin-top:30px;
        width: 14%;
        height: 50px;
        font-size: 105%;
        background-color: #4B0082;
        color: white;
        box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.15);
        border-style:solid;
        border-color: black;
        border-radius: 5px;
        font-weight:bold;
        margin-bottom:50px;
        text-shadow: 4px 4px 4px black;

    }

    h1{
        text-align:center;
        color: #f4c02b;
        text-shadow: 4px 4px 4px black;
        margin-top:100px;
        font-size:60px;
        margin-bottom:40px
    }


    table {
        border-collapse: separate;
        border-spacing: 0 20px;
        width:500px;
        margin-top:30px;
        text-shadow: 4px 4px 4px black;

    }

    #borrar{
        background-color:red;
        border-radius:10px;
        height:45px;
        width:90px;
        text-align:center;
        justify-content:center;
        padding-top:11px;
        text-shadow: 5px 9px 9px black;
        background: linear-gradient(red,50%,black);
        font-weight:bold;
        color:white;
    }

    .text-white{
        font-size:20px;
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

<h1>Listado de configuraciones</h1>
<table align="center">

<?php
$conn = new mysqli("localhost", "javi", "Proyecto_2023", "csconf");

if ($conn->connect_error) {
    die("Error: " . $conn->connect_error);
}

$sql = "SELECT * FROM csconf.advuser where user_id=".$_SESSION["id"];
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    // Mostrar la lista de configuraciones

    while ($fila = $resultado->fetch_assoc()) {
        $nombre_configuracion = $fila['nombre_configuracion'];
        $config_id = $fila['id'];
        echo "<tr>";
        echo "<td class='d-flex justify-content-between align-items-center'>";
        echo "<span id='enlace'>";
        echo "<a class='text-white text-decoration-none font-weight-bold' href='ver_configuracion.php?config_id=$config_id'>$nombre_configuracion</a>";
        echo "</span>";
        echo "<a id='borrar' class=' text-decoration-none' href='conf_borrar.php?id=" . $fila['id'] . "'>Borrar</a>";
        echo "</td>";
        echo "</tr>";
    }


} else {
    echo "<p style='color:#FBC76C;text-shadow: 1px 1px 2px black;font-weight:bold;font-size:20px;'>Sin resultados</p>";
}

$conn->close();
?>
</table>

    
<form action="crear_configs.php" method="post" style="margin-top:50px">
    <input type="submit" value="Crear nueva config" name="crear">
</form>

</body>
</html>