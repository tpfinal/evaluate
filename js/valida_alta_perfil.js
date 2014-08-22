

/* VALIDACION DE TODO EL RESTO DEL FORMULARIO */
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $('#abm_perfil').validate({
                rules: {
                    nombre_perfil: {
                        required: true,
                    },
					descripcion_perfil: {
                        required: true
                    }
                },
				
                messages: {
                    nombre_perfil: "Ingrese un nombre",
                    descripcion_perfil: "Ingrese una descripcion"								
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