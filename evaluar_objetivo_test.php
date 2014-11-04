<?php session_start();

	require_once('php_lib/conexion.php'); //incluimos la clase conexion
	require('model/class.objetivo.php');//incluimos la clase objetivo
	require('php_lib/ado.objetivo.php');//incluimos la clase de acceso a datos de empleado
	include ("php_lib/formato_fechas.php");
	
	$ado=new adoObjetivo();

$id_objetivo=$_SESSION['TEMP']['id_objetivo'];
$id_periodo=$_SESSION['TEMP']['id_periodo'];
$id_empleado=$_SESSION['TEMP']['id_empleado'];
$id_evaluacion=$_SESSION['TEMP']['id_evaluacion'];

$obj_objetivo=$ado->getObjetivoById($id_objetivo);

var_dump($obj_objetivo);

//echo'<h1>Evaluar Objetivos</h1>';

//echo 'id_objetivo: '.$id_objetivo;
//echo'</br>';
//echo 'id_periodo: '.$id_periodo;
//echo'</br>';
//echo 'id_empleado: '.$id_empleado;

echo '<h2>Fechas de evaluacion: </h2>';

@$fechas=$ado->getFechasEvaluacion($id_objetivo,$id_empleado,$id_periodo);

var_dump($fechas);

echo 'ID evaluacion actual: '.$ado->evaluacionActual($fechas);

if($fechas)
	{
		foreach($fechas as $key=>$fecha){
			echo "<li><a href='controlers/evaluar_controler.php?id_evaluacion=$key'> $fecha </a>";
			
			$nota=$ado->getNota($id_objetivo,$id_empleado,$key);
			if($nota==null){$nota='no hay nota';}

			echo '<b> NOTA: '.$nota.' '.'</b>';
			
			echo "<input type='radio'  name='nota' value='5'>5</input>";
			echo "<input type='radio'  name='nota' value='4'>4</input>";
			echo "<input type='radio'  name='nota' value='3'>3</input>";
			echo "<input type='radio'  name='nota' value='2'>2</input>";
			echo "<input type='radio'  name='nota' value='1'>1</input>";
			echo "</li>";
		}
	}

?>

<form action="controlers/evaluar_controler.php" method="post" id="evaluar" novalidate="novalidate">

<?php

?>
</form>