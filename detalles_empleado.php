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
	require('php_lib/ado.objetivo.php');//incluimos la clase de acceso a datos de los objetivos
	require('php_lib/ado.perfil.php');//incluimos la clase de acceso a datos de los perfiles
	require('model/class.perfil.php');//incluimos el modelo de la clase perfil

	//creamos los objetos de acceso a datos
	$ado=new adoObjetivo();
	$adoP=new adoPerfil();
	$adoE=new adoEmpleado();
	
//recibimos por GET el id del empleado 
$id_empleado=$_GET['id'];
//lo guardamos en session
$_SESSION['TEMP']['id_empleado']=$id_empleado;
//recuperamos el id_periodo de la session
$id_periodo=$_SESSION['TEMP']['id_periodo'];
//obtenemos un array con los objetivos del empleado de este periodo
$objetivos=$ado->getObjetivos($id_empleado,$id_periodo);
//buscamos el objeto perfil correspondiente
$obj_perfil=$adoP->findPerfil($id_empleado,$id_periodo);
?>
<div class="container_12">
<div id="div_titulo">
<label class="subtitulo"><?php echo ''.$adoE->getNameEmpleado($id_empleado); ?></label>
<label class="subtitulo2"><?php echo ''.$obj_perfil->getNombre(); ?></label>
</div>
<div class="clear cl1" id="espacio"></div>
		<div class="content" id="dejar_espacio">
		<div class="grid_6" id="columna_objetivos">
			<h5 class="texto2">Objetivos</h5>
			<ul id="lista_objetivos">
<?php
if($objetivos)
	{
		foreach($objetivos as $key=>$nombre){
			echo "<li><a href='controlers/detalles_controler.php?id=$key'> $nombre </a></li>";
		}
	}
?>
			</ul>
		</div>
		
		<div class="grid_6" id="columna_objetivos">
			<h5 class="texto2">Competencias</h5>
			<ul id="lista_competencias_desactivada">
					<li> Trabajo en equipo</li>
					<li> Compromiso con las tareas asignadas</li>
					<li> Comunicacion</li>
					<li> Entusiasta y dinamico</li>
			</ul>
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