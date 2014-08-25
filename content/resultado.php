<?php


if ($_SERVER['REQUEST_METHOD']=='POST') { // ¿Nos mandan datos por EL FORM?
    require_once('model/class.empleado.php'); //incluimos la clase empleado
	require_once('php_lib/ado.empleado.php');//incluimos la clase de acceso a datos
	
	//Creamos el objeto ado
	$ado=new adoEmpleado();
	
	//recibimos los datos por get
    $dni=$_POST['dni'];

	$empleado=$ado->getEmpleado($dni);
	
	if($empleado->getNombre() )
	{
		echo 'Registro encontrado:';
		echo '</br>';
		echo $empleado->getNombre()." ".$empleado->getApellido();
		echo ' | ';
		$_SESSION['borrar']=$empleado->getDni();
		echo '<a href="controlers/eliminar_controler.php">ELIMINAR</a>';
		echo ' | ';
		$_SESSION['modificar']=$empleado->getDni();
		echo '<a href="modificar_registro.php">MODIFICAR</a>';
	}
	else
	{
		echo 'No se encontro empelado';
	}
}
	if(@$_SESSION['borrar']=='borrado'){
	$_SESSION['borrar']="";
		echo 'Registro Eliminado';
	}
		if(@$_SESSION['modificar']=='modificado'){
	$_SESSION['modificar']="";
		echo 'Registro Modificado';
	}

?>