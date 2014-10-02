<?php
session_start();
/*
 * 
 */

if ($_SERVER['REQUEST_METHOD']=='POST') { // ¿Nos mandan datos por el formulario?
    require('../model/class.periodo.php'); //incluimos la clase periodo
	require_once('../php_lib/conexion.php'); //incluimos la clase conexion
	require('../php_lib/ado.empleado.php');//incluimos la clase de acceso a datos	
	require('../php_lib/ado.periodo.php');//incluimos la clase de acceso a datos
	
	$adoE=new adoEmpleado();
	$adoP=new adoPeriodo();
	$id_creador= $adoE->getIdByDni(@$_SESSION['USUARIO']['user']);
	
//Funcion formato fecha
function fechaSQL($fecha)
{
	$sql_date=new DateTime($fecha);
	$newFecha = $sql_date->format('Y-m-d'); 
	return $newFecha;
}
	
//tomamos los DATOS del Periodo
	
	$nombre=$_SESSION['TEMP']['nombre_perido'];
	$inicio=$_SESSION['TEMP']['inicio'];
	$fin=$_SESSION['TEMP']['fin'];
	$cantidad=$_SESSION['TEMP']['cantidad'];
		
//recibimos los datos por session
	$cantidad=$_SESSION['TEMP']['cantidad'];
	

   
//creamose el objeto periodo
	@$obj_periodo= new periodo($nombre, $inicio, $fin, $id_creador);
//var_dump($obj_periodo); //para ver el contenido del objeto
	
//Guardamos el Periodo
	$adoP->guardarPeriodo($obj_periodo);
//obtenemos el id asignado por la BD
	$id_periodo=$adoP->getIdPeriodo($nombre);

//Guardamos las fechas
   for($i=1 ; $i<=$cantidad ; $i++)
   {
   
		//$adoP->guardarFecha($_SESSION['TEMP'][$i],$id_periodo);
		$fecha=$_SESSION['TEMP'][$i];
		//$newFecha=fechaSQL($fecha);
		ECHO $fecha;
		echo '</br>';
   }	
	echo $inicio;
	
	
//vamos a agregar_evaluaciones.php
	//header('Location: ../agregar_empleados.php');
	//die();
} 
?>