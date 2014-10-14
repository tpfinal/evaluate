<?php
session_start();
/*
 * 
 */

if ($_SERVER['REQUEST_METHOD']=='POST') { // ¿Nos mandan datos por el formulario?
   
	require_once('../php_lib/conexion.php'); //incluimos la clase conexion
	require('../php_lib/ado.empleado.php');//incluimos la clase de acceso a datos de empleado
	require('../php_lib/ado.periodo.php'); //incluimos la clase de acceso a datos de periodo
	require('../model/class.periodo.php');
	
	
	$adoE=new adoEmpleado();
	$adoP=new adoPeriodo();
	//$id= $adoE->getIdByDni(@$_SESSION['USUARIO']['user']);
	
//recibimos los datos por post y los guardamos en variables
    @$id_periodo=$_POST['id_periodo'];
		
//obtenemos los datos del periodo
	$obj_periodo=$adoP->getPeriodo($id_periodo);
	//var_dump($obj_periodo);
	
//guardamos en session los DATOS
	
	$_SESSION['TEMP']['nombre_perido']=$obj_periodo->getNombre();
	$_SESSION['TEMP']['inicio']=$obj_periodo->getInicio();
	$_SESSION['TEMP']['fin']=$obj_periodo->getFin();	
	
//vamos a periodo_vigente.php
	header('Location: ../periodo_vigente.php');
	die();
} 
?>