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
	//creamos el ado perfil
	require_once('model/class.perfil.php');
	require('php_lib/ado.perfil.php');//incluimos la clase de acceso a datos
	$adoP=new adoPerfil();

	//recibimos los datos por post
    //@$id_periodo=$_POST['id_periodo'];
	$listaEmpleados=$ado->getAllEmpleados();
	$listaPerfiles=$adoP->getAllPerfiles();
?>
	<div class="container_12">
    <div class="content" id="dejar_espacio">
	<div class="grid_6 prefix_3">
	
		<form action="controlers/guardar_periodo_controler.php" method="post" id="empleados" name="empleados" class="abm_perfil">
			<header>Agregar Empleados al Periodo <?php echo ''?></header>
			
			<fieldset>
		Empleado: 
		<select>
		<?php
			foreach($listaEmpleados as $key=>$valor) {
			echo '<option value='. $key .'>' . $valor .'</option>';
			}
		?>
		</select>
		Perfil: 
		<select>
		<?php
			foreach($listaPerfiles as $key=>$valor) {
			echo '<option value='. $key .'>' . $valor .'</option>';
			}
		?>
		</select>
		
				<button class="button" type="submit">Agregar</button>
			
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