<?php
/* 
 * Cierra la sesión como usuario validado
 */

include('login.lib.php'); //incluimos las funciones
logout(); //vacia la session del usuario actual
header('Location: ../home.php'); //saltamos a login.php

?>
