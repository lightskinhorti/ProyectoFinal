<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Ofertas de Trabajo</title>
    <link rel="stylesheet" href="css/estiloContratar.css">
</head>
<body>

<?php include 'cabecera.php';
// Conexión a la base de datos
$servername = "localhost";
$username = "examenmarcas";
$password = "examenmarcas";
$database = "proyectofinal";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta SQL para obtener las ofertas de trabajo
$sql = "SELECT Identificador, titulo, descripcion FROM ofertas_trabajo";
$result = $conn->query($sql);
?>

<div class="container">
    <?php
    // Mostrar las ofertas de trabajo
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='job-offer'>";
            echo "<h2>" . $row["titulo"] . "</h2>";
            echo "<p>" . $row["descripcion"] . "</p>";
            echo "<a href='ver_candidatos.php?Identificador=" . $row["Identificador"] . "'>Ver Candidatos</a>";
            echo "</div>";
        }

    } else {
        echo "No hay ofertas de trabajo disponibles.";
    }
    ?>
</div>

<div class="add-offer-button">
    <a href="agregar_oferta.php" class="add-offer-link">Agregar Nueva Oferta</a>
</div>

<?php
// Cerrar la conexión a la base de datos
$conn->close();
?>
</body>
</html>
