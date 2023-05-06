<?php

if(!empty($_POST["submit"])){
    if(empty($_POST["usuario"]) || empty($_POST["contra1"]) || empty($_POST["contra2"])){
        
        echo '<b><div>HACE FALTA INGRESAR UN USUARIO Y CONTRASEÑA</div></b>';

    } else if (($_POST["contra1"]) != ($_POST["contra2"])){

        echo '<b><div>LAS CONTRASEÑAS NO COINCIDEN</div></b>';
        
    } else {
        $usuario=$_POST["usuario"];
        $contra=$_POST["contra1"];
        $sql = "insert into users (nombre, password, fecha_reg) values ('".$usuario."', '".$contra."', NOW())";
        $conn->query($sql);
        header("location:login.php");
        die();
    }
}
?>