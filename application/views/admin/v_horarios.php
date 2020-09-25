<div class="right_col" role="main">
	<div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
      	<div class="x_panel">
      		<div class="x_title">
	            <h2>LABORATORIO DE FISICA:: <small>Horarios</small></h2>
	            <div class="clearfix"></div>
          	</div>
            <div class="clearfix"></div>
			<div class="x_content">
				<script src="<?php echo base_url(); ?>assets/customjs/jquery-ui.min.js"></script>
    			<script src="<?php echo base_url(); ?>assets/customjs/formulario.js"></script>
    			<script type="text/javascript">
	        		$(document).ready(function() {
	            		//alert('oso');
	            		set_controlador('<?php echo base_url().$controllerajax; ?>');
	        		});
    			</script>
				<button type="button" class="btn btn-primary btn-icon icon-left"  onclick="add_row()">
        			Adicionar <?php echo $opcion; ?>
        			<i class="entypo-plus-squared"></i>
    			</button>
    			<br /><br />
				<table class="table table-bordered">
					<tr>
					  <th scope="col">Hora</th>
					  <th scope="col">Lunes</th>
					  <th scope="col">Martes</th>
					  <th scope="col">Miercoles</th>
					  <th scope="col">Jueves</th>
					  <th scope="col">Viernes</th>
					  <th scope="col">Sabado</th>
					</tr>
					<?php
						for($id=1; $id<=6;$id++){
					?>
					<tr>
						<td><?php echo $this->lib_horarios->datos($id)->hora; ?></td>
						<?php
						$dias = $this->lib_horarios->get_dias();
						foreach ($dias as $dia) {
						?>
						<td>
							<?php
								$horario = $this->lib_horarios->get_grupo($dia, $id);
								foreach ($horario as $item):
							?>
								<a href="programar?grupo=<? echo $item['asignacion']; ?>">
								<?php echo $item['grupo']; ?>
								</a>
							<?php	
								echo '<br>';
								endforeach;
							?>
						</td>
						<?php } ?>		
			  		</tr>
					<?php } ?>
				</table>

				<div class="modal fade" id="modal_form">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title"><?php echo $opcion; ?></h3>
                </div>

                <div class="modal-body form">
                    <form action="#" id="form" class="form-horizontal">
                        <input type="hidden" value="" name="id"/> 
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">Asignacion</label>
                                <div class="col-md-9">
                                    <select name="id_asignacion" class="form-control">
                                        <option selected>Selecione.....</option>
                                        <?php foreach ($asignaciones as $item):?>
                                        <option value="<?php echo $item['id'];?>"><?php echo $item['grupo'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Hora</label>
                                <div class="col-md-9">
                                    <select name="hora" class="form-control">
                                        <option selected>Selecione.....</option>
                                        <?php foreach ($horas as $item):?>
                                        <option value="<?php echo $item['id'];?>"><?php echo $item['hora'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-3">Dia</label>
                                <div class="col-md-9">
                                    <select name="dia" class="form-control">
                                        <option selected>Selecione.....</option>
                                        <option value="lunes">Lunes</option>
                                        <option value="martes">Martes</option>
                                        <option value="miercoles">Miercoles</option>
                                        <option value="jueves">Jueves</option>
                                        <option value="viernes">Viernes</option>
                                        <option value="sabado">Sabado</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnSave" class="btn btn-info" onclick="save_row()">Guardar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

			</div>
      	</div>
      </div>
    </div>
</div>
