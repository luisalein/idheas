<ul class="tabs-content">
    <li class="active" ><!--Pestaña Actores Individuales--->
    <?php if(isset($is_actor_type)){ ?>
        <dl class="tabs"><!--Pestañas de Actores-->
        <dd class="<?=($is_actor_type == 1) ? 'active' : ''; ?>" ><a href="<?=base_url(); ?>index.php/actores_c/mostrar_actor/0/1">Actor individual</a></dd>
        <dd class="<?=($is_actor_type == 2) ? 'active' : ''; ?>"><a href="<?=base_url(); ?>index.php/actores_c/mostrar_actor/0/2">Actor transmigrante</a></dd>
        <dd class="<?=($is_actor_type == 3) ? 'active' : ''; ?>"><a href="<?=base_url(); ?>index.php/actores_c/mostrar_actor/0/3">Actor colectivo</a></dd>
    </dl>
    <?php } ?>
    <ul class="tabs-content">
        <li class="active" id="simple1Tab">
            <?php if (!isset($actorId)) {
                $actorId=0;
            }?>
        <!---Contenido de la pestaña Actor individual-->
        <div class="three columns lineasLista">
            <?php if(isset($is_actor_type)){ ?>
                <div class="<?= ($actorId>0) ? 'six columns' : 'twelve columns espacioSuperior' ;?>">
                <form method="post" action="<?=base_url(); ?>index.php/actores_c/agregar_actor/<?=$is_actor_type; ?>">
                    <center><input type="submit" value="Agregar Actor" class="tiny button"/></center>
                </form>
                </div>
                
                <?php if(isset($actorId)){
                    if ( $actorId > 0) {
                     ?>
                        <div class="six columns">
                                <center><input type="button" value="Eliminar Actor" class="tiny button" name="<?=$actorId; ?>&<?=$is_actor_type; ?>" id="eliminarActor"/></center>
                        </div>
                        <div class="twelve columns">
                            <form method="post" action="<?=base_url(); ?>index.php/actores_c/editar_actor/<?=$actorId; ?>/<?=$is_actor_type; ?>" >
                                <center><input type="submit" value="Editar Actor" class="tiny button" /></center>
                            </form>
                        </div>
                <?php } } ?>
            <?php } 
            else { ?>
                <?php if (isset($casoId)) {
                    if ($casoId>0) {?>
                        <div class="six columns">
                           <form method="post" action="<?=base_url(); ?>index.php/casos_c/editarCaso/<?=$casoId; ?>">
                                <input type="submit" class="tiny button" value="Editar Caso" />
                           </form>
                        </div>
                        <div class="six columns">
                           <form method="post" >
                           	 <input type="button" value="Eliminar Caso" class="tiny button"  name="<?=$casoId; ?>" id="eliminarCaso"/>	
                           </form>
                       </div>
                     <?php }
                }?>
            <div class="twelve columns">
                <div class="three columns"></div>
                <div clas="six columns">
                    <form method="post" action="<?=base_url(); ?>index.php/casos_c/agregar_caso">
                        <input type="submit" value="Agregar Caso" class="tiny button" />
                    </form>
                </div>
            </div>
            <?php } ?>
            <?=(isset($lista)) ? $lista : '' ;?> <!---Se llama a listaActores-->
        </div>
        
        <div class="<?=(isset($action)) ? 'nine columns' : 'nine columns' ; ?>">
            <div><?=(isset($form)) ? $form : '' ;?></div>


                <?php if (isset($casos) && isset($EstoyEnActor)){ ?>
                <div class="twelve columns">
                    <fieldset>
                        <legend>Mostrar Casos</legend>
                      <div> <?= $casos?> </div>
                    </fieldset>
                </div>
                <?php }?>
        </div>

        <!--Termina contenido de la pestaña Actor individual-->
        </li>
    </ul>
</ul>