<?php
/**
 * Nou.php
 * 
 * Permet afegir un nou producte a la base de dades.
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
 * Procesar el formulario y agregar un nuevo producto
 * 
 * @return void
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $descripcio = $_POST["descripcio"];
    $preu = $_POST["preu"];
    $categoria_id = $_POST["categoria_id"];

    // Consulta SQL para insertar un nuevo producto
    $sql = "INSERT INTO productes (nom, descripció, preu, categoria_id) VALUES ('$nom', '$descripcio', $preu, $categoria_id)";

    // Ejecutar la consulta SQL
    if ($conexion->query($sql) === TRUE) {
        echo "Producte afegit correctament.";
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
    <title>Afegir nou producte</title>
</head>
<body>
    <h2>Afegir nou producte</h2>
    <form method="POST">
        Nom del producte: <input type="text" name="nom" required><br>
        Descripció: <textarea name="descripcio" required></textarea><br>
        Preu: <input type="number" step="0.01" name="preu" required><br>
        Categoria: <input type="number" name="categoria_id" required><br>
        <input type="submit" value="Afegir producte">
    </form>
</body>
</html>
