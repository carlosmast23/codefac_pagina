$(document).ready(function() {

	if ($(".chosen-select").length)
		$(".chosen-select").chosen({no_results_text: "No existe informacion", width: "80%"});

	$("#almacenar").click(function (e) {
		$("#form_almacenar").submit();
	});

	var prv_id=$("#prv_id").val();
	var deque=$("#deque").val();


	$("#form_almacenar").validate({
		rules: {
			prv_nombres: "required",
			prv_apellidos: "required",
			prv_convencional: "required",
			prv_direccion: "required",
			prv_celular: {
				required: true,
				remote: $("#base_url").val() + "index.php/validaciones/prov/" + prv_id + "/t/"+deque
			},
			prv_email: {
				required: true,
				email: true,
				remote: $("#base_url").val() + "index.php/validaciones/prov/" + prv_id + "/e/"+deque
			},
			prv_clave: "required",
			prv_clave2:{
				equalTo: "#prv_clave"
			}
		},
		messages: {
			prv_nombres: "* Campo requerido. Ingrese nombres",
			prv_apellidos: "* Campo requerido. Ingrese apellidos",
			prv_convencional: "* Campo requerido. Ingrese teléfono",
			prv_direccion: "* Campo requerido. Ingrese dirección",
			prv_celular: {
				required:"* Campo requerido. Ingrese numero celular (0994725020)",
				remote: "* Este numero celular ha sido usado ",
			},
			prv_email: {
				required: "* Campo requerido. Ingrese email válido",
				email: "* Ingrese correo electrónico válido  ejm: name@domain.com",
				remote: "* Este correo electrónico ya ha sido usado ",
			},
			prv_clave: "* Campo requerido. Ingrese clave",
			prv_clave2: "* Las contraseña no coinciden, ingrese nuevamente",

		}
	});


	$("#almacenar").prop("disabled", true);
	$("#acepto").click(function () {
		if ($('#acepto').prop('checked'))
			$("#almacenar").attr("disabled", false) ;
		else
			$("#almacenar").attr("disabled", true);

	});


	var longitud = false,
	minuscula = false,
	numero = false,
	mayuscula = false;
	$('input[type=password]').keyup(function() {
		var pswd = $(this).val();
		if (pswd.length < 8) {
			$('#length').removeClass('valid').addClass('invalid');
			longitud = false;
		} else {
			$('#length').removeClass('invalid').addClass('valid');
			longitud = true;
		}

    //validate letter
    if (pswd.match(/[A-z]/)) {
    	$('#letter').removeClass('invalid').addClass('valid');
    	minuscula = true;
    } else {
    	$('#letter').removeClass('valid').addClass('invalid');
    	minuscula = false;
    }

    //validate capital letter
    if (pswd.match(/[A-Z]/)) {
    	$('#capital').removeClass('invalid').addClass('valid');
    	mayuscula = true;
    } else {
    	$('#capital').removeClass('valid').addClass('invalid');
    	mayuscula = false;
    }

    //validate number
    if (pswd.match(/\d/)) {
    	$('#number').removeClass('invalid').addClass('valid');
    	numero = true;
    } else {
    	$('#number').removeClass('valid').addClass('invalid');
    	numero = false;
    }
}).focus(function() {
	$('#pswd_info').show();
}).blur(function() {
	$('#pswd_info').hide();
});


/*$("#form_almacenar").submit(function(event) {
	if(longitud && minuscula && numero && mayuscula){
		$("#form_almacenar").submit();

	}else{
		alert("Password invalido.");
		event.preventDefault();
	}

});
*/

});
