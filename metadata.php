     <title>Evaluate</title>
     <meta charset="utf-8">
     <meta name = "format-detection" content = "telephone=no" />
     <link rel="icon" href="images/favicon.ico">
     <link rel="shortcut icon" href="images/favicon.ico" />
     <link rel="stylesheet" href="css/camera.css"/>
     <link rel="stylesheet" href="css/ie.css"/>
	 <link rel="stylesheet"  href="css/component.css" />
    <link rel="stylesheet" type="text/css" href="css/tooltipster.css" />
	<link rel="stylesheet" href="css/estilo_login.css"/>
	<link rel="stylesheet" href="css/form.css"/>
	<link rel="stylesheet" href="css/touchTouch.css"/>
	<link rel="stylesheet" href="css/estilo_tabla.css"/>
	<link rel="stylesheet" href="css/reset.css"/>
	<link rel="stylesheet" href="css/skeleton.css"/>
	<link rel="stylesheet" href="css/superfish.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/estilo_abm_empleados.css"/> <!--CSS DEL FORMULARIO DE ABM DE EMPLEADOS -->
	
	
     <script src="js/jquery.js"></script>
     <script src="js/jquery-migrate-1.2.1.js"></script>
     <script src="js/script.js"></script> 
     <script src="js/superfish.js"></script>
     <script src="js/jquery.ui.totop.js"></script>
     <script src="js/jquery.equalheights.js"></script>
     <script src="js/jquery.mobilemenu.js"></script>
     <script src="js/jquery.easing.1.3.js"></script>
      <script src="js/jquery.tooltipster.js"></script>
     <script src="js/camera.js"></script>
     <script src="js/classie.js"></script>
     <script src="js/html5shiv.js"></script>
     <script src="js/TMForm.js"></script>
     <script src="js/touchTouch.jquery.js"></script>
     <script src="js/thumbnailGridEffects.js"></script>
     <!--if (gt IE 9)|!(IE)]><!-->
     <script src="js/jquery.mobile.customized.min.js"></script>
     <!--<![endif]-->
	<script src="js/modernizr.custom.js"></script>
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