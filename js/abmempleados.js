/*EXTENSION QUE HICE A MANO PARA QUE VALIDE QUE SEAN SOLO LETRAS, YA QUE EL PLUGIN NO LO TRAE DE FABRICA */

jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Solo se permiten letras"); 


/* VALIDACION DE TODO EL RESTO DEL FORMULARIO */
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#abm_empleados").validate({
                rules: {
                    nombre: {
                        required: true,
						lettersonly:true
                    },
					apellido: {
                        required: true,
						lettersonly:true
                    },
					dni: {
                        required: true,
						number : true
                    },
                    email: {
                        required: true,
						email: true
                    },
					puesto: {
                        required: true
                    },
					rol:{
						required:true
					},
					
					password:{
						required:true
					},
					password_again:{
						equalTo:"#password"
					}				
					
                },
				
                messages: {
                    nombre:{
							required: "Ingrese un nombre",
							},
					apellido:{
							required: "Ingrese un apellido",
							},
                    dni: {
							required: "Ingrese su dni",
							number: "Ingrese solo numeros"
						},
                    email: {
							required: "Ingrese su email",
							email: "Formato incorrecto"
						},
                    puesto: "Ingrese un puesto",
					rol: "Debe seleccionar un rol",
					password:{
						required:"Ingrese una contrasena"
					},
					password_again:{
						equalTo:"Las contrasenas no coinciden"
					}
					
					
				
				},
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);