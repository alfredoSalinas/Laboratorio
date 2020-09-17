<div class="row">
  <h1 class="h2">Programaciones</h1>
</div>
<form method="post" action="<?php echo base_url()?>index.php/Programaciones/insert">

	<div class="input-group mb-3">
	  <div class="input-group-prepend">
	    <label class="input-group-text" for="inputGroupSelect01">Estudiante</label>
	  </div>
	  <select class="custom-select" id="" name="id_estudiante">
	    <option selected>Selecione.....</option>
		<?php foreach ($estudiantes as $item):?>
			<option value="<?php echo $item['id'];?>"><?php echo $item['nombre_completo'];?></option>
  		<?php endforeach;?>
	  </select>
	</div>
	
	<div class="input-group mb-3">
	  <div class="input-group-prepend">
	    <label class="input-group-text" for="inputGroupSelect01">Asignacion</label>
	  </div>
	  <select class="custom-select" id="" name="id_asignacion">
	    <option selected>Selecione.....</option>
		<?php foreach ($asignaciones as $item):?>
			<option value="<?php echo $item['id'];?>"><?php echo $item['grupo'];?></option>
  		<?php endforeach;?>
	  </select>
	</div>

	<div class="form-group row">
	    <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
    	<div class="col-sm-10">
	    	<input type="text" class="form-control" id="fecha" placeholder="Fecha" name="fecha">
	    </div>
	</div>

	<div class="form-group row">
	    <label for="hora" class="col-sm-2 col-form-label">Hora</label>
	    <div class="col-sm-10">
	    	<input type="text" class="form-control" id="hora" placeholder="Hora" name="hora">
	    </div>
	</div>
	<div class="form-group row">
	    <label for="estado" class="col-sm-2 col-form-label">Estado</label>
	    <div class="col-sm-10">
	    	<input type="text" class="form-control" id="estado" placeholder="Estado" name="estado">
	    </div>
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
