$(document).ready(function() {
    const reglasValidacion = {
        email: {
            required: true,
            email: true
        },
        password: {
            required: true
        }
    };

    const mensajesValidacion = {
        email: {
            required: "Por favor, ingrese su correo electrónico",
            email: "Por favor, ingrese un correo electrónico válido"
        },
        password: {
            required: "Por favor, ingrese su contraseña"
        }
    };

    $("#loginForm").validate({
        rules: reglasValidacion,
        messages: mensajesValidacion,
        errorElement: 'span',
        errorPlacement: function(error, element) {
            
            error.addClass('text-red-500 text-sm mt-1');
            error.insertAfter(element);
        },
        submitHandler: function(formulario) {
      
            formulario.submit();
        }
    });


});
