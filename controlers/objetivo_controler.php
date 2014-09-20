<?php
session_start();
/*
 * Guarda el objetivo creado
 */

if ($_SERVER['REQUEST_METHOD']=='POST') { // ¿Nos mandan datos por el formulario?
    require('../model/class.objetivo.php'); //incluimos la clase perfil
	require('../php_lib/conexion.php'); //incluimos la clase conexion
	require('../php_lib/ado.objetivo.php');//incluimos la clase de acceso a datos
	
	//recibimos los datos por post
    @$nombre=$_POST['nombre_objetivo'];
	@$descripcion=$_POST['descripcion_objetivo'];
	@$tipo='o';
	@$id_perfil=$_SESSION['id_perfil'];

//echos de prueba
	echo $nombre;
	echo '</br>';
	echo $descripcion;
	echo '</br>';
	echo $tipo;
	echo '</br>';
	echo $id_perfil;
	echo '</br>';
	
//creamos el objeto objetivo con los datos recividos
	$obj = new objetivo($nombre,$descripcion,$tipo,$id_perfil);
	
	//echos de prueba
	echo $obj->getNombre();
	echo '</br>';
	echo $obj->getDescripcion();
	echo '</br>';
	echo $obj->getTipo();
		echo '</br>';
	echo $obj->getId_perfil();

//guardamos el empleado en la BD
	$ado=new adoObjetivo();
	$ado->guardarObjetivo($obj);
	

	
//vamos a nuevo_objetivo.php
	header('Location: ../nuevo_objetivo.php');
	die();
} 
?>
