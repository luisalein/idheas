<form method="post" action="<?=base_url(); ?>index.php/contrasenia_c/cambiarPass" accept-charset="utf-8">
	<fieldset style="padding: 15px;" class="four columns">
	<div class="twelve columns">
		<label for="nombre">Contraseña Actual</label>
		<input type="password" id="oldPass" name="oldPass"  required />
		<label for="nombre">Nueva Contraseña</label>
		<input type="password" id="newPass1" name="newPass1"  required />
		<label for="nombre">Repetir Nueva Contraseña</label>
		<input type="password" id="newPass2" name="newPass2"  required />
		<br />
		<input style="margin-right: 10px; padding: 10px 20px 12px 20px;" class="medium button" type="button" value="Guardar" onclick="cambiarPass()"/>

		<input class="medium button" type="button" value="Cancelar" onclick="cancelarCambioContrasenia()"/>
	</div>	
	
	<br /></fieldset><br />

</form>