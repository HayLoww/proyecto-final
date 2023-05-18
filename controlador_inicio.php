<?php
session_start();

if(!empty($_POST["submit"])){
    if(empty($_POST["usuario"])and empty($_POST["contra"])){
        
        echo '<b><div>HACE FALTA INGRESAR UN USUARIO Y CONTRASEÑA</div></b>';

    } else{
        $usuario=$_POST["usuario"];
        $contra=$_POST["contra"];
        $sql=("select * from csconf.users where nombre='$usuario' and password='$contra'");
        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0){
            $_SESSION['usuario'] = $usuario;
            $_SESSION['contra'] = $contra;
            $id="select * from csconf.users where nombre='$usuario'";
            $resultadoid =$conn->query($id);
            $fila = $resultadoid->fetch_assoc();
            $_SESSION["id"]= $fila["id"];
            header("location:index.php");
        } else{
            echo '<b><div>EL USUARIO O LA CONTRASEÑA SON INCORRECTOS</div></b>';
        }
    }
}
?>