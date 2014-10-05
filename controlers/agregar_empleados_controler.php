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
	
	
//tomamos los DATOS del Periodo
	
	$nombre=$_SESSION['TEMP']['nombre_perido'];
		
//obtenemos el id asignado por la BD
	$id_periodo=$adoP->getIdPeriodo($nombre);	

//recivimos por post el id del empleado y el id del perfil
	$id_empleado=$_POST['id_empleado'];
	$id_perfil=$_POST['id_perfil'];
	
//guardamos los empleados

//vamos a agregar_empleados.php
	//header('Location: ../agregar_empleados.php');
	//die();
} 
?>