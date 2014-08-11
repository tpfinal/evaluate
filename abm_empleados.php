<?php session_start();
/* 
 * Página asegurada
 * Simplemente hay que añadir esta línea de PHP al principio.
 */
require('php_lib/include-pagina-restringida.php'); //el incude para vericar que estoy logeado. Si falla salta a la página de login.php
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
			<form class="abm_empleados" action="">
                <header>
                    Alta De Empleados
                </header>
                <fieldset>
                    <section>
                        <label class="input">
                            <input type="text" placeholder="Nombre"></input>
                            <b class="tooltip tooltip-bottom-right">
                                Solo se admiten letras.
                            </b>
                        </label>
                    </section>
					<section>
                        <label class="input">
                            <input type="text" placeholder="Apellido"></input>
                            <b class="tooltip tooltip-bottom-right">
                                Solo se admiten letras y números.
                            </b>
                        </label>
                    </section>
                    <section>
                        <label class="input">
                            <input type="numbers" placeholder="Dni"></input>
                            <b class="tooltip tooltip-bottom-right">
							Ingrese su DNI sin puntos ni espacios
                            </b>
                        </label>
                    </section>
					<section>
                        <label class="input">
                            <input type="text" placeholder="Email"></input>
                            <b class="tooltip tooltip-bottom-right">
                                Introduzca un E-mail verdadero por favor.
                            </b>
                        </label>
                    </section>
                    <section>
                        <label class="input">
                            <input type="text" placeholder="Puesto"></input>
                            <b class="tooltip tooltip-bottom-right">
							Ingrese el puesto que tiene en la empresa
                            </b>
                        </label>
                    </section>
                    <section>
                        <label class="input">
                            <input type="password" placeholder="Contraseña"></input>
                            <b class="tooltip tooltip-bottom-right">
							Ingrese una contraseña.
							</b>
                        </label>
                    </section>
                    <section>
                        <label class="input">
                            <input type="password" placeholder="Repita Contraseña"></input>
                            <b class="tooltip tooltip-bottom-right">
							Confirme la contraseña.
                            </b>
                        </label>
                    </section>
					<section class="radios">
						<input type="radio" name="rol" value="administrador">Administrador</input>
						<input type="radio" name="rol" value="evaluador">Evaluador</input>
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