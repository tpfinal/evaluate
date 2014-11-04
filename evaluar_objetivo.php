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
	include ("php_lib/formato_fechas.php");
		
	$ado=new adoObjetivo();
	$adoE=new adoEmpleado();

$id_objetivo=$_SESSION['TEMP']['id_objetivo'];
$id_periodo=$_SESSION['TEMP']['id_periodo'];
$id_empleado=$_SESSION['TEMP']['id_empleado'];
$id_evaluacion=$_SESSION['TEMP']['id_evaluacion'];

$obj_objetivo=$ado->getObjetivoById($id_objetivo);

$nombre_empleado=$adoE->getNameEmpleado($id_empleado); 
$nombre_objetivo=$obj_objetivo->getNombre();
$descripcion=$obj_objetivo->getDescripcion();

//array con las fechas de evaluacion
@$fechas=$ado->getFechasEvaluacion($id_objetivo,$id_empleado,$id_periodo);

//var_dump($fechas);


?>

<div class="container_12">
<div id="div_titulo">
<label class="subtitulo"> <?php echo $nombre_empleado ?> </label>
<label class="subtitulo2"> <?php echo $nombre_objetivo ?> </label>
</div>
			<div class="clear cl2" id="espacio"></div>
		<div class="content" id="dejar_espacio">
					<div class="grid_12"><p class="texto3"> <?php echo $descripcion ?> </p></div>
				<div class="grid_8 prefix_2">
					<table>
						<thead>
						<tr id="categorias">
							<th>#</th>
							<th>aca va la fecha de evaluacion</th>
							<th>Estado</th>
							<th>Nota</th>
						</tr>
						</thead>
						<tbody>
						
						<?php
						$pos=1;
						foreach($fechas as $fecha)
						{
						echo"
						<tr>
							<td>$pos</td>
							<td> $fecha </td>
							<td>aca va el estado</td>
							<td>
							<form action='' method='post' id='ingresar_nota' class='ingresar_nota' name='ingresar_nota'>
										<select id='ddl_notas' name='ddl_notas'>
											<option value=1>1</option>
											<option value=2>2</option> 
											<option value=3>3</option> 
											<option value=4>4</option> 
											<option value=5>5</option> 
										</select>
										
										<button class='button' type='submit' onsubmit='return validar()'> Evaluar </button>
							</form>
							</td>
						</tr>
						";
						$pos++;
						}
						?>
						<!--
						<tr>
							<td>2</td>
							<td>aca va la fecha de evaluacion</td>
							<td>aca va el estado</td>
							<td>
							<form action="" method="post" id="ingresar_nota" class="ingresar_nota" name="ingresar_nota">
										<select id="ddl_notas" name="ddl_notas">
											<option value="1">1</option>
											<option value="1">2</option> 
											<option value="1">3</option> 
											<option value="1">4</option> 
											<option value="1">5</option> 
										</select>
										<button class="button" type="submit"> Evaluar </button>
							</form>
							</td>
						</tr>
						
						<tr>
							<td>3</td>
							<td>aca va la fecha de evaluacion</td>
							<td>aca va el estado</td>
							<td>
							<form action="" method="post" id="ingresar_nota" class="ingresar_nota" name="ingresar_nota">
										<select id="ddl_notas" name="ddl_notas">
											<option value="1">1</option>
											<option value="1">2</option> 
											<option value="1">3</option> 
											<option value="1">4</option> 
											<option value="1">5</option> 
										</select>
										<button class="button" type="submit"> Evaluar </button>
							</form>
							</td>
						</tr>
						-->
						
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