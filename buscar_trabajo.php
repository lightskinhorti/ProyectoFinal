<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Trabajo</title>
    <link rel="stylesheet" href="css/estiloBusqueda.css">
</head>
<body>

<?php 
include 'cabecera.php'; 

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

// Función para mostrar los resultados de la búsqueda
function mostrarResultados($termino) {
    global $conn;
    $sql = "SELECT Identificador, titulo, descripcion FROM ofertas_trabajo WHERE titulo LIKE '%$termino%' OR descripcion LIKE '%$termino%'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "<div class='container'>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class='job-offer'>";
            echo "<h2>" . $row["titulo"] . "</h2>";
            echo "<p>" . $row["descripcion"] . "</p>";
            echo "<a href='formulario_contacto.php?id=" . $row["Identificador"] . "'>Aplicar</a>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "No se encontraron resultados para: " . $termino;
    }
}

?>

<div class="container">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" name="termino" placeholder="Buscar...">
        <button type="submit">Buscar</button>
        <button type="reset">Limpiar</button>
    </form>
</div>

<?php
// Mostrar los resultados de la búsqueda si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['termino'])) {
    $termino = $_POST['termino'];
    mostrarResultados($termino);
} else {
    // Mostrar las ofertas de trabajo
    if ($result->num_rows > 0) {
        echo "<div class='container'>";
        while($row = $result->fetch_assoc()) {
            echo "<div class='job-offer'>";
            echo "<h2>" . $row["titulo"] . "</h2>";
            echo "<p>" . $row["descripcion"] . "</p>";
            echo "<a href='formulario_contacto.php?id=" . $row["Identificador"] . "'>Aplicar</a>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "No hay ofertas de trabajo disponibles.";
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

</body>
</html>
