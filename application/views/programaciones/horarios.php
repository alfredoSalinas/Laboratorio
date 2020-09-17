<div class="right_col" role="main">
	<div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
      	<div class="x_panel">
      		<div class="x_title">
	            <h2>LABORATORIO DE FISICA:: <small>Programaciones</small></h2>
	            <div class="clearfix"></div>
          	</div>
            <div class="clearfix"></div>

			<div class="x_title">
            <h2>CU : <?php echo $cu ?></h2>
            <h2>&nbsp &nbsp &nbsp</h2>
            <h2>Nombre : <?php echo $nombre ?></h2>
            <h2>&nbsp &nbsp &nbsp</h2>
            <h2>Grupo : <?php echo $grupo ?></h2>
            <div class="clearfix"></div>
          </div>
			<div class="x_content">
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
			</div>
      	</div>
      </div>
    </div>
</div>
