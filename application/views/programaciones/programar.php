<div class="right_col" role="main">
          <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>PROGRAMACION LABORATORIO DE FISICA:: ESTUDIANTE</h2>
            <div class="clearfix"></div>
          </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                    <br />
                    <form name="formu" method="POST" action="<?php echo base_url()?>index.php/Programaciones/Programaciones/insert" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
        {estudiante}
          <input type="hidden" name="id_estudiante" id="id_estudiante" value="{id}">
          <input type="hidden" name="cu" id="cu" value="{cu}">
          <input type="hidden" name="nombre_completo" id="nombre_completo" value="{nombre_completo}">

                        <input type="hidden" value="" name="id"/> 
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">CU</label>
                                <div class="col-md-9">
                                    <input name="cu" placeholder="Carnet Universitario" class="form-control" type="text" value="{cu}">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Nombre</label>
                                <div class="col-md-9">
                                    <input name="nombre_completo" placeholder="Nombre Completo" class="form-control" type="text" value="{nombre_completo}">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            {/estudiante}
                            {asignacion}
                            <input type="hidden" name="id_asignacion"  value="{id}">
          <div class="form-group">
                                <label class="control-label col-md-3">Grupo : </label>
                                <div class="col-md-9">
                                    <input name="nombre_completo" placeholder="Nombre Completo" class="form-control" type="text" value="{grupo}">
                                    <span class="help-block"></span>
                                </div>
                            </div>
        
        <div class="form-group">
                                <label class="control-label col-md-3">Docente : </label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" value="{nombre_completo}">
                                    <span class="help-block"></span>
                                </div>
                            </div>
          
        
        {/asignacion}

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="celular">CELULAR <span class="required">*</span>:
          </label>    
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="celular" name="celular" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
                        </div>
          
          <div class="form-body">
          
          
        
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
                </div>
              </div>
            </div>

          
          </div>
        </div>
      </div>
    </div>

        