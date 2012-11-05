
<!-------------------Comienza la parte de relación entre casos------------------------------------->
<div id="formularioRelacionCasos">
<div id="pestania" data-collapse>
	<h2 class="twelve columns">Detalle de la relación entre casos</h2><!--título de la sub-pestaña-->  
	<div>
		<span>Nombre del caso</span>	
		
		<span>tipo de relación</span>	
		
			select con relaciones
		
		<div class="twelve columns">
				
			<div class="four columns">
				
				<label>Nombre del caso: </label>
                    <input type="text" id="casos_nombre" name="casos_nombre" value="<?php echo set_value('nombre'); ?>" size="30" maxlength="30" required />
				
			</div>
			
			<div class="four columns">
				
				<label>fecha inicial: </label>
					<input type="text" id="casosfechaInicial" name="casos_fechaInicial" value="<?php echo set_value('fecha'); ?>" placeholder="AAAA-MM-DD" />
			</div>
			
			<div class="four columns">
				
				<label>fecha de término: </label>
					<input type="text" id="casosfechaTermino" name="casos_fechaTermino" value="<?php echo set_value('fecha'); ?>" placeholder="AAAA-MM-DD" />
				
			</div>
		
		</div>


		<div class="twelve columns">
				<p>
					<label for="comentFuente">Comentarios</label>
					<textarea id="relacionCasos_comentarios" style="width: 400px; height: 200px" name="relacionCasos_comentarios" wrap="hard"  > </textarea>
					<script>
					var instance = new TINY.editor.edit('relacionCasos_comentarios', {
						id: 'relacionCasos_comentarios',
						width: 584,
						height: 175,
						cssclass: 'tinyeditor',
						controlclass: 'tinyeditor-control',
						rowclass: 'tinyeditor-header',
						dividerclass: 'tinyeditor-divider',
						controls: ['bold', 'italic', 'underline', '|', 'leftalign','centeralign', 'rightalign', 'blockjustify', '|', 'undo', 'redo'],
						footer: false,
						xhtml: false,
						bodyid: 'editor',
						toggle: {text: 'source', activetext: 'wysiwyg', cssclass: 'toggle'},
						resize: {cssclass: 'resize'}
					});
					</script>
				</p>	 
		
		</div>
		
		
		<div class="twelve columns">
				<p>
					<label for="comentFuente">Observaciones</label>
					<textarea id="relacionCasos_observaciones" style="width: 400px; height: 200px" name="relacionCasos_observaciones" wrap="hard"  > </textarea>
					<script>
					var instance = new TINY.editor.edit('relacionCasos_observaciones', {
						id: 'relacionCasos_observaciones',
						width: 584,
						height: 175,
						cssclass: 'tinyeditor',
						controlclass: 'tinyeditor-control',
							rowclass: 'tinyeditor-header',
						dividerclass: 'tinyeditor-divider',
						controls: ['bold', 'italic', 'underline', '|', 'leftalign','centeralign', 'rightalign', 'blockjustify', '|', 'undo', 'redo'],
						footer: false,
						xhtml: false,
						bodyid: 'editor',
						toggle: {text: 'source', activetext: 'wysiwyg', cssclass: 'toggle'},
						resize: {cssclass: 'resize'}
					});
					</script>
				</p>	 
		
		</div>
		

	
		
	</div>
	
</div>
</div>
<!-------------------Termina la parte de relación entre casos------------------------------------->
