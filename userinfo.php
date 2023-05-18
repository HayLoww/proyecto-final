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

            if(empty($_SESSION['usuario'])){
                echo '<a href="login.php">Login</a>';
            } else {
                echo 
                '<li class="dropdown"><a href="kennys.php">'. $_SESSION["usuario"] . '</a>
                <ul class="submenu">
                <li><a href="logout.php">Cerrar sesion</a></li>
                </ul>';
            }?></li>
    </ul>
    </nav>

   </header>

   <div>
    Nombre de usuario: 
    <?php
    echo $_SESSION["usuario"]
    ?>
   </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>