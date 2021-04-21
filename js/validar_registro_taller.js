$(document).ready(function() {

    $("#almacenar").click(function(e) {
        $("#form_almacenar").submit();
    });

    $("#form_almacenar").validate({
        rules: {
            taller_nombres: "required",
            taller_celular: {
                required: true,
            },
            taller_correo: {
                required: true,
                email: true,
            }
        },
        messages: {
            taller_nombres: "* Campo requerido. Ingrese nombres",
            taller_celular: {
                required: "* Campo requerido. Ingrese numero celular Ejemplo (0994725021)",
            },
            taller_correo: {
                required: "* Campo requerido. Ingrese email válido",
                email: "* Ingrese correo electrónico válido  ejm: name@domain.com",
            },
        }
    });

});