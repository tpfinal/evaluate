     <title>Evaluate</title>
     <meta name = "format-detection" content = "telephone=no" />
     <link rel="icon" href="images/favicon.ico">
     <link rel="shortcut icon" href="images/favicon.ico" />
     <link rel="stylesheet" href="css/camera.css"/>
     <link rel="stylesheet" href="css/ie.css"/>
    <link rel="stylesheet" type="text/css" href="css/tooltipster.css" />
	<link rel="stylesheet" href="css/estilo_login.css"/>
	<link rel="stylesheet" href="css/form.css"/>
	<link rel="stylesheet" href="css/touchTouch.css"/>
	<link rel="stylesheet" href="css/estilo_tabla.css"/>
	<link rel="stylesheet" href="css/reset.css"/>
	<link rel="stylesheet" href="css/skeleton.css"/>
	<link rel="stylesheet" href="css/superfish.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	
	<link rel="stylesheet" href="css/estilo_abm_empleados.css"/> <!--CSS DE LOS FORMULARIOS DE ABM EMPLEADOS -->
	<link rel="stylesheet" href="css/estilo_abm_perfil.css"/> <!--CSS DE LOS FORMULARIOS DE ABM PERFILES -->
	
	
	
	
	
	
     <script src="js/jquery.js"></script> <!--JQUERY TRADICIONAL-->
     <script src="js/jquery-migrate-1.2.1.js"></script><!--SLIDER DEL HOME-->
     <script src="js/script.js"></script> <!--SLIDER DEL HOME-->
     <script src="js/superfish.js"></script><!--SLIDER DEL HOME-->
     <script src="js/jquery.ui.totop.js"></script><!--FLECHA QUE SUBE HACIA EL TOP DE LA PAGINA -->
	 <script src="js/validar_form_contacto.js"></script><!--VALIDACION DE FORMULARIO DE CONTACTO-->
     <script src="js/jquery.easing.1.3.js"></script><!--SLIDER DEL HOME-->
     <script src="js/html5shiv.js"></script> <!-- PARA COMPATIBILIDAD DE INTERNET EXPLORER CON HTML5-->
      <script src="js/jquery.tooltipster.js"></script><!--SLIDER DEL HOME-->
     <script src="js/jquery.mobilemenu.js"></script><!--COMPATIBILIDAD MOVIL (NO CHEQUEADO)-->
     <script src="js/camera.js"></script><!--SLIDER DEL HOME-->
     <script src="js/touchTouch.jquery.js"></script><!--COMPATIBILIDAD MOVIL (NO CHEQUEADO)-->
	<script  src="js/jquery.validate.js"></script> <!-- PLUGIN PARA VALIDACION JQUERY -->
	<script  src="js/abmempleados.js"></script> <!-- SCRIPT DE VALIDACION FORMULARIO DE ABM DE EMPLEADOS -->
	

	<script  src="js/valida_alta_perfil.js"></script> <!-- SCRIPT DE VALIDACION FORMULARIO DE ALTA DE PERFILES -->
	 
	 
	 
	 
	 
     <!--if (gt IE 9)|!(IE)]><!-->
     <script src="js/jquery.mobile.customized.min.js"></script>
     <!--<![endif]-->
	 
	
   <script> //flecha hacia arriba
       $(document).ready(function(){
        $().UItoTop({ easingType: 'easeOutQuart' });
        $('.tooltip').tooltipster();
        });
     </script>
	 
   <script> /*IMPORTANTE!!!*/
       $(document).ready(function(){
        jQuery('#camera_wrap').camera({
            loader: 'pie',
            pagination: true ,
            minHeight: '200',
            thumbnails: true,
            height: '40.85106382978723%',
            caption: true,
            navigation: true,
            fx: 'mosaic'
          });
        $().UItoTop({ easingType: 'easeOutQuart' });
               $('.tooltip').tooltipster();
        });
	</script>