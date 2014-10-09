<?php
session_start();
/*
 * 
 */

    require('../model/class.periodo.php'); //incluimos la clase periodo
	require_once('../php_lib/conexion.php'); //incluimos la clase conexion
	require('../php_lib/ado.periodo.php');//incluimos la clase de acceso a datos
	
//$adoE=new adoEmpleado();
	$adoP=new adoPeriodo();
	
//tomamos los DATOS del Periodo
	$nombre=$_SESSION['TEMP']['nombre_perido'];
	
//Lista con los nombres y los perfiles de los empleados
	$lista=$_SESSION['lista'];
	//echo var_dump($lista);	
		
//obtenemos el id asignado por la BD
	$id_periodo=$adoP->getIdPeriodo($nombre);	
	
//guardamos los empleados
foreach ($lista as $key=>$id)
{
	$adoP->guardarEmpleado($key,$id[2],$id_periodo);
	//echo 'key = id_empleado: '.$key;
	//echo '</br>';
	//echo 'id_perfil: '.$id[2];
	//echo '</br>';
}
//limpiamos las variables guardadas en sesion
unset($_SESSION['lista']);
unset($_SESSION['TEMP']);

//vamos al menu principal
	header('Location: ../home_evaluador.php');
	die();
?>