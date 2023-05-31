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
            session_start();

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
    <?php
$conn = new mysqli("localhost", "javi", "Proyecto_2023", "csconf");

if ($conn->connect_error) {
    die("Error: " . $conn->connect_error);
}

$sql = "SELECT * FROM pistolas where arma_id=". $id=$_GET["id"];

$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        // Mostrar la estructura de nombre y texto para cada fila
        echo '<h1 id="tituloarmas">' . $fila["nombre"] . '</h1>';

        echo '
        <div id="armas2">
            <div id="texto3">
                <p>' . $fila["texto"] . '</p>
            </div>
            <div class="mw-100">
                <img id="fotoarma" src="' . $fila["image"] . '" alt="gato">
            </div>
        </div> <table class="table table-hover">
        <thead>
            <tr>
                <th>Precio</th>
                <th>Cargador</th>
                <th>Disparo</th>
                <th>Bando</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>' . $fila["precio"] . '</td>
                <td>' . $fila["cargador"] . '</td>
                <td>' . $fila["disparo"] . '</td>
                <td>' . $fila["bando"] . '</td>
            </tr>
        </tbody>
        <thead>
            <tr>
                <th>Recarga</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border-bottom: 0px;">' . $fila["recarga"] . '</td>
            </tr>
        </tbody>
        </table>';
        echo '<hr>';
    }
}

$sql = "SELECT * FROM metralletas where arma_id=". $id=$_GET["id"];

$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        // Mostrar la estructura de nombre y texto para cada fila
        echo '<h1 id="tituloarmas">' . $fila["nombre"] . '</h1>';

        echo '
        <div id="armas2">
            <div id="texto3">
                <p>' . nl2br($fila["texto"]) . '</p>
            </div>
            <div class="mw-100">
                <img id="fotoarma" src="' . $fila["image"] . '" alt="gato">
            </div>
        </div> <table class="table table-hover">
        <thead>
            <tr>
                <th>Precio</th>
                <th>Cargador</th>
                <th>Disparo</th>
                <th>Bando</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>' . $fila["precio"] . '</td>
                <td>' . $fila["cargador"] . '</td>
                <td>' . $fila["disparo"] . '</td>
                <td>' . $fila["bando"] . '</td>
            </tr>
        </tbody>
        <thead>
            <tr>
                <th>Recarga</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border-bottom: 0px;">' . $fila["recarga"] . '</td>
            </tr>
        </tbody>
        </table>';
        echo '<hr>';
    }
}

$sql = "SELECT * FROM rifles where arma_id=". $id=$_GET["id"];

$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        // Mostrar la estructura de nombre y texto para cada fila
        echo '<h1 id="tituloarmas">' . $fila["nombre"] . '</h1>';

        echo '
        <div id="armas2">
            <div id="texto3">
                <p>' . nl2br($fila["texto"]) . '</p>
            </div>
            <div class="mw-100">
                <img id="fotoarma" src="' . $fila["image"] . '" alt="gato">
            </div>
        </div> <table class="table table-hover">
        <thead>
            <tr>
                <th>Precio</th>
                <th>Cargador</th>
                <th>Disparo</th>
                <th>Bando</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>' . $fila["precio"] . '</td>
                <td>' . $fila["cargador"] . '</td>
                <td>' . $fila["disparo"] . '</td>
                <td>' . $fila["bando"] . '</td>
            </tr>
        </tbody>
        <thead>
            <tr>
                <th>Recarga</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border-bottom: 0px;">' . $fila["recarga"] . '</td>
            </tr>
        </tbody>
        </table>';
        echo '<hr>';
    }
}

$sql = "SELECT * FROM escopetas where arma_id=". $id=$_GET["id"];

$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        // Mostrar la estructura de nombre y texto para cada fila
        echo '<h1 id="tituloarmas">' . $fila["nombre"] . '</h1>';

        echo '
        <div id="armas2">
            <div id="texto3">
                <p>' . nl2br($fila["texto"]) . '</p>
            </div>
            <div class="mw-100">
                <img id="fotoarma" src="' . $fila["image"] . '" alt="gato">
            </div>
        </div> <table class="table table-hover">
        <thead>
            <tr>
                <th>Precio</th>
                <th>Cargador</th>
                <th>Disparo</th>
                <th>Bando</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>' . $fila["precio"] . '</td>
                <td>' . $fila["cargador"] . '</td>
                <td>' . $fila["disparo"] . '</td>
                <td>' . $fila["bando"] . '</td>
            </tr>
        </tbody>
        <thead>
            <tr>
                <th>Recarga</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border-bottom: 0px;">' . $fila["recarga"] . '</td>
            </tr>
        </tbody>
        </table>';
        echo '<hr>';
    }
}

$sql = "SELECT * FROM granadas where arma_id=". $id=$_GET["id"];

$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        // Mostrar la estructura de nombre y texto para cada fila
        echo '<h1 id="tituloarmas">' . $fila["nombre"] . '</h1>';

        echo '
        <div id="armas2">
            <div id="texto3">
                <p>' . nl2br($fila["texto"]) . '</p>
            </div>
            <div class="mw-100">
                <img id="fotoarma" src="' . $fila["image"] . '" alt="gato">
            </div>
        </div>';
        echo '<hr>';
    }
}
$conn->close();
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>
