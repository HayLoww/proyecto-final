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
   <div>
      <h1 id="titulo">CSCONF</h1>

      <div id="texto">
        <p>
          Bienvenido a CSCONF, en esta página encontrarás toda la información que necesites sobre las armas del videojuego “Counter Strike:Global Offensive” y encontrarás las configuraciones de los mejores jugadores de este videojuego.
        </p>
        <p>Esta pagina ha sido creada para informar y ayudar a los jugadores a tener una mejor experiencia de cara a jugar a "CSGO" ya sea pudiendo guardar tus configuraciones y poder ver las de tus jugadores favoritos, poder tener información adicional sobre las armas de este videojuego o incluso poder configurar tu propia "Crosshair" para luego importarla al juego.</p>
      </div>

      <div id="logo" >
      <video id="miVideo" width="680" autoplay loop muted>
        <source src="csconf.mp4" type="video/mp4" >
        Tu navegador no soporta el elemento de video.
      </video>
      </div>
</div>
<hr>

<h1 id="titulo2">Configuraciones</h1>

<!--  CAROUSEL  -->
<div id="configsini">

  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="imagenes/s1mple.jpg" class="d-block w-100" alt="gatico 1">
      </div>
      <div class="carousel-item">
        <img src="imagenes/niko.jpg" class="d-block w-100" alt="gato 2">
      </div>
      <div class="carousel-item">
        <img src="imagenes/monesy.jpg" class="d-block w-100" alt="gato 3">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>
  <div id="texto2">
    <p>¿Quieres saber cómo juegan los mejores jugadores de Counter Strike:Global Offensive? Deja de buscar, ya que CSCONF te ofrece una variedad de configuraciones de los mejores jugadores de Counter Strike y la posibilidad de poder crear tus propias configuraciones
</p>
  </div>
</div>

<hr>

<h1 id="titulo3">Armas</h1>

<div id="armas">
  <div id="texto3">
    <p>¿Quieres saber información adicional sobre las armas de Counter Strike:Global Offensive? En CSCONF encontrarás información que te será útil en el caso de que quieras saber cosas como, por ejemplo, el precio de las armas, cuantas balas dispone cada arma o en qué bando se puede utilizar.</p>
  </div>
  <div class="mw-100">
    <img id="fotoarma" src="imagenes/dragonlore.jpg" alt="gato">
  </div>
</div>

<hr>

<h1 id="titulo4">Crosshair</h1>

<div id="armas">
<div class="mw-100">
    <img id="fotoarma" src="imagenes/crosshair-port.jpg" alt="gato">
  </div>
  <div id="texto4">
    <p>¿Has buscado como cambiar tu crosshair pero no encuentras ninguna pagina que te sea util? Tranquilo, CSCONF te ofrece una herramienta muy completa para que pruebes todo tipo de miras en cualquier tipo de mapas para que puedas ver cual se adecúa mas a x mapa o x situacion. </p>
    <p>Además esta herramienta te ofrece la opción de crear tus propios bindeos para que, al pulsar el botón que quieras, se te cambie "In game" la mira, cosa útil para situaciones en las que se requieran una mira más oscura o mas clara</p>

  </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>