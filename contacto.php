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
<!--==============================Content=================================-->
  <div class="container_12">
    <div class="content">
<div class="grid_12">
            <div class="map">
            <figure>
                 <iframe src="https://mapsengine.google.com/map/embed?mid=zGH4DTZm7YLQ.kmxOGROxmaHA"></iframe>
               </figure>
          </div>
    </div>  
    <div class="clear"></div>
    <div class="grid_3">
      <h4 class="head1">Datos</h4>
      <p>Evaluate<br>
      Florencio Varela 1903 San Justo</br>
	  Buenos Aires, Argentina</p>
      Tel&eacute;fono (54-11) 4480-8900<br>
    </div>
    <div class="grid_9">
      <h4 class="head1">Contacto</h4>
            <form id="form">
                            
                      <div class="success_wrapper">
                      <div class="success-message">Formulario Enviado !</div>
                      </div>
                      <label class="name">
                      <input type="text" placeholder="Nombre:" data-constraints="@Required @JustLetters" />
                      <span class="empty-message">*CAMPO OBLIGATORIO.</span>
                      <span class="error-message">*NOMBRE INVALIDO.</span>
                      </label>
                    
                      <label class="email">
                      <input type="text" placeholder="E-mail:" data-constraints="@Required @Email" />
                      <span class="empty-message">*CAMPO OBLIGATORIO.</span>
                      <span class="error-message">*FORMATO INVALIDO.</span>
                      </label>
                       <label class="phone">
                          <input type="text" placeholder="Telefono:" data-constraints="@Required @JustNumbers"/>
                          <span class="empty-message">*CAMPO OBLIGATORIO.</span>
                          <span class="error-message">*FORMATO INVALIDO.</span>
                          </label>
                      <label class="message">
                      <textarea placeholder="Mensaje:" data-constraints='@Required @Length(min=20,max=999999)'></textarea>
                      <span class="empty-message">*CAMPO OBLIGATORIO.</span>
                      <span class="error-message">*EL MENSAJE ES MUY CORTO.</span>
                      </label>
                      <div>
                      <div class="clear"></div>
                      <div class="btns">
                      <a href="#" data-type="reset" class="btn">Limpiar</a>
                      <a href="#" data-type="submit" class="btn">Enviar</a>
                      </div>
                      </div>
                      </form>   
    </div>
  </div>
</div>
<!--==============================footer=================================-->
	<?php include("footer/pie.php"); ?>
</body>
</html>

