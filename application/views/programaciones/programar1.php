<div class="right_col" role="main">
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
						<div class="col-md-6 col-sm-6 col-xs-12"><h4>{nombre_completo}</h4>
						</div>
					</div>
					{/estudiante}
				<div class="form-group">    
					<label class="control-label col-md-3 col-sm-3 col-xs-12">GRUPO <span class="required">*</span>:</label>
					<div class="col-md-6 col-sm-6 col-xs-12">      
						<select id="id_grupo" name="id_asignacion" class="select2_single form-control" tabindex="-1">
							<option selected>Selecione.....</option>
							{asignacion}
							<option value="{id}" >{nombre} {nombre_completo}</option>
							{/asignacion}
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="celular">CELULAR <span class="required">*</span>:
					</label>    
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="celular" name="celular" required="required" class="form-control col-md-7 col-xs-12">
					</div>
				</div>
				<div class="ln_solid">
					
				</div>
				<div class="form-group">
					<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						<button type="submit" class="btn btn-primary">PROGRAMAR LABORATORIO</button>
					</div>
				</div>
			</form>
			</div>
        </div>