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
	
		<form action="" method="post" id="crear_periodo" name="crear_periodo" class="abm_perfil">
			<header>Crear Periodo</header>
			<fieldset>
				<section>
				<label class="input">
                            <input type="text" name="nombre_periodo"  placeholder="Nombre"></input>
                            <b class="tooltip tooltip-bottom-right">
							Ingrese un nombre para el periodo
							</b>  
                </label>
				</section>
				<section>
						Fecha Inicio: <input type="text" value="" readonly name="theDate1">
									  <input type="button" value="Cal" onclick="displayCalendar(document.crear_periodo.theDate1,'yyyy/mm/dd',this)">
				</section>
							
				<section>
						Fecha Finalizacion: <input type="text" value="" readonly name="theDate2">
									  <input type="button" value="Cal" onclick="displayCalendar(document.crear_periodo.theDate2,'yyyy/mm/dd',this)">
				</section>
				
				<section>
				<label class="input">
                            <input type="text" name="cantidad_evaluaciones"  placeholder="cantidad de evaluaciones"></input>
                            <b class="tooltip tooltip-bottom-right">
							Ingrese una cantidad de evaluaciones
							</b>  
                </label>
				</section>
	
				
				<button class="button" type="submit">Siguiente</button>
			
			</fieldset>
        </form>	
		
		
	</div>
    </div>
  <!--==============================Flecha Atras =================================-->
	    <div class="clear"></div>
		<div class="grid_1" id="flecha_atras">
        <a href="alta_perfil.php">
          <img src="images/flecha_atras.png" alt="ATRAS">
        </a>
		</div>
		</div>
<!--==============================footer=================================-->
<?php include("footer/pie.php"); ?>
</body>
</html>