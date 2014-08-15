<?php
/*
 * Valida un usuario y contrase�a o presenta el formulario para hacer login denuevo
 */

if ($_SERVER['REQUEST_METHOD']=='POST') { // �Nos mandan datos por el formulario?
    include('../php_lib/config.ini.php'); //incluimos configuraci�n
    include('../php_lib/login.lib.php'); //incluimos las funciones

    //verificamos el usuario y contrase�a mandados 
    if (login($_POST['usuario'],$_POST['pass'])) {
			if ($_SESSION['USUARIO']['rol']==1){
				header('Location: ../home_admin.php');
				die();
			}
			if ($_SESSION['USUARIO']['rol']==2){
				header('Location: ../home_evaluador.php');
				die();
			}
			if ($_SESSION['USUARIO']['rol']==3){
				header('Location: ../home_admin.php');
				die();
			}
			if ($_SESSION['USUARIO']['rol']==0){
				header('Location: ../home_empleado.php');
				die();
			}
    } 
	//si el usuario no es valido
	else {
        //acciones a realizar en un intento fallido
        //Ej: mostrar captcha para evitar ataques fuerza bruta, bloqueas durante un rato esta ip, ....

        //preparamos un mensaje de error y continuamos para mostrar el formulario de login
        //$mensaje='Usuario o contrase�a incorrecto.';
		
		header('Location: ../home.php');
		die();
    }
} //fin if post
?>