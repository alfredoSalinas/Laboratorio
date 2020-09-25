var save_method; //for save method string
var table;
var controller;
var title;

function get_table2(titulo,controlador,id_tabla,metodo_ajax_list) //controller = baseurl+controller
{
    title = titulo;
    controller = controlador;
    table = $('#'+id_tabla).DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": controller + metodo_ajax_list,
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

function get_detalle(titulo, controlador, id) //controller = baseurl+controller
{
    title = titulo;
    controller = controlador;
    numero = id;
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": controller + 'ajax_list',
            "data" : {
                       numero: numero,
                     },
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



function get_table(titulo, controlador) //controller = baseurl+controller
{
    title = titulo;
	controller = controlador;
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": controller + 'ajax_list',
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

function set_controlador(controlador) //controller = baseurl+controller
{
    controller = controlador;
}

function add_row()
{
    save_method = 'add';
    enabled_form();
    $('#form')[0].reset(); // reset form on modals
    //    $('#form select').select2("val", "");
    //$('#form').trigger("reset");
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Adicionar '+title); // Set Title to Bootstrap modal title
    $('#btnSave').show();
}

function mostrar_productos()
{
    save_method = 'add';
    enabled_form();
    $('#form')[0].reset(); // reset form on modals
    //    $('#form select').select2("val", "");
    //$('#form').trigger("reset");
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_producto').modal('show'); // show bootstrap modal
    $('.modal-title').text('Adicionar '+title); // Set Title to Bootstrap modal title
    $('#btnSave').show();
}

function vender(controlador, numero){
    controller = controlador;
    num = numero;
    $.ajax({
        url : controller + 'ajax_vender',
        data : {
            num : num,
        },
        type : "POST",
        success : function(data){
            $('#resultado').html(data);
        },
        error : function(jqXHR, textStatus, errorThrown){
            alert('Error data from ajax');
        }
    });
}

function edit_producto(id){
    save_method = 'update';
    enabled_form();
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    //Ajax Load data from ajax
    $.ajax({
        url : controller + 'ajax_edit/' + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $.each(data, function (index, itemData) {
                $('[name="'+index+'"]').val(itemData);
            });

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Editar '+title); // Set title to Bootstrap modal title
            $('#btnSave').show();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    
}

function edit_row(id)
{
    save_method = 'update';
    enabled_form();
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    //Ajax Load data from ajax
    $.ajax({
        url : controller + 'ajax_edit/' + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
			$.each(data, function (index, itemData) {
			    $('[name="'+index+'"]').val(itemData);
			});

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Editar '+title); // Set title to Bootstrap modal title
            $('#btnSave').show();
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

function view_row(id)
{
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : controller + 'ajax_edit/' + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
			$.each(data, function (index, itemData) {
			    $('[name="'+index+'"]').val(itemData);
			});
			disabled_form();
            $('#btnSave').hide();
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Ver '+title); // Set title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{
    location.reload();
    table.ajax.reload(null,false); //reload datatable ajax 
}

function save_row()
{
    $('#btnSave').text('guardando...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;
    if(save_method == 'add') {
        url = controller + 'ajax_add';
    } else {
        url = controller + 'ajax_update';
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
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
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