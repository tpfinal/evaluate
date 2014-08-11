<?php
/*
 * Valida un usuario y contraseña o presenta el formulario para hacer login denuevo
 */

if ($_SERVER['REQUEST_METHOD']=='POST') { // ¿Nos mandan datos por el formulario?
    include('../php_lib/config.ini.php'); //incluimos configuración
    include('../php_lib/login.lib.php'); //incluimos las funciones

    //verificamos el usuario y contraseña mandados 
    if (login($_POST['usuario'],$_POST['pass'])) {
			
       //acciones a realizar cuando un usuario se identifica
       //Aqui deberenos identificar el rol y derivar a la paginas que correspondan
        
		//entramos al área restringida
        header('Location: ../home_admin.php');
        die();
    } 
	//si el usuario no es valido
	else {
        //acciones a realizar en un intento fallido
        //Ej: mostrar captcha para evitar ataques fuerza bruta, bloqueas durante un rato esta ip, ....

        //preparamos un mensaje de error y continuamos para mostrar el formulario de login
        //$mensaje='Usuario o contraseña incorrecto.';
		
		header('Location: ../home.php');
		die();
    }
} //fin if post
?>