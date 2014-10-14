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
	<?php
	$nombre_periodo=$_SESSION['TEMP']['nombre_perido'];
	$inicio=$_SESSION['TEMP']['inicio'];
	$fin=$_SESSION['TEMP']['fin'];
	?>
	
	<div class="container_12">
    <div class="content" id="dejar_espacio">
	
    <p class="subtitulo"><?php echo $nombre_periodo?></p>
		<div class="content" id="dejar_espacio">
		
			<div class="grid_11" id="titulo_fechas">
			
					<div class="grid_2">
					<h5 class="texto">Fecha inicio</h5>
					<h6 class="fecha"><?php echo $inicio ?></h6>
					</div>
					
					<div class="grid_2">
					<h5 class="texto">Fecha fin</h5>
					<h6 class="fecha"><?php echo $fin ?></h6>
					</div>
					
					<div class="grid_3">
						<h5 class="texto">Fechas intermedias</h5>
							<ul id="lista_fechas">
								<li> 30/02/2014 </li>
								<li> 30/05/2014 </li>
								<li> 30/08/2014 </li>
							</ul>
					</div>
					
					<div class="grid_3">
						<h5 class="texto">Empleados evaluados</h5>
							<ul id="lista_empleados">
								<li><a href="detalles_empleado.html"> Juan Perez</a></li>
								<li><a href=""> Natalia Fernandez</a></li>
								<li><a href=""> Jose Lopez</a></li>
								<li><a href=""> Macarena Rodriguez</a></li>
								
							</ul>
					</div>	
						
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