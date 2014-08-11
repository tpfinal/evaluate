
<form action="php_lib/logout.php" enctype="multipart/form-data" method="post">
				<span class="user"><?php echo $_SESSION['USUARIO']['user'];?></span>
				<span class="rol">|Administrador| </span>
				<input type="submit" value="Logout"/>
				<a href="#"><img src="images/user_icon.jpg"></a>
</form>	
   