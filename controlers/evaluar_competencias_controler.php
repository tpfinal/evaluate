<?php session_start();
/*
 * 
 */
   
require_once('../php_lib/conexion.php'); //incluimos la clase conexion
require('../php_lib/ado.objetivo.php');//incluimos la clase de acceso a datos de objetivo
require('../php_lib/ado.periodo.php');//incluimos la clase de acceso a datos de periodo
$ado=new adoObjetivo();
$adoP=new adoPeriodo();
//var_dump($_SESSION['TEMP']);
	
//recibimos los datos  SESSION y los guardamos en variables

$id_empleado=$_SESSION['TEMP']['id_empleado'];
$id_periodo=$_SESSION['TEMP']['id_periodo'];
$competencias=$_SESSION['TEMP']['competencias'];

//Recibimos las notas por POST:
foreach($competencias as $key=>$nombre)
{
	$post='nota_'.$key;
	$nota=$_POST[$post];
	
//generamos la evaluacion con la fecha actual
	$hoy=date("Y-m-d");
	$tipo='c';
	$id_evaluacion=$adoP->guardarFecha($hoy,$id_periodo,$tipo);
//var_dump($id_evaluacion);

//Guardamos la nota (requiere id_objetivo, id_empleado,id_evaluacion y nota)
	$id_nota=$ado->guardarNota($key,$id_empleado,$id_evaluacion,$nota);
	
	//var_dump($key,$id_empleado,$id_periodo);
	//$promedios[$key]=$ado->getAVGcompetencia($key,$id_empleado,$id_periodo);

}
//$_SESSION['TEMP']['promedios']=$promedios;

//var_dump($promedios);

//vamos a detalles_empleado_EMP.php
	header("Location: ../detalles_empleado_EMP.php?id=$id_empleado");
	die();

?>