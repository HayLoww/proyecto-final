<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    // DEBERIA DE SALIR ESTE ERROR PERO NO SALE XD
    echo '<script language="javascript">alert("Introduce el usuario y la contraseña para acceder a esta pagina");</script>';
    header('Location: login.php');
    exit;
}
?>

<html lang="es">
<head>
    <title> Listado de peludines</title>
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

<h1>INSERTA LOS DATOS DEL MODELO DE VISTA</h1>

<?php
    $conn = new mysqli("localhost", "javi", "Proyecto_2023", "csconf");

    $sql = "SELECT * FROM csconf.configs where id= ". $_SESSION["id"];

    $resultado = $conn->query($sql);

/*    if (isset($_POST["crear"])) {
        // Obtener los datos del formulario
        $fov = $_POST['fov'];
        $offsetx = $_POST['offsetx'];
        $offsety = $_POST['offsety'];
        $offsetz = $_POST['offsetz'];
        $presetpos = $_POST['presetpos'];
        $shiftleftamt = $_POST['shiftleftamt'];
        $shiftrightamt = $_POST['shiftrightamt'];
        $recoil = $_POST['recoil'];
        $fov = $_POST['fov'];
        $righthand = $_POST['righthand'];
        $user_id = $_POST['user_id'];

        // Obtener el ID del usuario desde la sesión
        $usuario_id = $_SESSION['usuario_id'];

        echo $usuario_id;
        // Insertar los datos en las tablas teclado y raton
        $conn->query("INSERT INTO viewmodeluser (FOV, OffsetX, OffsetY, OffsetZ, PresetPos, ShiftLeftAmt, ShiftRightAmt, Recoil, RightHand, user_id)
                    VALUES ('$FOV', '$OffsetX', '$OffsetY', '$OffsetZ', '$PresetPos', '$ShiftLeftAmt', '$ShiftRightAmt', '$Recoil', '$RightHand', '$usuario_id')");

        // Redirigir al usuario a la página de éxito o a cualquier otra página deseada

        exit;
    }
*/?>

<form action="" method="post" enctype="multipart/form-data">
DPI <input type="text" name="fov">
<br>
Sensitivity <input type="text" name="offsetx">
<br>
eDPI <input type="text" name="offsety">
<br>
ZoomSensitivity <input type="text" name="offsetz">
<br>
Hz <input type="text" name="presetpos">
<br>
WindowsSensitivity <input type="text" name="shiftleftamt">
<br>
RawInput <input type="text" name="shiftrightamt">
<br>
MouseAcceleration <input type="text" name="recoil">

<br><br>
<input type="submit" value="Crear" name="crear">

</form>


</body>
</html>