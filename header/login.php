

<form class="login" action="controlers/login_controler.php" enctype="multipart/form-data" method="post">	
			<input name="usuario" type="name" value="usuario" onBlur="if(this.value=='')this.value='usuario'" onFocus="if(this.value=='usuario')this.value=''"/>
			<input name="pass" type="password" value="pass" onBlur="if(this.value=='')this.value='pass'" onFocus="if(this.value=='pass')this.value=''"/>
			<input type="submit" value="Login"/> 
			<a href="#"><img src="images/user_icon.jpg"></a>
</form>
