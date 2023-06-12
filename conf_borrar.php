<?php

$conn = new mysqli("localhost", "javi", "Proyecto_2023", "csconf");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clases</title>

</head>
<body>
<?php

    $sql = 'DELETE FROM mouseuser WHERE id=' . $_GET['id'];
    $conn->query($sql);
    $sql = 'DELETE FROM crosshairuser WHERE id=' . $_GET['id'];
    $conn->query($sql);
    $sql = 'DELETE FROM viewmodeluser WHERE id=' . $_GET['id'];
    $conn->query($sql);
    $sql = 'DELETE FROM videouser WHERE id=' . $_GET['id'];
    $conn->query($sql);
    $sql = 'DELETE FROM advuser WHERE id=' . $_GET['id'];
    $conn->query($sql);
    $sql = 'DELETE FROM configurations WHERE config_id=' . $_GET['id'];
    $conn->query($sql);

    header("Location: lista_configs.php");

    die();

?>

</body>
</html>
