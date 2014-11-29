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
	<div class="container_12">
    <div class="content" id="dejar_espacio3">
	<div class="grid_6 prefix_3">
	
		<form action="controlers/objetivo_controler.php" method="post" id="alta_objetivo" class="abm_perfil">
			<header>Nuevo Objetivo</header>
			<fieldset>
				<section>
				<label class="input">
                            <input type="text" name="nombre_objetivo"  placeholder="Nombre"></input>
                            <b class="tooltip tooltip-bottom-right">
							Ingrese un nombre para el objetivo
							</b>  
                </label>
				</section>
				<section>
					<label class="input">
							<input type="text" name="descripcion_objetivo"  placeholder="Descripcion"></input>
							<b class="tooltip tooltip-bottom-right">
							Ingrese una descripcion para el objetivo
							</b>  
					</label>					
				</section>
				<button class="button" type="submit">Agregar Objetivo</button>
				
				<button class="button" type="button" onclick="location='competencias.php'">Volver</button>

			</fieldset>
			
			
			
        </form>	
		
		<h4>Lista de Objetivos</h4>
		<?php 
		@$objetivos=@$_SESSION['TEMP']['objetivos'];
		if($objetivos){
			foreach($objetivos as $nombre=>$descripcion)
			{
			echo "<li>$nombre";
			echo ' | ';
			echo "<a href='controlers/quitar_objetivo_controler.php?objetivo=$nombre' class='button'>Quitar</a></li>";
			}
		echo '</br>';	
		echo "<button class='button' type='button' onclick=\"location='controlers/guardar_perfil_controler.php'\">Guardar Perfil</button>";
		}
		?>
		
		</div>
		<div class="clear"></div>	
		
	</div>
	
</div>
 

<!--==============================footer=================================-->
<?php include("footer/pie.php"); ?>
</body>
</html>