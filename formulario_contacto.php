<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
    <link rel="stylesheet" href="css/estiloFormulario.css">
</head>
<body>
    <div class="container">
        <h2>Formulario de Contacto</h2>
        <form id="formulario" method="post" action="procesar_formulario.php" enctype="multipart/form-data">
        <input type="hidden" name="oferta_id" value="<?php echo $_GET['id']; ?>">
            <div class="form-row">
                <div class="input-data">
                    <label for="nombre">Nombre:</label><br>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
            </div>

            <div class="form-row">
                <div class="input-data">
                    <label for="apellidos">Apellidos:</label><br>
                    <input type="text" id="apellidos" name="apellidos" required>
                </div>
            </div>

            <div class="form-row">
                <div class="input-data">
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" required>
                </div>
            </div>

            <div class="form-row">
                <div class="input-data">
                    <label for="telefono">Teléfono:</label><br>
                    <input type="tel" id="telefono" name="telefono">
                </div>
            </div>

            <div class="form-row">
                <div class="input-data textarea">
                    <label for="descripcion">Descripción:</label><br>
                    <textarea id="descripcion" name="descripcion" rows="4" cols="50" required></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="input-data">
                    <label for="curriculum">Currículum:</label><br>
                    <input type="file" required id="curriculum" name="curriculum">
                </div>
            </div>

            <div class="form-row">
                <div class="input-data">
                    <label for="archivo_interes">Archivo de interés:</label><br>
                    <input type="file" id="archivo_interes" name="archivo_interes">
                </div>
            </div>

            <div class="form-row submit-btn">
                <div class="input-data">
                    <div class="inner"></div>
                    <input type="submit" value="Enviar">
                </div>
        </form>
    </div>
    <script src="validarformulario.js"></script>
</body>
</html>
