<?php
/**
 * Libreria para validar un usuario comprobando su usuario (o dni) y contraseña

/**
 * valida un usuario y contraseña
 * @param string $usuario
 * @param string $pass
 * @return bool
 */
function login($usuario,$pass) {

    //usuario y password tienen datos?
    if (empty($usuario)) return false;
    if (empty ($pass)) return false;

    //1 - conectamos a la base de datos utilizando los parámetros globales
    $link =  mysql_connect(SERVIDOR_MYSQL, USUARIO_MYSQL, PASSWORD_MYSQL);

    if (!$link) {
        trigger_error('Error al conectar al servidor mysql: ' . mysql_error(),E_USER_ERROR);
    }
    // Seleccionar la base de datos activa
    $db_selected = mysql_select_db(BASE_DATOS, $link);
    if (!$db_selected) {
        trigger_error ('Error al conectar a la base de datos: ' . mysql_error(),E_USER_ERROR);
    }

    //2 - preparamos la consulta SQL a ejecutar utilizando sólo el usuario y evitando ataques de inyección SQL.
    $query='SELECT usuario,pass,rol
			FROM usuario 
			WHERE usuario ="'.  mysql_real_escape_string($usuario).'" 
			LIMIT 1 '; //la tabla y el campo se definen en los parametros globales, se limita una respuesta
    $result = mysql_query($query);
    if (!$result) {
        trigger_error('Error al ejecutar la consulta SQL: ' . mysql_error(),E_USER_ERROR);
    }

    //3 - extraemos el registro de este usuario
    $row = mysql_fetch_assoc($result);

    if ($row) {
        //4 - Generamos el hash de la contraseña encriptada para comparar o lo dejamos como texto plano
        switch (METODO_ENCRIPTACION_CLAVE) {
            case 'sha1'|'SHA1':
                $hash=sha1($pass);
                break;
            case 'md5'|'MD5':
                $hash=md5($pass);
                break;
            case 'texto'|'TEXTO':
                $hash=$pass;
                break;
            default:
                trigger_error('El valor de la constante METODO_ENCRIPTACION_CLAVE no es válido. Utiliza MD5 o SHA1 o TEXTO',E_USER_ERROR);
        }

        var_dump($row);
        var_dump($hash);
		
        //5 - comprobamos la contraseña
        if ($hash==$row[pass]) {
            @session_start();
            $_SESSION['USUARIO']=array('user'=>$row['usuario'],'rol'=>$row['rol']); //almacenamos en memoria el usuario
	
            // en este punto puede ser interesante guardar más datos en memoria para su posterior uso, como por ejemplo un array asociativo con el id, nombre, email, preferencias, ....
            	
			return true; //usuario y contraseña validadas
			
        } else {
            @session_start();
            unset($_SESSION['USUARIO']); //destruimos la session activa al fallar el login por si existia
            return false; //no coincide la contraseña
        }
    } else {
        //El usuario no existe
        return false;
    }

}

/**
 * Veridica si el usuario está logeado
 * @return bool
 */
function estoy_logeado () {
    @session_start(); //inicia sesion (la @ evita los mensajes de error si la session ya está iniciada)
    
    if (!isset($_SESSION['USUARIO'])) return false; //no existe la variable $_SESSION['USUARIO']. No logeado.
    if (!is_array($_SESSION['USUARIO'])) return false; //la variable no es un array $_SESSION['USUARIO']. No logeado.
    if (empty($_SESSION['USUARIO']['user'])) return false; //no tiene almacenado el usuario en $_SESSION['USUARIO']. No logeado.

    //cumple las condiciones anteriores, entonces es un usuario validado
    return true;

}

/**
 * Vacia la sesion con los datos del usuario validado
 */
function logout() {
    @session_start(); //inicia sesion (la @ evita los mensajes de error si la session ya está iniciada)
    unset($_SESSION['USUARIO']); //eliminamos la variable con los datos de usuario;
    session_write_close(); //nos asegurmos que se guarda y cierra la sesion
    return true;
}


    
?>
