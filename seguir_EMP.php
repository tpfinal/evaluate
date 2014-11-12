<?php session_start();
/*
 * Página asegurada
 * Simplemente hay que añadir esta línea de PHP al principio.
 */
require('php_lib/include-pagina-restringida.php'); //el incude para vericar que estoy logeado. Si falla salta a la página de login.php
// require('php_lib/solo_evaluadores.php'); //restringe acceso a roles diferentes de 1 y 3
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
//incluimos la clase de acceso a datos
	require('php_lib/ado.periodo.php');
	$adoP=new adoPeriodo();
//obtenemos el array de periodos del usuario logueado
	$id_user= $adoE->getIdByDni(@$_SESSION['USUARIO']['user']);
	@$periodos=$adoP->getPeriodos($id_user);
	//var_dump($periodos); //para ver el contenido del array
?>
	<div class="container_12">
    <div class="content" id="dejar_espacio">
	<div class="grid_6 prefix_3">
		
		<form action="controlers/seguir_EMP_controler.php" method="post" id="buscar_periodo" class="alta_periodo" >
			<header>Periodos en los que estoy
				<label class="aclaracion">.:Seleccione el periodo para evaluar a sus pares:.</label>
            </header>
			<fieldset>
				<select name="id_periodo" id="listItem">
				<optgroup class="periodos">
					<?php
					foreach($periodos as $key=>$valor) {
					echo '<option  value='. $key .'>' . $valor .'</option>';
					}
					?>
				</optgroup>
				</select>
				<button class="button" type="submit">Buscar</button>
        </fieldset>
        </form>
		
		<div id="divErrores">
		<ul id="lista"></ul>		
		</div>
	</div>	
    </div>
  <!--==============================Flecha Atras =================================-->
	    <div class="clear"></div>
		<div class="grid_1" id="flecha_atras">
        <a href="home_empleado.php">
          <img src="images/flecha_atras.png" alt="ATRAS">
        </a>
		</div>
		</div>
<!--==============================footer=================================-->
<?php include("footer/pie.php"); ?>
</body>
</html>