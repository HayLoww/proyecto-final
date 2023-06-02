<!DOCTYPE html>
<html>
<head>
   <title>CSCONF</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="estilos.css">
   <style>
      #fotosarmas {
         display: flex;
         flex-wrap: wrap;
         justify-content: center;
         margin-top: 10px;
         margin-bottom: 50px;
      }

      .tabla-armas {
         display: flex;
         flex-wrap: wrap;
         justify-content: center;
         margin-bottom: 20px;
         gap: 20px;
      }

      .tabla-armas .arma {
         margin-right: 80px;
         margin-bottom: 20px;
         box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
         transition: transform .5s;
         width: 400px;
         border-radius: 15px;
         overflow: hidden;
      }

      .tabla-armas .arma:hover {
         transform: scale(1.1);
      }

      .tabla-armas .arma img {
         width: 100%;
         height:100%;
         border-radius: 15px;
         object-fit: cover;
      }

      a{
        color:white;
        text-decoration:none;
      }
   </style>
   <script src="script.js"></script>
</head>
<body>
   <header>
   <nav>
    <ul class="menu">
        <li><a href="index.php">Inicio</a></li>
        <li><a href="configs.php">Configuraciones</a></li>
        <li><a href="crosshair/index.php">Crosshair</a></li>
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

   <div id="contenido">
      <div id="port">
         <h1 id="tituloconf">ARMAS</h1>
         <div id="textoconf">
            <p>Minions ipsum para tú poulet tikka masala po kass pepete. Jeje potatoooo po kass chasy pepete po kass gelatooo aaaaaah belloo! Chasy. Chasy tatata bala tu po kass bananaaaa butt butt. Uuuhhh jiji bee do bee do bee do uuuhhh chasy tatata bala tu la bodaaa. Poopayee wiiiii baboiii bee do bee do bee do. Gelatooo bananaaaa poopayee para tú tatata bala tu pepete wiiiii. Bee do bee do bee do tank yuuu! Gelatooo baboiii poopayee po kass wiiiii tulaliloo po kass jeje tatata bala tu. Aaaaaah hana dul sae hana dul sae poulet tikka masala daa bananaaaa bee do bee do bee do jiji po kass la bodaaa potatoooo. Bananaaaa tulaliloo ti aamoo! Pepete me want bananaaa! Potatoooo wiiiii.</p>
         </div>
      </div>
      <div id="fotosarmas">
         <div class="tabla-armas">
            <?php
            // Conexión a la base de datos
            $conn = new mysqli("localhost", "javi", "Proyecto_2023", "csconf");
            if ($conn->connect_error) {
               die("Error: " . $conn->connect_error);
            }

            // Consulta para obtener las armas
            $sql = "SELECT * FROM armas";
            $resultado = $conn->query($sql);

            // Recorrer los resultados y mostrar en la tabla
            while ($fila = $resultado->fetch_assoc()) {
               echo '<div class="arma">';
               echo '<a href="arma.php?id=' . $fila['id'] . '""><img src="' . $fila['image'] . '" alt="' . $fila['nombre'] . '"></a>';
               echo '<div id="jug1">';
               echo '<h1 id="jugs">' . $fila['nombre'] . '</a></h1>';
               echo '</div>';
               echo '</div>';
            }

            // Cerrar conexión
            $conn->close();
            ?>
         </div>
      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>