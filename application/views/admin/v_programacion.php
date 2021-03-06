<div class="right_col" role="main">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content">
                
                <section role="main" class="content-body">

    <!-- start: page -->
    <script src="<?php echo base_url(); ?>assets/customjs/formulario.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            //alert('oso');
            get_table('<?php echo $opcion; ?>','<?php echo base_url().$controllerajax; ?>');
        });
    </script>
    <button type="button" class="btn btn-primary btn-icon icon-left"  onclick="add_row()">
        Adicionar <?php echo $opcion; ?>
        <i class="entypo-plus-squared"></i>
    </button>
    <br /><br />

    <table id="table" cellspacing="0" width="100%" class="table table-striped mb-none">
        <thead>
            <tr>
                <th>Nro.</th>
                <th>Estudiante</th>
                <th>Asignacion</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>   
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
                                <label class="control-label col-md-3">Estudiante</label>
                                <div class="col-md-9">
                                    <select name="id_estudiante" class="form-control">
                                        <option selected>Selecione.....</option>
                                        <?php foreach ($estudiantes as $item):?>
                                        <option value="<?php echo $item['id'];?>"><?php echo $item['cu'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
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
                                <label class="control-label col-md-3">Fecha</label>
                                <div class="col-md-9">
                                    <input name="fecha" placeholder="Fecha" class="form-control" type="text">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Hora</label>
                                <div class="col-md-9">
                                    <input name="hora" placeholder="Hora" class="form-control" type="text">
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
    <!-- End Bootstrap modal -->
    <!-- end: page -->
</section>

            </div>
        </div>
      </div>
    </div>
</div>
