<?php
session_start();
/*
 * 
 */

if ($_SERVER['REQUEST_METHOD']=='POST') { // ¿Nos mandan datos por el formulario?


//tomamos los DATOS del Periodo
	//$nombre=$_SESSION['TEMP']['nombre_perido'];
	//$inicio=$_SESSION['TEMP']['inicio'];
	//$fin=$_SESSION['TEMP']['fin'];
	//$cantidad=$_SESSION['TEMP']['cantidad'];
		
//recibimos los datos por session
	$cantidad=$_SESSION['TEMP']['cantidad'];
	var_dump($cantidad);
	
//recibimos las fechas por post y las guardamos en session
   for($i=1 ; $i<=$cantidad ; $i++)
   {
	$_SESSION['TEMP'][$i]=$_POST['theDate'.$i];
	//var_dump($_SESSION['TEMP'][$i]);
   }
   

//vamos a agregar_empleados.php
	header('Location: ../agregar_empleados.php');
	die();
} 
?>