<html lang="es">
<head>
    <title> Inicio</title>
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
        margin-top:40px;
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
        <li><a href="login.php">Login</a></li>
    </ul>
    </nav>
    </header>
    <h1>Registro</h1>

    <?php

        $conn=new mysqli("localhost","javi", "Proyecto_2023", "csconf");

    ?>

    <form action="" method="post">
         Usuario <br> <input type="text" name="usuario" placeholder="Ingresa tu usuario">
        <br>
        Contraseña<br> <input type="password" name="contra1" placeholder="Ingresa tu contraseña">
        <br>
        Confirme contraseña<br> <input type="password" name="contra2" placeholder="Ingresa tu contraseña">
        <br>
        <input type="submit" value="Entrar" name="submit">
        <?php
            include("controlador_reg.php");
        ?>
    </form>

</body>
<footer>
<?php
        echo "JAVIER MEDINA QUINTARIO " . date("d/m/Y"); 
?>
</footer>
</html>