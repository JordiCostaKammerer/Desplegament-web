<?php
/**
 * Elimina.php
 * 
 * Permet eliminar un producte seleccionat de la base de dades.
 * 
 * PHP version 8.2
 * 
 * @category ECommerce
 * @package  LaMevaBotiga
 * @author   Jordi Costa Kammerer <jordicosta@paucasesnovescifp.cat>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/JordiCostaKammerer/Desplegament-web
 */

// Incluir el archivo de conexión
include 'Connexio.php';

// Crear una instancia de la conexión
$conexion = (new Connexio())->obtenirConnexio();

/**
 * Procesar la solicitud y eliminar un producto
 * 
 * @return void
 */
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

