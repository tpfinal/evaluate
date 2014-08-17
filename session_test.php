<?php
session_start();
/* 
 * Ejemplo de una página asegurada
 * Simplemente hay que añadir esta línea de PHP al principio.
 */

require('php_lib/include-pagina-restringida.php'); //el incude para vericar que estoy logeado. Si falla salta a la página de login.php
//require('php_lib/solo_administradores.php'); 
include('php_lib/solo_evaluadores.php');
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
			echo "<br/><br/>";
			echo 'usuario: '.@$_SESSION['USUARIO']['user'];
			echo "<br/>";
			echo 'rol desde variable: '.@$_SESSION['USUARIO']['rol'];
			echo "<br/>";
			@$rol=mi_rol();
			echo 'rol desde funcion: '.@$rol; 
			
			?>
        </p>
        <p>Si quieres cerrar la sesión puedes hacer un 
		<a href='php_lib/logout.php' title="Cerrar mi sesion como usuario validado">logout</a>
		</p>
    </body>
</html>
