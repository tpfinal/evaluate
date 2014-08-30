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
    <div class="content" id="dejar_espacio">
	<div class="grid_6 prefix_3">
	
		<form action="controlers/objetivo_controler.php" method="post" id="alta_objetivo" class="abm_perfil" novalidate="novalidate">
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
				<button class="button" type="submit">Guardar Objetivo</button>
			</fieldset>
        </form>
		
		<h4>Este form funciona</h4>
		
		<form action="controlers/objetivo_controler.php" method="post" id="nuevo_objetivo" ">
			<header>Nuevo Objetivo</header>
		
                            <input type="text" name="nombre_objetivo"  placeholder="Nombre"></input>
                            <b class="tooltip tooltip-bottom-right">
							Ingrese un nombre para el objetivo
							</b>  
			
							<input type="text" name="descripcion_objetivo"  placeholder="Descripcion"></input>
							<b class="tooltip tooltip-bottom-right">
							Ingrese una descripcion para el objetivo
							</b>  
							
				<button class="button" type="submit">Guardar Objetivo</button>
		
        </form>
		
		
		<!--<button onClick=" window.location.href='home_evaluador.php' ">Finalizar carga</button>-->



		
		
		
		
	</div>
    </div>
  <!--==============================Flecha Atras =================================-->
	    <div class="clear"></div>
		<div class="grid_1" id="flecha_atras">
        <a href="alta_perfil.php">
          <img src="images/flecha_atras.png" alt="ATRAS">
        </a>
		</div>
		</div>
<!--==============================footer=================================-->
<?php include("footer/pie.php"); ?>
</body>
</html>