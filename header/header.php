<?php 

include_once('php_lib/config.ini.php'); //incluimos configuración
include_once('php_lib/login.lib.php'); //incluimos las funciones
			
?>
<header>  
        <div class="grid_4">
        <?php include("logo.php"); ?>
		</div> 
		<div class="prefix_6"> 
	<div id="container">
		<?php 
		if (!estoy_logueado()) { // si no estoy logueado
		include("login.php"); 
		}
		else	{
		include ("datos.php"); //si estoy logueado muestro los datos del usuario
		}
		?>
	</div>	
		</div>     
</header>