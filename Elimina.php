<?php
// Incluir el archivo de conexión
include 'Connexio.php';

// Crear una instancia de la conexión
$conexion = (new Connexio())->obtenirConnexio();

// Procesar la solicitud si se ha enviado un ID de producto
if (isset($_POST["id"])) {
    $id = $_POST["id"];

    // Consulta SQL para eliminar el producto
    $sql = "DELETE FROM productes WHERE id = $id";

    // Ejecutar la consulta SQL
    if ($conexion->query($sql) === TRUE) {
        echo "Producte eliminat correctament.";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Eliminar producte</title>
</head>
<body>
    <h2>Eliminar producte</h2>
    <form method="POST">
        ID del producte: <input type="number" name="id" required><br>
        <input type="submit" value="Eliminar producte">
    </form>
</body>
</html>

