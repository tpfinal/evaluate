<?php
session_start();
/*
 * Guarda el perfil creado
 */

if ($_SERVER['REQUEST_METHOD']=='POST') { // ¿Nos mandan datos por el formulario?
    require('../model/class.perfil.php'); //incluimos la clase perfil
	//require('../model/class.objetivo.php'); //incluimos la clase objetivo / competencia
	require('../php_lib/conexion.php');//incluimos la clase  coneccion
	require('../php_lib/ado.perfil.php');//incluimos la clase de acceso a datos
	//require('../php_lib/ado.objetivo.php');//incluimos la clase de acceso a datos
	//$ado=new adoObjetivo();
	$adoP=new adoPerfil();
	
//recibimos los datos por post
    @$nombre=$_POST['nombre_perfil'];
	@$descripcion=$_POST['descripcion_perfil'];
	
//guardamos en session el los datos del perfil 
	$_SESSION['TEMP']['nombre_perfil']=$nombre;
	$_SESSION['TEMP']['nombre_descripcion']=$descripcion;
	
//creamos el objeto objetivo con los datos recividos
	$obj_perfil = new perfil($nombre,$descripcion);


//guardamos el perfil en la BD
	$adoP=new adoPerfil();
	$adoP->guardarPerfil($obj_perfil);
	
//obtenemos el id del perfil 
	$id_perfil=$adoP->getIdPerfil($nombre);

//lista de competencias selectas para este perfil
	$competencias=$_SESSION['TEMP']['competencias_selectas'];

	
foreach($competencias as $id_competencia)
{
	$adoP->competencia_perfil($id_competencia,$id_perfil);
}

//var_dump($competencias);

//borramos las variables temporales de session
unset($_SESSION['TEMP']);
	
//vamos a nuevo_objetivo.php
	header('Location: ../home_evaluador.php');
	die();
} 
?>