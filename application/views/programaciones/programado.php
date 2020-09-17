<div class="right_col" role="main">
  
  <div class="clearfix"></div>
    <div class="row">
    	<div class="col-md-12 col-sm-12 col-xs-12">
    		<div class="x_panel">
    			<div class="x_title">
				    <h2>PROGRAMACION LABORATORIO DE FISICA:: <small>Estudiante</small></h2>
				    <div class="clearfix"></div>
				</div>
			  	<div class="x_content">
				
					<form name="formu" method="POST" action="<?php echo base_url()?>index.php/Programaciones/insert" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
						{estudiante}
						<input type="hidden" name="id_estudiante" id="id_estudiante" value="{id}"><input type="hidden" name="cu" id="cu" value="{cu}">
						<input type="hidden" name="nombre_completo" id="nombre_completo" value="{nombre_completo}">
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="celular">C.U.:    </label>
							<div class="col-md-6 col-sm-6 col-xs-12">      
								<h4>{cu}</h4>    
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="celular">ESTUDIANTE:</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<h4>{nombre_completo}</h4>
							</div>
						</div>
						{/estudiante}
						{materias}
							{id} {nombre}
						{/materias}
						<div class="ln_solid"></div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>