<?php

if(!empty($_POST["submit"])){
    if(empty($_POST["usuario"])and empty($_POST["contra"])){
        
        echo '<b><div>HACE FALTA INGRESAR UN USUARIO Y CONTRASEÑA</div></b>';

    } else{
        $usuario=$_POST["usuario"];
        $contra=$_POST["contra"];
        $sql=$conn->query("select * from csconf.users where nombre='$usuario' and password='$contra'");
        if ($datos=$sql->fetch_object()){
            header("location:index.php");
        } else{
            echo '<b><div>EL USUARIO O LA CONTRASEÑA SON INCORRECTOS</div></b>';
        }
    }
}
?>