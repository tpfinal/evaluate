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
	<link href='http://fonts.googleapis.com/css?family=Josefin+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
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



<div class="container_12">
<div id="div_titulo">
<label class="subtitulo"> nombre del empleado </label>
<label class="subtitulo2"> nombre del objetivo </label>
</div>
			<div class="clear cl2" id="espacio"></div>

		<div class="content" id="dejar_espacio">
		
		
		
		
		
		
					
					<div class="grid_12"><p class="texto3"> Aca iria la descripcion del objetivo</p></div>

				<div class="grid_8 prefix_2">
					<table>
						<thead>
						<tr id="categorias">
							<th>#</th>
							<th>Fecha Evaluacion</th>
							<th>Estado</th>
							<th>Nota</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td>1</td>
							<td>26/06/2014</td>
							<td>Finalizado</td>
							<td>5 <img src="images/muy_bueno.png"/></td>
						</tr>
						<tr class="alerta">
							<td>2</td>
							<td>26/07/2014</td>
							<td>Evaluacion pendiente</td>
							<td><a href="evaluar_objetivo2.html">EVALUAR</a></td>
						</tr>
						<tr>
							<td>3</td>
							<td>26/08/2014</td>
							<td>Evaluacion futura</td>
							<td>n/a</td>
						</tr>
						</tbody>
					</table>
			</div>			






			
		</div>
  <!--==============================Flecha Atras =================================-->
	    <div class="clear"></div>
		<div class="grid_1" id="flecha_atras">
        <a href="periodo_vigente.php">
          <img src="images/flecha_atras.png" alt="ATRAS">
        </a>
		</div>
		</div>
<!--==============================footer=================================-->
<?php include("footer/pie.php"); ?>
</body>
</html>