// Obtener todos los botones de contacto
var buttons = document.querySelectorAll('.boton-azul');

// Agregar un controlador de eventos click a cada botón
buttons.forEach(function(button) {
    button.addEventListener('click', function() {
        // Obtener el identificador único del botón de contacto
        var buttonId = this.id.split('-')[2]; // El tercer elemento después de dividir por '-'

        // Obtener la dirección de correo electrónico correspondiente al identificador único
        var emailElement = document.getElementById('email-' + buttonId);
        var email = emailElement.textContent.trim(); // Eliminar espacios en blanco alrededor del correo electrónico

        // Crear el enlace para abrir el cliente de correo electrónico
        var subject = 'Asunto del correo';
        var body = 'Cuerpo del correo';
        var mailtoLink = 'mailto:' + email + '?subject=' + encodeURIComponent(subject) + '&body=' + encodeURIComponent(body);

        // Abrir el cliente de correo electrónico
        window.location.href = mailtoLink;
    });
});
