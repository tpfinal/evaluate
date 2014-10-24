<?php session_start();

	require_once('php_lib/conexion.php'); //incluimos la clase conexion
	require('php_lib/ado.objetivo.php');//incluimos la clase de acceso a datos de empleado
	$ado=new adoObjetivo();

$id_objetivo=$_GET['id'];
$id_periodo=$_SESSION['TEMP']['id_periodo'];
$id_empleado=$_SESSION['TEMP']['id_empleado'];


//echo'<h1>Evaluar Objetivos</h1>';

//echo 'id_objetivo: '.$id_objetivo;
//echo'</br>';
//echo 'id_periodo: '.$id_periodo;
//echo'</br>';
//echo 'id_empleado: '.$id_empleado;

echo '<h2>Fechas de evaluacion: </h2>';

@$fechas=$ado->getFechasEvaluacion($id_objetivo,$id_empleado,$id_periodo);



if($fechas)
	{
		foreach($fechas as $key=>$fecha){
			echo "<li><a href='evaluar_controler.php?id=$key'> $fecha </a></li>";
		}
	}

?>