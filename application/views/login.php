<!DOCTYPE html>
<html >
	<head>
		<meta charset="utf-8">
		<title>Login Idheas</title>

<meta charset ="utf-8" />
<meta name="viewport" content="width=device-width" />
<link rel="stylesheet" href="<?=base_url(); ?>statics/css/core/login.css">
<link rel="stylesheet" href="<?=base_url(); ?>statics/css/core/foundation.min.css">
	</head>

	<body>
			
	<form action="<?=base_url(); ?>index.php/login_c" method="post" accept-charset="utf-8">
		<div id="container" name="container" class="six columns" class="twelve columns">
			<div id="encabezado" name="encabezado" class="twelve columns">	
				<div id="bienvenido" name="bienvenido" class="six columns" >
					<h3>Bienvenido</h3>
				</div>
				<br>
				<div id="logo" class="six columns">
					<?php echo img('statics/media/img/system/logo.png');?>
				</div>
			</div> <!--Termina encabezado de la página-->
			<br>
			<div id="texto">
				<?php echo br(1);?>
			</div>
			<div id="formulario" name="formulario" class="six columns">
					
						<div id="contenidoLogin">
						<H3>Usuario</H3>
						<input id="usuario" type="text" name="usuario"  required />
						<?php echo br(2);?>
						<H3>Contraseña</H3>
						<input id="contrasenia" type="password" name="contrasenia" required />
						<p class="submit">  
						<?php echo br(1);?>
							<input type="submit" class="medium button" style="float: right; " value="Aceptar" />  
						<?php echo br(3);?>
						</div>
						</p>
					
			</div>		
			
			</div><!--Termina el contenido de la página-->
		</form>
	</body>
</html>


