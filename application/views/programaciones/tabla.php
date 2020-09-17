<div class="right_col" role="main">
	<div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
      	<div class="x_panel">
      		<div class="x_title">
	            <h2>LABORATORIO DE FISICA:: <small>Administración</small></h2>
	            <div class="clearfix"></div>
          	</div>
            <div class="clearfix"></div>

			<div class="x_title">
	            <h2>Programaciones</h2>
	            <ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
					
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
	            </ul>
	            <div class="clearfix"></div>
          	</div>
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <label class="input-group-text" for="inputGroupSelect01">Asignacion</label>
			  </div>
			  <select class="custom-select"  id="id_asignacion" name="id_asignacion">
			    <option value="0" selected>Selecione.....</option>
				<?php foreach ($asignacion as $item):?>
					<option value="<?php echo $item['id'];?>">
						<?php 
						echo $item['grupo'];
						echo "  ";
						echo $item['nombre_completo'];
						?>
					</option>
		  		<?php endforeach;?>
			  </select>
			</div>
			<div class="x_content" id="lista">
            	

			</div>
      	</div>
      </div>
    </div>
</div>
<script>
function confirmar()
{
  if(confirm('¿Estas seguro de borrar este registro?'))
  {
    return true;
  }
  else
  {
    return false;
  } 
}
</script>