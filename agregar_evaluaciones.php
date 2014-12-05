<?php session_start();
/*
 * Página asegurada
 * Simplemente hay que añadir esta línea de PHP al principio.
 */
require('php_lib/include-pagina-restringida.php'); //el incude para vericar que estoy logeado. Si falla salta a la página de login.php
require('php_lib/solo_evaluadores.php');//restringe acceso a roles diferentes de 1 y 3
?>
<!DOCTYPE html>
<html lang="es">
	<head>
<?php include("metadata.php"); ?>
	 <!--calendar-->
	<link type="text/css" rel="stylesheet" href="js/dhtmlgoodies_calendar/dhtmlgoodies_calendar.css" media="screen"></LINK>
	<SCRIPT type="text/javascript" src="js/dhtmlgoodies_calendar/dhtmlgoodies_calendar.js"></script>
	</head>
 <body class="page1" id="top">
<!--==============================header=================================--> 
<div class="container_12">
<div class="grid_12">
<?php include("header/header.php"); ?>
<!--==============================menu=================================--> 
<?php include("menu/menu.php"); ?>
</div>
</div>
<!--==============================Content (formulario de ingreso de fechas)=================================-->
<?php
//recibimos los datos por la variable de session
    @$nombre=$_SESSION['TEMP']['nombre_periodo'];
	@$inicio=$_SESSION['TEMP']['inicio'];
	@$fin=$_SESSION['TEMP']['fin'];
	@$cantidad=$_SESSION['TEMP']['cantidad'];
?>
	<div class="container_12">
    <div class="content" id="dejar_espacio">
	<div class="grid_6 prefix_3" id="formulario_agregar_evaluaciones">
		
		<form action="controlers/agregar_evaluaciones_controler.php" method="post" name="crear_periodo" class="alta_periodo" id="agregar_fechas">
			<header>Fechas de Evaluacion
			<p class="aclaracion">Periodo desde <?php echo $inicio?> hasta <?php echo $fin?></p></header>
			<fieldset>
			<?php
			for($i=1 ; $i<=$cantidad ; $i++)
			{
			echo'
				<section class="fechas">
					 <input type="text" class="calendario" value=""
					 readonly name="theDate'.$i.'" placeholder="Evaluacion N '.$i.'">
					 
					 <input type="button" value="Seleccionar fecha"
					 onclick="displayCalendar(document.crear_periodo.theDate'.$i.',\'dd/mm/yyyy\',this)">
				</section>
				';
			};
			?>
				<button class="button" type="submit">Siguiente</button>
				<span id='error1'><?php echo @$_SESSION['MSJ'];UNSET($_SESSION['MSJ']);?></span>
			</fieldset>
        </form>

		
	</div>
    </div>
	
	<div class="clear"></div>
	   
	<div class="content" id="dejar_espacio4">
<!--==============================Flecha Atras =================================-->
	    <!--	
		<div class="grid_1" id="flecha_atras">
        <a href="home_evaluador.php">
          <img src="images/flecha_atras.png" alt="ATRAS">
        </a>
		</div>
		
<!--==============================footer=================================-->
</div>

<?php include("footer/pie.php"); ?>
</body>
</html>