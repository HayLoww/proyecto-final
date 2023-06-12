<!DOCTYPE html>
<html>
<head>
   <title>CSCONF</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <link rel="stylesheet" type="text/css" href="estilos.css">
   <script src="script.js"></script>
<style type="text/css">




    body {
        text-align: center;
        background: linear-gradient(#2b2b36,80%, rgb(68, 1, 77));

    }


    form{
        margin-top: 60px;
        color: white;
        font-weight:bold;
        text-shadow: 4px 4px 4px black;
        font-size: 23px;
        
    }
    


    input[type=number] {
        padding: 7px 10px;
        margin: 20px 10px;
        box-sizing: border-box;
        box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.15);
        font-size: 110%;
        width: 30%;
        height: 40px;
        text-align:center;
        border-radius: 15px;
    }

    input[type=email] {
        padding: 7px 10px;
        margin: 20px 10px;
        box-sizing: border-box;
        box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.15);
        font-size: 110%;
        width: 30%;
        height: 40px;
        text-align:center;
        border-radius: 15px;

    }

    input[type=text] {
        padding: 7px 10px;
        margin: 20px 10px;
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
        margin: 20px 10px;
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
        height: 60px;
        font-size: 105%;
        background-color: #4B0082;
        text-shadow: 4px 4px 4px black;
        color: white;
        box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.15);
        border-style:solid;
        border-color: black;
        border-radius: 5px;
        font-weight:bold;
        margin-bottom:100px;
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

    h1{
        color:green;
        text-shadow: 4px 4px 4px black;
        margin-bottom:100px;
        font-size:40px;
        margin-top:-50px;
    }

    </style>"
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

   <h1>COMPLETA TU PERFIL</h1>

    <form action="" method="post" enctype="multipart/form-data">
        Email <br> <input type="email" name="email" placeholder="Ingresa tu email">
        <br>
        Edad <br> <input type="number" name="edad" placeholder="Ingresa tu edad">
        <br>
        Telefono <br> <input type="number" name="telef" placeholder="Ingresa tu telefono">
        <br>
        Direccion <br> <input type="text" name="direc" placeholder="Ingresa tu dirección">
        <br>
        Contraseña<br> <input type="password" name="contra1" placeholder="Ingresa tu contraseña">
        <br>

        <p style="margin-bottom:-20px;">Foto</p>
        <input type="file" id="inputarchivo" name="imagen" style=" margin-top:50px; margin-bottom:30px;" >
        <br>


        <br><br>

        <input type="submit" value="Confirmar datos" name="submit">
    </form>

<?php
    $conn = new mysqli("localhost", "javi", "Proyecto_2023", "csconf");

    if ($conn->connect_error) {
        die("Error: " . $conn->connect_error);
    }

    if (!empty($_POST["submit"])) {
        if (empty($_POST["email"]) || empty($_POST["edad"]) || empty($_POST["telef"]) || empty($_POST["contra1"]) || empty($_POST["direc"]) || empty($_FILES["imagen"]["tmp_name"])) {
            echo '<script src="datosinc.js"></script>';

        } else {
            $email = $_POST["email"];
            $edad = $_POST["edad"];
            $telef = $_POST["telef"];
            $direc = $_POST["direc"];
            $password = $_POST["contra1"];
            $_SESSION["contra"] = $password;
            $contra_cifrada = password_hash($password, PASSWORD_DEFAULT);// Cifra la contraseña

            // EL "time()" GARANTIZA QUE EL ARCHIVO DE LA IMAGEN SEA ÚNICO
            $nombre_imagen = time() . '_' . $_FILES["imagen"]["name"];

            // AQUÍ GUARDO LA RUTA DE LA IMAGEN
            $ruta_imagen = "imagenes/" . $nombre_imagen;

            // AQUÍ USO EL "move_uploaded_file" PARA MOVER EL ARCHIVO TEMPORAL A LA RUTA
            // ANTES ESPECIFICADA
            move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta_imagen);

            $sql = "UPDATE users SET password='".$contra_cifrada."', email='" . $email . "', edad=" . $edad . ", telefono=" . $telef . ", direccion='" . $direc . "', image='" . $ruta_imagen . "' WHERE id=" . $_SESSION["id"];

            $conn->query($sql);
            $conn->close();
            echo '<meta http-equiv="refresh" content="5;url=userinfo.php">';
            echo '<script src="datos.js"></script>';
            exit();
        }
    }

?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>
