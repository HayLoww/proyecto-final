<?php
// Obtener el nombre de la configuración a borrar de la URL
$nombre_configuracion = $_GET['nombre'];

// Conexión a la base de datos (ajusta los detalles de conexión según tus necesidades)
$conexion = new mysqli("nombre_servidor", "usuario", "contraseña", "nombre_basedatos");

// Borrar la configuración de las tablas correspondientes
$borrar_advuser = "DELETE FROM advuser WHERE nombre_configuracion = '$nombre_configuracion'";
$borrar_videouser = "DELETE FROM videouser WHERE id IN (SELECT id FROM advuser WHERE nombre_configuracion = '$nombre_configuracion')";
$borrar_viewmodeluser = "DELETE FROM viewmodeluser WHERE id IN (SELECT id FROM advuser WHERE nombre_configuracion = '$nombre_configuracion')";

// Ejecutar las consultas de borrado
$conexion->query($borrar_advuser);
$conexion->query($borrar_videouser);
$conexion->query($borrar_viewmodeluser);

// Verificar si se realizó el borrado correctamente
if ($conexion->affected_rows > 0) {
  echo "La configuración '$nombre_configuracion' ha sido eliminada correctamente.";
} else {
  echo "No se pudo eliminar la configuración.";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
