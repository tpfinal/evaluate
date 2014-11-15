<?php
session_start();
/*
 * 
 */

    require('../model/class.periodo.php'); //incluimos la clase periodo
	require_once('../php_lib/conexion.php'); //incluimos la clase conexion
	require('../php_lib/ado.periodo.php');//incluimos la clase de acceso a datos
	require('../php_lib/formato_fechas.php');
	
	$adoP=new adoPeriodo();
	//$id_creador= $adoE->getIdByDni(@$_SESSION['USUARIO']['user']);
	

//tomamos los datos del Periodo de la session
	
	$nombre=$_SESSION['TEMP']['nombre_periodo'];
	$inicio=$_SESSION['TEMP']['inicio'];
	$fin=$_SESSION['TEMP']['fin'];
	$id_creador=$_SESSION['TEMP']['creador'];		
	$cantidad=$_SESSION['TEMP']['cantidad'];
	
$inicio=stdasql($inicio);
//var_dump($inicio);

$fin=stdasql($fin);
//var_dump($fin);
	
//creamose el objeto periodo
	@$obj_periodo= new periodo($nombre, $inicio, $fin, $id_creador);
    //var_dump($obj_periodo); //para ver el contenido del objeto

	
//Lista con los nombres y los perfiles de los empleados
	$lista=$_SESSION['lista'];
	//echo var_dump($lista);	

if(!$lista)	
{
	echo "<script type='text/javascript'> alert('No ha seleccionado empleados');</script>";
	header('Location: ../agregar_empleados.php');
	die();
}

//Guardamos el Periodo y recuperamos el id
	$id_periodo=$adoP->guardarPeriodo($obj_periodo);
	
//obtenemos el id asignado por la BD
	$id_periodo=$adoP->getIdPeriodo($nombre);

//Guardamos las fechas de EVALUACION
$tipo='o';
  for($i=1 ; $i<=$cantidad ; $i++)
   {
   		$fecha=$_SESSION['TEMP'][$i];
		$fechaSQL=stdasql($fecha);
		$adoP->guardarFecha($fechaSQL,$id_periodo,$tipo);
		
		//echo 'evaluacion '.$i;
		//var_dump($fechaSQL);
   }	
   
//Guardamos las relaciones empleado-periodo en la BD
foreach ($lista as $key=>$id)
{
	$adoP->guardarEmpleado($key,$id[2],$id_periodo);
}

//limpiamos las variables guardadas en sesion
unset($_SESSION['lista']);
unset($_SESSION['TEMP']);

//vamos al menu principal
echo "<script type='text/javascript'> alert('Periodo guardado');</script>";
	header('Location: ../home_evaluador.php');
	die();
?>