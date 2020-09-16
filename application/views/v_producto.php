<div class="right_col" role="main">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <section role="main" class="content-body">

    <!-- start: page -->
    <script src="<?php echo base_url(); ?>assets/customjs/jquery-ui.min.js"></script>
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
    <div class="table-responsive">
    <table id="table" cellspacing="0" width="100%" class="table table-striped mb-none">
        <thead>
            <tr>
                <th>Nro.</th>
                <th>Codigo</th>
                <th>Descripcion</th>
                <th>Unidad</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>   
    </table>
    </div>
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
                                <label class="control-label col-md-3">Codigo</label>
                                <div class="col-md-9">
                                    <input name="codigo" placeholder="Codigo" class="form-control" type="text">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Descripcion</label>
                                <div class="col-md-9">
                                    <input name="descripcion" placeholder="Descripcion" class="form-control" type="text">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Unidad</label>
                                <div class="col-md-9">
                                    <select name="unidad" class="form-control">
                                        <option value="PZA">PZA</option>
                                        <option value="BAR">BAR</option>
                                        <option value="BAR">JGO</option>
                                        <option value="BAR">ROL</option>
                                        <option value="BAR">MTR</option>
                                        <option value="BAR">KIT</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Descripcion</label>
                                <div class="col-md-9">
                                    <input name="precio" placeholder="Precio" class="form-control" type="text">
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





