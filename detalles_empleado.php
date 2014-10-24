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
<!--==============================Content=================================-->
<?php
	require_once('php_lib/conexion.php'); //incluimos la clase conexion
	require('php_lib/ado.objetivo.php');//incluimos la clase de acceso a datos de empleado
	$ado=new adoObjetivo();

$id_empleado=$_GET['id'];
$_SESSION['TEMP']['id_empleado']=$id_empleado;
$id_periodo=$_SESSION['TEMP']['id_periodo'];

//echo 'id_empleado: '.$id_empleado;
//echo'</br>';
//echo 'id_periodo: '.$id_periodo;

$objetivos=$ado->getObjetivos($id_empleado,$id_periodo);

?>

<div class="container_12">
<div class="clear cl1" id="espacio"></div>
		<div class="content" id="dejar_espacio">
		<div class="grid_6" id="columna_objetivos">
			<h5 class="texto2">Objetivos</h5>
			<ul id="lista_objetivos">
<?php
if($objetivos)
	{
		foreach($objetivos as $key=>$nombre){
			echo "<li><a href='evaluar_objetivo.php?id=$key'> $nombre </a></li>";
		}
	}
?>
			</ul>
		</div>
		<div class="grid_6" id="columna_objetivos">
			<h5 class="texto2">Competencias</h5>
			<ul id="lista_competencias">
					<li class="uno">Trabajo en equipo</li>
					<li class="dos"> Compromiso con las tareas asignadas</li>
					<li class="tres"> Comunicacion</li>
					<li class="cuatro"> Entusiasta y dinamico</li>
			</ul>
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

