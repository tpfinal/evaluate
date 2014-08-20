<?php session_start();
/* 
 * Página asegurada
 * Simplemente hay que añadir esta línea de PHP al principio.
 */
require('php_lib/include-pagina-restringida.php'); //el incude para vericar que estoy logeado. Si falla salta a la página de login.php
require('php_lib/solo_administradores.php');//restringe acceso a roles diferentes de 1 y 3 
?>

<!DOCTYPE html>
<html lang="es">
	<head>
	<?php include("metadata.php"); ?>
	</head>
	
	
 <body class="page1" id="top">
<!--==============================header=================================--> 
<div class="container_12">
<div class="grid_12">
<?php include("header/header.php"); ?>
<!--==============================menu=================================--> 
<?php include("menu/menu.php"); ?>
</div>
</div>
<!--==============================Content (texto - contenido) =================================-->
	<div class="container_12">
	<div class="content" id="dejar_espacio">
	<div class="grid_6 prefix_3">

	
				<form action="controlers/alta_controler.php" method="post" id="abm_empleados" novalidate="novalidate">
				<header>
                    Alta De Empleados
                </header>
				
                <fieldset>
				
						<section>
                        <label class="input">
                            <input type="text" name="nombre" placeholder="Nombre"></input>
                            <b class="tooltip tooltip-bottom-right">
                                Solo se admiten letras.
                            </b>
                        </label>
                    </section>					
					
					<section>
                        <label class="input">
                            <input type="text" name="apellido" placeholder="Apellido"></input>
                            <b class="tooltip tooltip-bottom-right">
                                Solo se admiten letras.
                            </b>
                        </label>
                    </section>
					
                    <section>
                        <label class="input">
                            <input type="numbers" name="dni" placeholder="Dni"></input>
                            <b class="tooltip tooltip-bottom-right">
							Ingrese su DNI sin puntos ni espacios
                            </b>
                        </label>
                    </section>
					<section>
                        <label class="input">
                            <input type="text" name="email" placeholder="Email"></input>
                            <b class="tooltip tooltip-bottom-right">
                                Introduzca un E-mail verdadero por favor.
                            </b>
                        </label>
                    </section>
                    <section>
                        <label class="input">
                            <input type="text" name="puesto" placeholder="Puesto"></input>
                            <b class="tooltip tooltip-bottom-right">
							Ingrese el puesto que tiene en la empresa
                            </b>
                        </label>
                    </section>
                    <section>
                        <label class="input">
							<input id="password" type="password" name="password" placeholder="Contrase&ntilde;a"/>
                            <b class="tooltip tooltip-bottom-right">
							Ingrese una contrase&ntilde;a.
							</b>
                        </label>
						<label class="input">
							<input id="password_again" type="password" name="password_again" placeholder="Repita Contrase&ntilde;a" />
                            <b class="tooltip tooltip-bottom-right">
							Confirme la contrase&ntilde;a.
                            </b>
                        </label>
                    </section>
					
                    
                        
                   
					
					<section name="rol" class="radios">
						<input type="checkbox" name="rol1" value=1>Administrador</input>
						<input type="checkbox" name="rol2" value=2>Evaluador</input>
					</section>
                </fieldset>
				
															
				
				
                    <button class="button" type="submit">Guardar</button>
            </form>
			
			
		
			
			
			
			
			
	</div>
	</div>
<!--==============================Flecha Atras =================================-->
	           <div class="clear"></div>
		<div class="grid_1" id="flecha_atras">
        <a href="home_admin.php">
          <img src="images/flecha_atras.png" alt="ATRAS">
        </a>
		</div>		
</div>
<!--==============================footer=================================-->
<?php include("footer/pie.php"); ?>
</body>
</html>