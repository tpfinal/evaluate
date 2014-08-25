/************************** VALIDACION DEL FORMULARIO DE ALTA DE PERFIL ***********************************/
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $('#alta_perfil').validate({
                rules: {
                    nombre_perfil: {
                        required: true
                    },
					descripcion_perfil: {
                        required: true
                    }
                },
				
                messages: {
                    nombre_perfil: "Ingrese un nombre para el perfil",
                    descripcion_perfil: "Ingrese una descripcion para el perfil"					
				},
                submitHandler: function(form) {

						alert('Perfil Creado! Ahora agrega los objetivos para ese perfil.');
						window.location="nuevo_objetivo.php";


			
					
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);


/************************** VALIDACION DEL FORMULARIO DE ALTA DE OBJETIVO ***********************************/
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $('#alta_objetivo').validate({
                rules: {
					nombre_objetivo: {
                        required: true
                    },
					descripcion_objetivo: {
                        required: true
                    }
                },
				
                messages: {
					nombre_objetivo: "Ingrese un nombre para el objetivo",
                    descripcion_objetivo: "Ingrese una descripcion para el objetivo"						
				},
                submitHandler: function(form) {

						

			
					
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);