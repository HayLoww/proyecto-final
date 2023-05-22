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
   <div>
      <h1 id="titulo">CSCONF</h1>

      <div id="texto">
        <p>Minions ipsum para tú poulet tikka masala po kass pepete. Jeje potatoooo po kass chasy pepete po kass gelatooo aaaaaah belloo! Chasy. Chasy tatata bala tu po kass bananaaaa butt butt. Uuuhhh jiji bee do bee do bee do uuuhhh chasy tatata bala tu la bodaaa. Poopayee wiiiii baboiii bee do bee do bee do. Gelatooo bananaaaa poopayee para tú tatata bala tu pepete wiiiii. Bee do bee do bee do tank yuuu! Gelatooo baboiii poopayee po kass wiiiii tulaliloo po kass jeje tatata bala tu. Aaaaaah hana dul sae hana dul sae poulet tikka masala daa bananaaaa bee do bee do bee do jiji po kass la bodaaa potatoooo. Bananaaaa tulaliloo ti aamoo! Pepete me want bananaaa! Potatoooo wiiiii.</p>
      </div>

      <div id="logo">
        <video class="logo-video mostrar" src="csconf.mp4" autoplay muted loop></video>
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
        <a href="index.php"><img src="gato1.jpg" class="d-block w-100" alt="gatico 1"></a>
        <div class="carousel-caption d-none d-md-block">
          <h4>Etiqueta de la primera diapositiva</h4>
        </div>
      </div>
      <div class="carousel-item">
        <a href="index.php"><img src="gato2.jpg" class="d-block w-100" alt="gato 2"></a>
        <div class="carousel-caption d-none d-md-block">
          <h4>Etiqueta de la segunda diapositiva</h4>
        </div>
      </div>
      <div class="carousel-item">
        <a href="index.php"><img src="gato3.jpg" class="d-block w-100" alt="gato 3"></a>
        <div class="carousel-caption d-none d-md-block">
          <h4>Etiqueta de la tercera diapositiva</h4>
        </div>
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
    <p>SAKJHDBAKDBHSDOIASDJASIKJDASDPJASODSAIKDHNBSADJAS OIUDAIJ ASI HO Y IO JOI H OJ JO UB OIHUIOASHDA</p>
  </div>
</div>

<hr>

<h1 id="titulo3">Armas</h1>

<div id="armas">
  <div id="texto3">
    <p>SAKJHDBAKDBHSDOIASDJASIKJDASDPJASODSAIKDHNBSADJAS OIUDAIJ ASI HO Y IO JOI H OJ JO UB OIHUIOASHDA</p>
  </div>
  <div class="mw-100">
    <img id="fotoarma" src="gato1.jpg" alt="gato">
  </div>
</div>

<?php
var_dump($_SESSION);
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>