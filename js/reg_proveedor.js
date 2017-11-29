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
				remote: $("#base_url").val() + "validaciones/prov/" + prv_id + "/t/"+deque
			},
			prv_email: {
				required: true,
				email: true,
				remote: $("#base_url").val() + "validaciones/prov/" + prv_id + "/e/"+deque
			},
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
		}
	});




});
