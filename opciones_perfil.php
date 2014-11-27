<?php session_start();
/* 
 * P�gina asegurada
 * Simplemente hay que a�adir esta l�nea de PHP al principio.
 */
require('php_lib/include-pagina-restringida.php'); //el incude para vericar que estoy logeado. Si falla salta a la p�gina de login.php
include('php_lib/solo_evaluadores.php');
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
  <div class="container_12">
    <div class="clear cl1"></div>
<div class="content">
    <div class="grid_4 prefix_2">
      <div class="opcion">
		<a href="alta_perfil.php"><img src="images/crear_perfil.jpg" alt="CREAR PERFIL"/></a>
	  </div>
    </div>
	<div class="grid_4">
      <div class="opcion">
		<a href="eliminar_perfiles.php"><img src="images/eliminar_perfiles.jpg" alt="ELIMINAR PERFILES EXISTENTES"/></a>
	  </div>
    </div>
	
<div class="clear"></div>
</div>
</div>
<!--==============================footer=================================-->
<?php include("footer/pie.php"); ?>
</body>
</html>