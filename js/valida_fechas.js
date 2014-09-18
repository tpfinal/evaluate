/************************** VALIDACION DEL FORMULARIO DE ALTA DE FECHAS DE EVALUACION ***********************************/
(function($,W,D)
{
    var validador = {};

    validador.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#agregar_fechas").validate({
                rules: {
					nombre_periodo: {
                        required: true
                    },
					cantidad: {
                        required: true,
						digits: true
                    },
				theDate1: {
                        required: true
                    },
				theDate2: {
                        required: true
                    }
                },
				
                messages: {
					nombre_periodo: "* Ingrese un nombre para el periodo",
                    
					cantidad:{
								required: "* Ingrese una cantidad de evaluaciones",				
								digits: "* Ingrese solo numeros en la cantidad de evaluaciones"
					}, 
					
					
                    theDate1: "* Ingrese una fecha de inicio",				
                    theDate2: "* Ingrese una fecha de finalizacion"				
				},
				
				errorContainer: $("#divErrores"),
				errorLabelContainer: "#divErrores ul",
				errorElement: "span",
				wrapper: "li",
							
                submitHandler: function(form) {
					form.submit();
                }
				
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        validador.UTIL.setupFormValidation();
    });

})(jQuery, window, document);