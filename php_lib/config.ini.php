<?php
/* 
 * Configuración general: conexión a la base de datos y otro parámetros
 */

define('SERVIDOR_MYSQL','localhost'); //servidor de la base de datos
define('USUARIO_MYSQL','root'); //usuario de la base de datos
define('PASSWORD_MYSQL',''); //la clave para conectar
define('BASE_DATOS','evaluate'); // indica el nombre de la base de datos que contiene la tabla de los usuarios

define('METODO_ENCRIPTACION_CLAVE','texto'); //método utilizado para almacenar la contraseña encriptada. Opciones: sha1, md5, o texto


?>
