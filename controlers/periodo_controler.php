<?php
session_start();
/*
 * 
 */

if ($_SERVER['REQUEST_METHOD']=='POST') { // �Nos mandan datos por el formulario?
    //require('../model/class.periodo.php'); //incluimos la clase periodo
	require_once('../php_lib/conexion.php'); //incluimos la clase conexion
	require('../php_lib/ado.empleado.php');//incluimos la clase de acceso a datos
	require('../php_lib/ado.periodo.php');//incluimos la clase de acceso a datos
	
	$adoE=new adoEmpleado();
	$adoP=new adoPeriodo();
	$id= $adoE->getIdByDni(@$_SESSION['USUARIO']['user']);
	
	
	//recibimos los datos por post
    @$nombre=$_POST['nombre_periodo'];
	@$inicio=$_POST['theDate1'];
	@$fin=$_POST['theDate2'];
	@$creador=$id;
	@$cantidad=$_POST['cantidad'];
	
	echo $nombre.'</br>';
	echo $inicio.'</br>';
	echo $fin.'</br>';
	echo 'Id Creador: '.$creador.'</br>';
	echo $cantidad.'</br>';
	
	
//obtenemos el id que va a tener el periodo
	$id_periodo=$adoP->getIdPeriodo();
	echo 'ID_periodo: '.$id_periodo;

	
//guardamos en session el id del perfil para mandarselo al objetivo
	
	//$_SESSION['id_perfil']=$ado->getIdPerfil($nombre);
	
	
//vamos a nuevo_objetivo.php
	//header('Location: ../agregar_evaluaciones.php');
	//die();
} 
?>