<?php
session_start();
/*
 * 
 */

if ($_SERVER['REQUEST_METHOD']=='POST') { // ¿Nos mandan datos por el formulario?
	
	
//recibimos la cantidad por session
	$cantidad=$_SESSION['TEMP']['cantidad'];
	
//recibimos las fechas por post y las guardamos en session
   for($i=1 ; $i<=$cantidad ; $i++)
   {
   $_SESSION['TEMP'][$i]=$_POST['theDate'.$i];
	}
	
	
//vamos a agregar_evaluaciones.php
	header('Location: ../agregar_empleados.php');
	die();
} 
?>