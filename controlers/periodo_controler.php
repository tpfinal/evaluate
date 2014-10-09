<?php
session_start();
/*
 * 
 */

if ($_SERVER['REQUEST_METHOD']=='POST') { // ¿Nos mandan datos por el formulario?
    //require('../model/class.periodo.php'); //incluimos la clase periodo
	require_once('../php_lib/conexion.php'); //incluimos la clase conexion
	require('../php_lib/ado.empleado.php');//incluimos la clase de acceso a datos
	
	$adoE=new adoEmpleado();
	$id= $adoE->getIdByDni(@$_SESSION['USUARIO']['user']);
	
//recibimos los datos por post y los guardamos en variables
    @$nombre=$_POST['nombre_periodo'];
	@$inicio=$_POST['theDate1'];
	@$fin=$_POST['theDate2'];
	@$creador=$id;
	@$cantidad=$_POST['cantidad'];
		
//obtenemos el id que va a tener el periodo
	//$id_periodo=$adoP->getIdPeriodo('prueba');
	//echo 'ID_periodo: '.$id_periodo;
	
//guardamos en session los DATOS
	
	$_SESSION['TEMP']['nombre_perido']=$nombre;
	$_SESSION['TEMP']['inicio']=$inicio;
	$_SESSION['TEMP']['fin']=$fin;
	$_SESSION['TEMP']['cantidad']=$cantidad;	
	
//vamos a agregar_evaluaciones.php
	header('Location: ../agregar_evaluaciones.php');
	die();
} 
?>