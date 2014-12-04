<?php
/* 
 * Configuración general: conexión a la base de datos y otro parámetros
 */

 /************** Config Deply ***************
 
$mysql_host = "mysql15.000webhost.com";
$mysql_database = "a2632828_evaluat";
$mysql_user = "a2632828_evaluat";
$mysql_password = "evaluate2014";

define('SERVIDOR_MYSQL',$mysql_host);
define('USUARIO_MYSQL',$mysql_user);
define('PASSWORD_MYSQL',$mysql_password);
define('BASE_DATOS',$mysql_database);

/********************************************/ 
 
  /************** Config Desarrollo ***************/
  
define('SERVIDOR_MYSQL','localhost'); //servidor de la base de datos
define('USUARIO_MYSQL','root'); //usuario de la base de datos
define('PASSWORD_MYSQL',''); //la clave para conectar
define('BASE_DATOS','evaluate'); // indica el nombre de la base de datos que contiene la tabla de los usuarios

/********************************************/ 

//método utilizado para almacenar la contraseña encriptada. Opciones: sha1, md5, o texto
define('METODO_ENCRIPTACION_CLAVE','md5'); 


?>
