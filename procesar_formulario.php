<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar los datos del formulario
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $descripcion = $_POST["descripcion"];
    $oferta_id = $_POST["oferta_id"]; // Identificador de la oferta de trabajo
    $curriculum = $_FILES["curriculum"]["name"]; // Nombre del archivo del currículum
    $archivo_interes = $_FILES["archivo_interes"]["name"]; // Nombre del otro archivo de interés

    // Guardar los archivos en el servidor (opcional)
    $ruta_curriculum = "archivos/curriculums" . basename($curriculum);
    $ruta_archivo_interes = "archivos/archivos_interes" . basename($archivo_interes);
    move_uploaded_file($_FILES["curriculum"]["tmp_name"], $ruta_curriculum);
    move_uploaded_file($_FILES["archivo_interes"]["tmp_name"], $ruta_archivo_interes);

    // Guardar los datos en la base de datos
    $servername = "localhost";
    $username = "examenmarcas";
    $password = "examenmarcas";
    $database = "proyectofinal";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Preparar la consulta SQL para insertar datos en la tabla de formularios
    $sql = "INSERT INTO formularios (nombre, apellidos, email, telefono, descripcion, oferta_id, curriculum, archivo_interes)
            VALUES ('$nombre', '$apellidos', '$email', '$telefono', '$descripcion', '$oferta_id', '$curriculum', '$archivo_interes')";

    if ($conn->query($sql) === TRUE) {
        echo "Formulario enviado correctamente";
        header("refresh:2; url=buscar_trabajo.php"); // Redirigir después de 5 segundos
        exit; // Salir del script después de la redirección
    } else {
        echo "Error al enviar el formulario: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>
