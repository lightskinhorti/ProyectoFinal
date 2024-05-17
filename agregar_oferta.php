<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Nueva Oferta</title>
    <link rel="stylesheet" href="css/estiloInsertarTrabajo.css">
</head>
<body>

<?php include 'cabecera.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Recuperar los datos del formulario
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];

    // Preparar la consulta SQL para insertar la nueva oferta de trabajo
    $sql = "INSERT INTO ofertas_trabajo (titulo, descripcion) VALUES ('$titulo', '$descripcion')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Nueva oferta de trabajo añadida correctamente.";
        // Redirigir a la página contratar_personal.php después de 1.5 segundos
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'contratar_personal.php';
                }, 1500);
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>

<div class="container">
    <h2>Añadir Nueva Oferta</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>
        </div>
        <button type="submit">Agregar Oferta</button>
    </form>
</div>

</body>
</html>
