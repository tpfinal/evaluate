<?php
session_start();
/*
 * 
 */

    require('../model/class.periodo.php'); //incluimos la clase periodo
	require_once('../php_lib/conexion.php'); //incluimos la clase conexion
	require('../php_lib/ado.periodo.php');//incluimos la clase de acceso a datos
	//require('../php_lib/ado.empleado.php');//incluimos la clase de acceso a datos	
	
	//$adoE=new adoEmpleado();
	$adoP=new adoPeriodo();
	//$id_creador= $adoE->getIdByDni(@$_SESSION['USUARIO']['user']);
	

//tomamos los datos del Periodo de la session
	
	$nombre=$_SESSION['TEMP']['nombre_periodo'];
	$inicio=$_SESSION['TEMP']['inicio'];
	$fin=$_SESSION['TEMP']['fin'];
	$id_creador=$_SESSION['TEMP']['creador'];		
	$cantidad=$_SESSION['TEMP']['cantidad'];
	
//GUARDAMOS EL PERIODO//
	
//creamose el objeto periodo
	@$obj_periodo= new periodo($nombre, $inicio, $fin, $id_creador);
//var_dump($obj_periodo); //para ver el contenido del objeto
	
//Guardamos el Periodo
	$adoP->guardarPeriodo($obj_periodo);

//obtenemos el id asignado por la BD
	$id_periodo=$adoP->getIdPeriodo($nombre);

//Guardamos las fechas de EVALUACION//
  
 //Funcion formato fecha
function fechaSQL($fecha)
{
	$sql_date=new DateTime($fecha);
	$newFecha = $sql_date->format('Y-m-d'); 
	return $newFecha;
}
$tipo='o';
  for($i=1 ; $i<=$cantidad ; $i++)
   {
   		$fecha=$_SESSION['TEMP'][$i];
		$fechaSQL=fechaSQL($fecha);
		$adoP->guardarFecha($fechaSQL,$id_periodo,$tipo);
		//echo $fecha.' ';
   }

	
//Lista con los nombres y los perfiles de los empleados
	$lista=$_SESSION['lista'];
	//echo var_dump($lista);	
			
	
//guardamos los empleados en la BD
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