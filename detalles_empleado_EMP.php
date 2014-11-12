<?php session_start();
/*
 * Página asegurada
 * Simplemente hay que añadir esta línea de PHP al principio.
 */
require('php_lib/include-pagina-restringida.php'); //el incude para vericar que estoy logeado. Si falla salta a la página de login.php
// require('php_lib/solo_evaluadores.php');//restringe acceso a roles diferentes de 1 y 3
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
	require('model/class.perfil.php');//incluimos la clase perfil
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

//nos retorna el objeto perfil correspondiente
$obj_perfil=$adoP->findPerfil($id_empleado,$id_periodo);
//var_dump($obj_perfil->getId());

//obtenemos un array con las competencias del perfil
$competencias=$ado->getCompetencias($obj_perfil->getId());

//Guardamos el array en session
$_SESSION['TEMP']['competencias']=$competencias;

?>
<div class="container_12">
<div id="div_titulo">
<label class="subtitulo"><?php echo ''.$adoE->getNameEmpleado($id_empleado); ?></label>
</br>
<label class="subtitulo2"><?php echo ''.$obj_perfil->getNombre(); ?></label>
</div>
<div class="clear cl1" id="espacio"></div>
		<div class="content" id="dejar_espacio">
		
		<!--
		<div class="grid_6" id="columna_objetivos">
			<h5 class="texto2">Objetivos</h5>
			<ul id="lista_objetivos_desactivada">
				<?php
				if(@$objetivos)
					{
						foreach($objetivos as $key=>$nombre){
							echo "<li> $nombre </li>";
						}
					}
				?>
			</ul>
		</div>
		-->
		
		<div class="grid_6" id="columna_objetivos">
			<h5 class="texto2">Competencias</h5>
			<ul id="lista_competencias">
				
				
			
				<?php
				if(@$competencias){
				
				//IF que activa o desactiva las votaciones de las competencias
					if(1==1){
					//Form para evaluar las competencias si estan activas
						echo "
						<form action='controlers/evaluar_competencias_controler.php' method='post' id='ingresar_nota' class='ingresar_nota' name='ingresar_nota'>
						";
						foreach($competencias as $key=>$nombre){
							echo "
							<li> $nombre 
										<select id='ddl_notas' name='nota_$key'>
											<option value=1>1</option>
											<option value=2>2</option> 
											<option value=3>3</option> 
											<option value=4>4</option> 
											<option value=5>5</option> 
										</select>	
							</li>
							";
						}
							echo "
							<button class='button' type='submit' onsubmit='return validar()'> Evaluar </button>
							</form>
							";
					}
					
					else{
					//cuandoi ya se evaluaron las competencias el select no aparecerá
					foreach($competencias as $key=>$nombre){
							echo "
							<li> $nombre </li>
							";
							}
					}
				}
				?>
				
				
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