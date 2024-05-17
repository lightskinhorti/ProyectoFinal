
<link rel="stylesheet" href="css/estiloRegistros.css">
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

// Verificar si se ha proporcionado un ID de oferta de trabajo en la URL
if (isset($_GET['Identificador'])) {
    $oferta_id = $_GET['Identificador'];

// Consulta SQL para obtener los formularios asociados a la oferta de trabajo
$sql = "SELECT f.* FROM formularios f WHERE f.oferta_id = $oferta_id";

    $result = $conn->query($sql);

    // Mostrar los formularios asociados a la oferta de trabajo
    if ($result->num_rows > 0) {
        echo "<div class='container'>";
        $count = 0;
        while($row = $result->fetch_assoc()) {
            echo "<div class='form-container'>";
            echo "<div class='form'>";
            echo "<h2>Formulario de:</h2>";
            echo "<p><strong>Nombre:</strong> " . $row["nombre"] . "</p>";
            echo "<p><strong>Apellidos:</strong> " . $row["apellidos"] . "</p>";
            echo "<p class='email' id='email-" . $count . "'><strong>Email:</strong> " . $row["email"] . "</p>";
            echo "<p><strong>Teléfono:</strong> " . $row["telefono"] . "</p>";
            echo "<p><strong>Descripción:</strong> " . $row["descripcion"] . "</p>";
            echo "<button class='boton-azul'><a href='archivos/" . $row["curriculum"] . "' target='_blank'>Ver Currículum</a></button>";
            echo "<button class='boton-azul'><a href='archivos/" . $row["archivo_interes"] . "' target='_blank'>Ver Archivo de Interés</a></button>";
            echo "<button class='boton-azul' id='boton-contacto-" . $count . "'>Contacto</button>";
            echo "</div>"; // Cierre del div .form
            echo "</div>"; // Cierre del div .form-container
            $count++;
        }
        echo "</div>"; // Cierre del div .container
    } else {
        echo "No hay formularios asociados a esta oferta de trabajo.";
    }
} else {
    echo "ID de oferta de trabajo no proporcionado.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
<script src="js/contacto.js"></script>