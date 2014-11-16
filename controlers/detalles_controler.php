<?php session_start();
/*
 * 
 */
   
require_once('../php_lib/conexion.php'); //incluimos la clase conexion
require('../php_lib/ado.objetivo.php');//incluimos la clase de acceso a datos de objetivo

$ado=new adoObjetivo();
	
//recibimos los datos por GET y por SESSION y los guardamos en variables

$id_objetivo=$_GET['id'];
$_SESSION['TEMP']['id_objetivo']=$id_objetivo;
$id_empleado=$_SESSION['TEMP']['id_empleado'];
$id_periodo=$_SESSION['TEMP']['id_periodo'];

echo '<h2>Fechas de evaluacion: </h2>';
@$fechas=$ado->getFechasEvaluacion($id_objetivo,$id_empleado,$id_periodo);

echo $id_objetivo;
echo '</br>';
echo $id_empleado;
echo '</br>';
echo $id_periodo;
echo '</br>';


//var_dump($fechas);

//funcion que regresa el id de la fecha de evaluacion correspondiente a la fecha actual
	
function evaluacionActual($arrayDeFechas)
{
$hoy=date("Y-m-d");
$id=0;

	foreach($arrayDeFechas as $key=>$fecha)
	{
		if($fecha<=$hoy)
		{
			$id=$key;
		}		
	}
return $id;
}

$id_evaluacion=evaluacionActual($fechas);
$_SESSION['TEMP']['id_evaluacion']=$id_evaluacion;

echo $_SESSION['TEMP']['id_evaluacion'];
	
//vamos a evaluar_objetivo.php
	header('Location: ../evaluar_objetivo.php');
	die();

?>