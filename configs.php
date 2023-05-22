<!DOCTYPE html>
<html>
<head>
   <title>CSCONF</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="estilos.css">
   <script src="script.js"></script>
   <style type="text/css">
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
    <div id=port>
        <h1 id="tituloconf">CONFIGURACIONES</h1>
        <div id="textoconf">
            <p>Minions ipsum para tú poulet tikka masala po kass pepete. Jeje potatoooo po kass chasy pepete po kass gelatooo aaaaaah belloo! Chasy. Chasy tatata bala tu po kass bananaaaa butt butt. Uuuhhh jiji bee do bee do bee do uuuhhh chasy tatata bala tu la bodaaa. Poopayee wiiiii baboiii bee do bee do bee do. Gelatooo bananaaaa poopayee para tú tatata bala tu pepete wiiiii. Bee do bee do bee do tank yuuu! Gelatooo baboiii poopayee po kass wiiiii tulaliloo po kass jeje tatata bala tu. Aaaaaah hana dul sae hana dul sae poulet tikka masala daa bananaaaa bee do bee do bee do jiji po kass la bodaaa potatoooo. Bananaaaa tulaliloo ti aamoo! Pepete me want bananaaa! Potatoooo wiiiii.</p>
        </div>
    </div>

    <?php
$conn = new mysqli("localhost", "javi", "Proyecto_2023", "csconf");

if ($conn->connect_error) {
  die("Error: " . $conn->connect_error);
}

$sql = "SELECT * FROM profesionals";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
  $contador = 0;
  while ($fila = $resultado->fetch_assoc()) {
    if ($contador % 3 === 0) {
      if ($contador > 0) {
        echo '</div>'; // Cierre del grupo anterior
      }
      echo '<div class="card-group">'; // Apertura de nuevo grupo
    }

    echo '<div class="mw-100">
        <div class="card">
        <div class="face front">
            <img src='.$fila["image"].' alt="">
            <h3>'.$fila["nombre"].'</h3>
        </div>
        <div class="face back">
            <h3>'.$fila["nombre"].'</h3>
            <p>'.$fila["texto"].'</p>
            <div class="link">
                <a href=pros.php?id='.$fila["pros_id"].'>Details</a>
            </div>
        </div>
        </div>
      </div>';

    $contador++;
  }

  echo '</div>'; // Cierre del último grupo
}

$conn->close();
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>