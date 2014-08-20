<?php
session_start();
/* 
 * Ejemplo de una página asegurada
 * Simplemente hay que añadir esta línea de PHP al principio.
 */

require('php_lib/include-pagina-restringida.php'); //el incude para vericar que estoy logeado. Si falla salta a la página de login.php
//require('php_lib/solo_administradores.php'); 
//include('php_lib/solo_evaluadores.php');

//incluimos el archivo de la clase empleado y el del ado y creamos el objeto
require('model/class.empleado.php');
require('php_lib/ado.empleado.php');
$ado = new adoEmpleado();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Página de acceso restringido</title>
    </head>
    <body>
        <p>
            Si ves esta página es que eres un usuario validado:
			<?php
			echo "<h2>Test de variables de sesision</h2>";
			echo 'usuario: '.@$_SESSION['USUARIO']['user'];
			echo "<br/>";
			echo 'rol desde variable: '.@$_SESSION['USUARIO']['rol'];
			echo "<br/>";
			
			echo "<h2>Test de funciones</h2>";
			@$rol=mi_rol();
			echo 'rol desde funcion: '.@$rol; 
			echo "<br/>";
			@$id= $ado->getIdByDni(@$_SESSION['USUARIO']['user']);
			echo 'id desde funcion: '.@$id;
			
			echo "<h2>Test de objeto empleado</h2>";
		//getEmpleado regresa un objeto con los datos del empleado
			$obj_empleado=$ado->getEmpleado($_SESSION['USUARIO']['user']);
			
			echo $obj_empleado->getNombre();
			echo '</br>';
			echo $obj_empleado->getDni();

			
			?>
        </p>
        <p>Si quieres cerrar la sesión puedes hacer un 
		<a href='php_lib/logout.php' title="Cerrar mi sesion como usuario validado">logout</a>
		</p>
    </body>
</html>
