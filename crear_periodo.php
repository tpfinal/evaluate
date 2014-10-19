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
<!--==============================Content (formulario de alta)=================================-->
	<div class="container_12">
    <div class="content" id="dejar_espacio">
	<div class="grid_6 prefix_3">
		
		<form action="controlers/periodo_controler.php" method="post" id="crear_periodo" name="crear_periodo" class="alta_periodo" novalidate="novalidate">
			<header>Crear Periodo</header>
			<fieldset>
				<section>
				<label class="input">
                            <input type="text" name="nombre_periodo"  placeholder="Nombre"></input>
                            <b class="tooltip tooltip-bottom-right">Ingrese un nombre para el periodo</b>  
                </label>
				</section>
				<section>
					<label class="input">
						<input type="text" name="cantidad"  placeholder="Cantidad de evaluaciones"></input>
						<b class="tooltip tooltip-bottom-right">Ingrese una cantidad de evaluaciones</b>  
					</label>
				</section>
				<section >
						<input type="text" value="" readonly name="theDate1" placeholder="Fecha de inicio" class="calendario" id="fecha_inicio"/>
						<input type="button" value="Calendario" onclick="displayCalendar(document.crear_periodo.theDate1,'mm/dd/yyyy',this)"/>
						<p>* La fecha se expresa en el formato mes/dia/ano</p>
				</section>
				<section >
						<input type="text" value="" readonly name="theDate2" placeholder="Fecha de finalizacion" class="calendario"/ id="fecha_final">
						<input type="button" value="Calendario" onclick="displayCalendar(document.crear_periodo.theDate2,'mm/dd/yyyy',this)"/>
						<p>* La fecha se expresa en el formato mes/dia/ano</p>

				</section>
				<button class="button" type="submit" onclick="return validar_fecha_periodo()">Siguiente</button>
			</fieldset>
        </form>	
		
	<div id="divErrores">
		<ul id="lista"></ul>
		<span id="error1" style='display:none'> * La fecha de inicio no puede coincidir con la fecha de finalizacion </br> </span>
		<span id="error2" style='display:none'> * La fecha de inicio no puede ser posterior a la fecha de finalizacion </br> </span>
	</div>
						
						
	</div>
    </div>
  <!--==============================Flecha Atras =================================-->
	    <div class="clear"></div>
		<div class="grid_1" id="flecha_atras">
        <a href="home_evaluador.php">
          <img src="images/flecha_atras.png" alt="ATRAS">
        </a>
		</div>
		</div>
<!--==============================footer=================================-->
<?php include("footer/pie.php"); ?>
</body>
</html>