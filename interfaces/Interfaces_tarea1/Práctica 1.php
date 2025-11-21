<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Resultado del Formulario</title>
</head>
<body>
<?php
// Verificamos si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Capturamos datos
    $Nombre = isset($_POST["Nombre"]) ? $_POST["Nombre"] : '';
    $Descripcion = isset($_POST["Descripción"]) ? $_POST["Descripción"] : '';
    $Anadir = isset($_POST["Añadir"]) ? true : false;
    $Precio = isset($_POST["Precio"]) ? $_POST["Precio"] : '';
    $Impuestos = isset($_POST["Impuestos"]) ? $_POST["Impuestos"] : '';
    $Categoria = isset($_POST["Categoría"]) ? $_POST["Categoría"] : '';
    $Promocion = isset($_POST["Promoción"]) ? $_POST["Promoción"] : '';

    // Mostramos los datos
    echo "<h2>Datos recibidos:</h2>";
    echo "<p><b>Nombre:</b> $Nombre</p>";
    echo "<p><b>Descripción:</b> $Descripcion</p>";
    echo "<p><b>Añadir contador:</b> " . ($Anadir ? "Sí" : "No") . "</p>";
    echo "<p><b>Precio:</b> $Precio €</p>";
    echo "<p><b>Impuestos:</b> $Impuestos</p>";
    echo "<p><b>Categoría:</b> $Categoria</p>";
    echo "<p><b>Promoción:</b> $Promocion</p>";

} else {
    echo "<p>No se han enviado datos.</p>";
}
?>
</body>
</html>
