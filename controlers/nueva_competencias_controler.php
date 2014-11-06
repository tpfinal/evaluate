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
	@$tipo='c';
	//@$id_perfil=$_SESSION['id_perfil'];
	
//Guardamos los datos en sessionpara almacenarlos mas adelante
	//$_SESSION['TEMP']['nombre_competencia']=$nombre;
	
	
//creamos el objeto objetivo con los datos recividos
	$obj = new objetivo($nombre,$descripcion,$tipo,0);
	

//guardamos la competencia en la BD
	$ado=new adoObjetivo();
	$ado->guardarObjetivo($obj);
	

//volvemos a competencias.php
	header('Location: ../competencias.php');
	die();
} 
?>
