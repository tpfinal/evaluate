<?php session_start();

	require_once('php_lib/conexion.php'); //incluimos la clase conexion
	require('php_lib/ado.objetivo.php');//incluimos la clase de acceso a datos de empleado
	$ado=new adoObjetivo();

$id_empleado=$_GET['id'];
$_SESSION['TEMP']['id_empleado']=$id_empleado;
$id_periodo=$_SESSION['TEMP']['id_periodo'];

//echo '<h1>Detalles empleado</h1>';

//echo 'id_empleado: '.$id_empleado;
//echo'</br>';
//echo 'id_periodo: '.$id_periodo;

$objetivos=$ado->getObjetivos($id_empleado,$id_periodo);

echo '<h2>Lista de objetivos: </h2>';

if($objetivos)
	{
		foreach($objetivos as $key=>$nombre){
			echo "<li><a href='evaluar_objetivo.php?id=$key'> $nombre </a></li>";
		}
	}

?>
