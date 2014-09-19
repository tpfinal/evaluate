<?php
session_start();
/*
 * Guarda el perfil creado
 */

if ($_SERVER['REQUEST_METHOD']=='POST') { // ¿Nos mandan datos por el formulario?
    require('../model/class.perfil.php'); //incluimos la clase perfil
	require('../php_lib/ado.empleado.php');//incluimos la clase de acceso a datos
	
	//recibimos los datos por post
    @$nombre=$_POST['nombre_perfil'];
	@$descripcion=$_POST['descripcion_perfil'];

	
//creamos el objeto objetivo con los datos recividos
	$obj_perfil = new perfil($nombre,$descripcion);


//guardamos el empleado en la BD
	$ado=new adoEmpleado();
	$ado->guardarPerfil($obj_perfil);
	
//guardamos en session el id del perfil para mandarselo al objetivo
	
	$_SESSION['id_perfil']=$ado->getIdPerfil($nombre);
	
	
//vamos a nuevo_objetivo.php
	header('Location: ../nuevo_objetivo.php');
	die();
} 
?>