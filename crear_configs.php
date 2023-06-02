<html lang="es">
<head>
    <title> Listado de peludines</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
        width: 50%;
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
        width: 100%;
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
    
    #view{
        color:white;
        width:100%;
        position:relative;
    }
    
    .view-container {
        margin-bottom: 20px;
    }

    </style>
</head>
<body>

<h1>INSERTA LOS DATOS DEL MODELO DE VISTA</h1>

<form action="guardar_configuracion.php" method="POST" >
Nombre de la configuración:
<input type="text" name="nombre" required><br>    <div class="row view-container">
        <div class="col-lg-4 col-md-6 mb-4">
            <h1>VIEWMODEL</h1>
            DPI <br> <input type="text" name="fov">
            <br>
            Sensitivity <br>  <input type="text" name="offsetx">
            <br>
            eDPI <br> <input type="text" name="offsety">
            <br>
            ZoomSensitivity <br> <input type="text" name="offsetz">
            <br>
            Hz <br> <input type="text" name="presetpos">
            <br>
            WindowsSensitivity <br> <input type="text" name="shiftleftamt">
            <br>
            RawInput <br> <input type="text" name="shiftrightamt">
            <br>
            MouseAcceleration <br> <input type="text" name="recoil">
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <h1>VIEWMODEL</h1>
            DPI <br> <input type="text" name="fov">
            <br>
            Sensitivity <br>  <input type="text" name="offsetx">
            <br>
            eDPI <br> <input type="text" name="offsety">
            <br>
            ZoomSensitivity <br> <input type="text" name="offsetz">
            <br>
            Hz <br> <input type="text" name="presetpos">
            <br>
            WindowsSensitivity <br> <input type="text" name="shiftleftamt">
            <br>
            RawInput <br> <input type="text" name="shiftrightamt">
            <br>
            MouseAcceleration <br> <input type="text" name="recoil">
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <h1>VIEWMODEL</h1>
            DPI <br> <input type="text" name="fov">
            <br>
            Sensitivity <br>  <input type="text" name="offsetx">
            <br>
            eDPI <br> <input type="text" name="offsety">
            <br>
            ZoomSensitivity <br> <input type="text" name="offsetz">
            <br>
            Hz <br> <input type="text" name="presetpos">
            <br>
            WindowsSensitivity <br> <input type="text" name="shiftleftamt">
            <br>
            RawInput <br> <input type="text" name="shiftrightamt">
            <br>
            MouseAcceleration <br> <input type="text" name="recoil">
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <h1>VIEWMODEL</h1>
            DPI <br> <input type="text" name="fov">
            <br>
            Sensitivity <br>  <input type="text" name="offsetx">
            <br>
            eDPI <br> <input type="text" name="offsety">
            <br>
            ZoomSensitivity <br> <input type="text" name="offsetz">
            <br>
            Hz <br> <input type="text" name="presetpos">
            <br>
            WindowsSensitivity <br> <input type="text" name="shiftleftamt">
            <br>
            RawInput <br> <input type="text" name="shiftrightamt">
            <br>
            MouseAcceleration <br> <input type="text" name="recoil">
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <h1>VIEWMODEL</h1>
            DPI <br> <input type="text" name="fov">
            <br>
            Sensitivity <br>  <input type="text" name="offsetx">
            <br>
            eDPI <br> <input type="text" name="offsety">
            <br>
            ZoomSensitivity <br> <input type="text" name="offsetz">
            <br>
            Hz <br> <input type="text" name="presetpos">
            <br>
            WindowsSensitivity <br> <input type="text" name="shiftleftamt">
            <br>
            RawInput <br> <input type="text" name="shiftrightamt">
            <br>
            MouseAcceleration <br> <input type="text" name="recoil">
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <h1>VIEWMODEL</h1>
            DPI <br> <input type="text" name="fov">
            <br>
            Sensitivity <br>  <input type="text" name="offsetx">
            <br>
            eDPI <br> <input type="text" name="offsety">
            <br>
            ZoomSensitivity <br> <input type="text" name="offsetz">
            <br>
            Hz <br> <input type="text" name="presetpos">
            <br>
            WindowsSensitivity <br> <input type="text" name="shiftleftamt">
            <br>
            RawInput <br> <input type="text" name="shiftrightamt">
            <br>
            MouseAcceleration <br> <input type="text" name="recoil">
        </div>
        
    </div>
    <br><br>
    <input type="submit" value="Crear" name="crear">

</form>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
