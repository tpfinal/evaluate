<?php
$rol=$_SESSION['USUARIO']['rol'];
switch ($rol) {
  case 1:
    $rol_name='Administrador';
    break;
  case 2:
    $rol_name='Evaluador';
    break;
  case 3:
    $rol_name='Administrador Evaluador';
    break;
  default:
	$rol_name='Empleado';
	break;
} 
?>
<form action="php_lib/logout.php" enctype="multipart/form-data" method="post">
				<span class="user"><?php echo $_SESSION['USUARIO']['user'];?></span>
				<span class="rol">|<?php echo $rol_name?>| </span>
				<input type="submit" value="Logout"/>
				<a href="#"><img src="images/user_icon.jpg"></a>
</form>	
   