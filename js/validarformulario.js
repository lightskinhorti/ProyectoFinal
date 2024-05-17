
        // Agregar evento de escucha al formulario
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            // Obtener los valores de los campos del formulario
            var nombre = document.getElementById('nombre').value;
            var apellidos = document.getElementById('apellidos').value;
            var email = document.getElementById('email').value;
            var curriculum = document.getElementById('curriculum').files;

            // Validar el campo de correo electrónico
            if (!validateEmail(email)) {
                alert('La dirección de correo electrónico no es válida.');
                event.preventDefault(); // Evitar que el formulario se envíe
            }
            
});

        // Función para validar el formato de correo electrónico
        function validateEmail(email) {
            var re = /\S+@\S+\.\S+/;
            return re.test(email);
        }
        // Función para validar el tipo de archivo del curriculum
    function isValidFile(file) {
    var allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
    return allowedTypes.includes(file.type);
}
