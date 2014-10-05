<div class="grid_12">
<p class="subtitulo">
<?php

 
if ($_SERVER['REQUEST_METHOD']=='POST' ) { // ¿Nos mandan datos por EL FORM?

    require_once('model/class.empleado.php'); //incluimos la clase empleado
	require_once('php_lib/conexion.php'); //incluimos la clase conexion
	require_once('php_lib/ado.empleado.php');//incluimos la clase de acceso a datos
	require_once('php_lib/ado.perfil.php');//incluimos la clase de acceso a datos
	
//Creamos los objetos ado
	$adoE=new adoEmpleado();
	$adoP=new adoPerfil();
	
//recibimos los datos por post
    $id_empleado=$_POST['id_empleado'];
	$id_perfil=$_POST['id_perfil'];

//creamos los objetos empleado y perfil
	$empleado=$adoE->getEmpleadoById($id_empleado);
	$perfil=$adoP->getPerfilById($id_perfil);
	


//cargamos el array con los datos
@$_SESSION['lista'][$id_empleado]=array($empleado->getNombre()." ".$empleado->getApellido(),$perfil->getNombre());
		
//echo var_dump($_SESSION['lista']);
	
}
	
@$lista=$_SESSION['lista'];	
	
if ($_SERVER['REQUEST_METHOD']=='POST' or @$_SESSION['TEMP']['quitar']='quitado' and $lista)	{	

foreach ($lista as $key=>$id)
	{
		echo $id[0];
		echo ' | ';
		echo $id[1];
		echo ' | ';
		echo '<a href="controlers/quitar_controler.php?id='.$key.'">QUITAR</a>';
		echo '</br>';
		
	@$_SESSION['TEMP']['quitar']='';
	
	}
	
}
	
?>
</p>
</div>