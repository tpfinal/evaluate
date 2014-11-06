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
<?php
	//require('php_lib/conexion.php'); //incluimos la clase conexion
	require('php_lib/ado.objetivo.php');//incluimos la clase de acceso a datos
	$ado=new adoObjetivo();
	$competencias=$ado->getCompetencias();
?>	
	
	
	<div class="container_12">
    <div class="content" id="dejar_espacio">
					
	<div class="grid_6 prefix_3">
	
		<form action="controlers/competencias_controler.php" method="post" id="alta_perfil" class="abm_perfil" >
			<header>Establecer Competencias
				<label class="aclaracion">.:Seleccione las competencias:.</label>
            </header>
			<fieldset>
				<section>
				<?php
				foreach($competencias as $key=>$nombre)
				{
                    echo"
					<input type='checkbox'  name='$key' value='$key'>$nombre</input>
					</br>
					";
				}
				?>
				</section>
				
				<button class="button" type="submit">Continuar</button>
				
				<button class="button" type="button" onclick="location='nueva_competencia.php'">Nueva Competencia</button>
			
        </fieldset>
        </form>
			</div>	
			

    </div>


		
  <!--==============================Flecha Atras =================================-->
	    <div class="clear"></div>
		<div class="grid_1" id="flecha_atras">
        <a href="home_evaluador.php">
          <img src="images/flecha_atras.png" alt="ATRAS">
        </a>
		</div>
		</div>
<!--==============================footer=================================-->
<?php include("footer/pie.php"); ?>
</body>
</html>