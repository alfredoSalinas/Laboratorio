var save_method;

function edit_cantidad(id, factura, cantidad)
{
    $.ajax({
        url : 'http://localhost/zona_aluminio/Despacho/ajax_cantidad/' + id,
        type: "POST",
        data : {
            factura : factura,
            cantidad : cantidad,
        },
        success: function(data)
        {
            $('#detalle').html(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}


function buscar_cliente(controlador, nit){
    controller = controlador;
    nit = nit;
    $.ajax({
        url : controller + 'buscar_cliente',
        data : {
            nit : nit,
        },
        type : "POST",
        success : function(data){
            $('#cliente').html(data);
        },
        error : function(jqXHR, textStatus, errorThrown){
            alert('Error data from ajax');
        }
    });
}

function actualizar_nit(controlador, nit){
    controller = controlador;
    nit = nit;
    $.ajax({
        url : controller + 'actualizar_nit',
        data : {
            nit : nit,
        },
        type : "POST",
        success : function(data){
            $('#NIT').val(data);
        },
        error : function(jqXHR, textStatus, errorThrown){
            alert('Error data from ajax');
        }
    });
    buscar_cliente(controlador, nit);
}

function add_cliente()
{
    save_method = 'add';
    enabled_form();
    $('#form')[0].reset(); // reset form on modals
    //    $('#form select').select2("val", "");
    //$('#form').trigger("reset");
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_cliente').modal('show'); // show bootstrap modal
    $('.modal-title').text('Adicionar Cliente'); // Set Title to Bootstrap modal title
    $('#btnSave').show();
}

function add_recibo()
{
    save_method = 'add';
    enabled_form();
    $('#form')[0].reset(); // reset form on modals
    //    $('#form select').select2("val", "");
    //$('#form').trigger("reset");
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_recibo').modal('show'); // show bootstrap modal
    $('.modal-title').text('Recibo'); // Set Title to Bootstrap modal title
    $('#btnSave').show();
}

function ajax_detalle(controlador, cliente){
    controller = controlador;
    cliente = cliente;
    $.ajax({
        url : controller + 'ajax_detalle',
        data : {
            cliente : cliente,
        },
        type : "POST",
        success : function(data){
            //$('#').html(data);
        },
        error : function(jqXHR, textStatus, errorThrown){
            alert('Error data from ajax');
        }
    });
}

function ajax_recibo(controlador, factura){
    controller = controlador;
    factura = factura;
    $.ajax({
        url : controller + 'ajax_recibo',
        data : {
            factura : factura,
        },
        type : "POST",
        success : function(data){
            $('#recibo').html(data);
        },
        error : function(jqXHR, textStatus, errorThrown){
            alert('Error data from ajax');
        }
    });
}

function get_producto(titulo, controlador, cotizacion) //controller = baseurl+controller
{
    title = titulo;
    controller = controlador;
    table = $('#productos').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": controller + 'get_producto/'+ cotizacion,
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });
}

function add_producto(id, factura)
{
    $.ajax({
        url : 'http://localhost/zona_aluminio/Despacho/ajax_producto/' + id,
        type: "POST",
        data : {
            factura : factura,
        },
        success: function(data)
        {
            $('#detalle').html(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function delete_detalle(id, factura)
{
    $.ajax({
        url : 'http://localhost/zona_aluminio/Despacho/delete_detalle/' + id,
        type: "POST",
        data : {
            factura : factura,
        },
        success: function(data)
        {
            $('#detalle').html(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function disabled_form()
{
	//falta textarea, radios, checkbox
	$("input").attr('disabled','disabled');
	$("select").attr('disabled','disabled');
}

function enabled_form()
{
	//falta textarea, radios, checkbox
	$("input").removeAttr('disabled');
	$("select").removeAttr('disabled');
}

function save_cliente(controlador)
{
    controller = controlador;
    $('#btnSave').text('guardando...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;
    if(save_method == 'add') {
        url = controller + 'cliente_add';
    } else {
        url = controller + 'cliente_update';
    }
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_cliente').modal('hide');
                //reload_table();
            }
            else
            {
                alert('mal');
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('Guardar'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('Guardar'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function delete_row(id)
{

	$div = $('<div title="Confirmacion Requerida">');
	$div.append('<p>Desea borrar este Registro?</p>');
	$div.dialog({
	    modal: true,
	    maxHeight:'auto',
	    width: 'auto',
	    show: "fold",
	    hide: "fold",
	    resizable: false,
	    open: function(event, ui) {
	    	$(this).prev(".ui-dialog-titlebar").css("background","dark");
		},
		position: {
            my: 'center',
            at: 'center'
        },
		buttons: {
			'Borrar': {
						text: 'Borrar',
                        class: 'btn btn-blue', 
                        click: function () {
	            			$(this).dialog("close");
	            			$.ajax({
					            url : controller + 'ajax_delete/' + id,
					            type: "POST",
					            dataType: "JSON",
					            success: function(data)
					            {
					                //if success reload ajax table
					                //$('#modal_form').modal('hide');
					                reload_table();
					            },
					            error: function (jqXHR, textStatus, errorThrown)
					            {
					                alert('Error deleting data');
					            }
					        });
                        }
                    },
            'Cancelar': {
            			text: 'Cancelar',
                        class: 'btn btn-default', 
                        click: function () {
	            			$(this).dialog("close")
                        }
                    }
	    },
	    close: function (event, ui) {
	        $(this).remove();
	    }
	});
}