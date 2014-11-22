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
<link href='http://fonts.googleapis.com/css?family=Lora:700italic' rel='stylesheet' type='text/css'>
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
<!--==============================Content=================================-->
	<?php
	
	include ("php_lib/formato_fechas.php");
	
	$nombre_periodo=$_SESSION['TEMP']['nombre_perido'];
	$inicio=$_SESSION['TEMP']['inicio'];
	$fin=$_SESSION['TEMP']['fin'];
	$fechas_ev=$_SESSION['TEMP']['fechas_ev'];
	$empleados=$_SESSION['TEMP']['empleados'];
	//var_dump($empleados);
	?>		

		<div class="container_12">

				<div class="content" id="dejar_espacio">

<div id="div_titulo"><label class="subtitulo"><?php echo $nombre_periodo?></label></div>

								
								
			<div class="grid_11" id="titulo_fechas">
					<div class="grid_2">
					<h5 class="texto">Fecha inicio</h5>
					<h6 class="fecha"><?php echo sqlastd($inicio) ?></h6>
					</div>
					<div class="grid_2">
					<h5 class="texto">Fecha fin</h5>
					<h6 class="fecha"><?php echo sqlastd($fin) ?></h6>
					</div>
					<div class="grid_3">
						<h5 class="texto">Fechas intermedias</h5>
							<ul id="lista_fechas">
							<?php
							if($fechas_ev)
							{
								foreach($fechas_ev as $key){
								$fechaStd=sqlastd($key);
								echo "<li> $fechaStd </li>";
								}
							}
							?>
							</ul>
					</div>
					<div class="grid_3">
						<h5 class="texto">Empleados evaluados</h5>
							<ul id="lista_empleados">
							<?php
							if($empleados)
							{
								foreach($empleados as $key=>$nombre){
								echo "<li><a href='detalles_empleado.php?id=$key'> $nombre </a></li>";
								}
							}
							?>
							</ul>
					</div>	
			</div>
		</div>
  <!--==============================Flecha Atras =================================-->
	    <div class="clear"></div>
		<div class="grid_1" id="flecha_atras">
        <a href="seguir.php">
          <img src="images/flecha_atras.png" alt="ATRAS">
        </a>
		</div>
		</div>
<!--==============================footer=================================-->
<?php include("footer/pie.php"); ?>
</body>
</html>