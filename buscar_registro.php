<?php session_start();
/* 
 * Página asegurada
 * Simplemente hay que añadir esta línea de PHP al principio.
 */
require('php_lib/include-pagina-restringida.php'); //el incude para vericar que estoy logeado. Si falla salta a la página de login.php
require('php_lib/solo_administradores.php');
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
    <div class="content" id="dejar_espacio">
	<div class="grid_6 prefix_3">
		<form action="" method="post" id="abm_empleados">
				<header>Buscar Registro
				<label class="aclaracion">.:Realice la busqueda mediante el DNI del empleado:.</label>
               </header>
			   <fieldset>
				<section>
				<label class="input">
                            <input type="text" name="dni" id="nro" placeholder="Ingrese el dni"></input>
                            <b class="tooltip tooltip-bottom-right">
							Ingrese el dni sin puntos, espacios, o caracteres especiales
							</b>  
                </label>				
				</section>
				<button class="button" type="submit">Buscar</button>
                </fieldset>
            </form>
			
			
			
			
			
			
			
	<div class="clear"></div>
	</div>
    </div>
  <!--==============================Flecha Atras =================================-->
	    <div class="clear"></div>
		<div class="grid_1" id="flecha_atras">
        <a href="home_admin.php">
          <img src="images/flecha_atras.png" alt="ATRAS">
        </a>
		</div>
		</div>
<!--==============================footer=================================-->
<?php include("footer/pie.php"); ?>
</body>
</html>