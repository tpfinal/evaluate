<?php
	require_once('php_lib/conexion.php'); //incluimos la clase conexion
	require('php_lib/ado.objetivo.php');//incluimos la clase de acceso a datos de los objetivos
	require('php_lib/ado.perfil.php');//incluimos la clase de acceso a datos de los perfiles
	require('model/class.perfil.php');//incluimos la clase perfil
	
	$ado=new adoObjetivo();
	$adoP=new adoPerfil();
	$adoE=new adoEmpleado();
	
//recibimos por GET el id del empleado 
//$id_empleado=$_GET['id'];

$id_empleado= $adoE->getIdByDni(@$_SESSION['USUARIO']['user']);

//recuperamos el id_periodo de la session
$id_periodo=$_SESSION['TEMP']['id_periodo'];

//obtenemos un array con los objetivos del empleado de este periodo
$objetivos=$ado->getObjetivos($id_empleado,$id_periodo);
//var_dump($objetivos);

//nos retorna el objeto perfil correspondiente
$obj_perfil=$adoP->findPerfil($id_empleado,$id_periodo);


foreach($objetivos as $key=>$nombre){
$promedios[$key]=$ado->getAVGobjetivo($key,$id_empleado,$id_periodo);
//var_dump($key);
//var_dump($promedios[$key]);
}


?>
<div class="container_12">
<div id="div_titulo">
<label class="subtitulo"><?php echo ''.$adoE->getNameEmpleado($id_empleado); ?></label>
</br>
<label class="subtitulo2"><?php echo ''.$obj_perfil->getNombre(); ?></label>
</div>
<div class="clear cl1" id="espacio"></div>
	<div class="content" id="dejar_espacio">
		
		<div class="grid_6" id="columna_objetivos">
			<h5 class="texto2">Mis Objetivos</h5>
			<ul id="lista_objetivos_desactivada">
				<?php
				if(@$objetivos)
					{
					foreach($objetivos as $key=>$nombre){
						echo "<li><a href='controlers/detalles_controler.php?id=$key'> $nombre 
						
						$promedios[$key]</a></li>";
					}
					}
				?>
			</ul>
		</div>
		
	</div>
</div> 
<div class="clear"></div>

		