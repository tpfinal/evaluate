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
<?php
	require_once('php_lib/conexion.php'); //incluimos la clase conexion
	require('model/class.objetivo.php');//incluimos la clase objetivo
	require('php_lib/ado.objetivo.php');//incluimos la clase de acceso a datos de empleado
	require('php_lib/ado.periodo.php');//incluimos la clase de acceso a datos de periodo
	require('php_lib/ado.ranking.php');//incluimos la clase de acceso a datos de ranking
	//include ("php_lib/formato_fechas.php");
		
	$adoR=new adoRanking();

//array con los empleados
$empleados=$adoR->getAllEmpleados();
//var_dump($empleados);
$ordenado=$adoR->ordenar($empleados);
//var_dump($ordenado);
?>

<div class="container_12">
<div id="div_titulo">
<label class="subtitulo"> Ranking de los mejores empleados </label>
<label class="subtitulo2"> </label>
</div>
	<div class="clear cl2" id="espacio"></div>
		<div class="content" id="dejar_espacio">
		
		Los objetivos tienen un peso nominal del 60% por sobre las competencias que tienen un 40% 
		
					<div class="grid_12"><p class="texto3"> <?php //echo $descripcion ?> </p></div>
				<div class="grid_8 prefix_2">
					<table>
						<thead>
						<tr id="categorias">
							<th>#</th>
							<th>Nombre del Empleado</th>
							<th>Promedio Objetivos</th>
							<th>Promedio Competencias</th>
							<th>Coeficiente de evaluacion</th>
						</tr>
						</thead>
						<tbody>
						
					<?php
					$pos=1;
					foreach($ordenado as $key=>$coeficiente)
					{
							$nombre=$adoR->getNameEmpleado($key);
							$notaO=$adoR->getAVGempleado($key,'o');
							$notaC=$adoR->getAVGempleado($key,'c');
							
							echo"
							<tr>
								<td>$pos</td>
								<td>$nombre</td>
								<td>$notaO</td>
								<td>$notaC</td>
								<td>$coeficiente</td>
							</tr>";
						$pos++;
					
					}
					?>

						
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