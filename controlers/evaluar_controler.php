<?php session_start();
/*
 * 
 */
   
require_once('../php_lib/conexion.php'); //incluimos la clase conexion
require('../php_lib/ado.objetivo.php');//incluimos la clase de acceso a datos de objetivo

$ado=new adoObjetivo();

var_dump($_SESSION['TEMP']);
	
//recibimos los datos por GET por SESSION y los guardamos en variables

$id_objetivo=$_SESSION['TEMP']['id_objetivo'];
$id_empleado=$_SESSION['TEMP']['id_empleado'];
$id_evaluacion=$_SESSION['TEMP']['id_evaluacion'];

$nota=4;



echo '<h2>Fechas de evaluacion: </h2>';
@$fechas=$ado->getFechasEvaluacion($id_objetivo,$id_empleado,$id_periodo);

//Guardamos la nota (requiere id_objetibo, id_empleado,id_evaluacion y nota)
$ado->guardarNota($id_objetivo,$id_empleado,$id_evaluacion,$nota);

//var_dump($_SESSION['TEMP']['fechas_ev']);
	
//vamos a evaluar_objetivo.php
	//header('Location: ../evaluar_objetivo.php');
	//die();

?>