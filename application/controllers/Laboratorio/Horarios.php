<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Horarios extends CI_Controller {

	private $tabla= 'horarios';

	function __construct(){
		parent::__construct();
		$session = $this->session->has_userdata('usuario');
		if($session){
			$this->load->model('Crud_model');
			$this->load->library('pdf_reportes');
	    }else{
	    	redirect(base_url()."index.php/Admin");
	    }	
		
	}

	public function index()
	{
    	$datos['contenido'] = 'estudiantes/index';
	    $this->load->view('plantillas/plantilla', $datos);
	}

	public function imprimir(){
		$datos = $this->crud->get($this->tabla);
	    $data['estudiantes'] = $datos->result_array();
		$this->load->view('estudiantes/reportes', $data);
	}

	public function nuevo(){
		$data['contenido'] = 'estudiantes/nuevo';
    	$this->administracion->plantilla('estudiantes/nuevo', $data);
	}

	public function editar(){
		$where['id'] = $this->input->get('valor');
		$datos = $this->crud->get_where($this->tabla, $where);
		$data = array(
			'estudiante' => $datos->result_array() 
		);
    	$this->administracion->plantilla('estudiantes/editar', $data);
	}	

	public function insert()
	{
		$data['cu'] = $this->input->post('cu');
		$data['ci'] = $this->input->post('ci');
		$data['nombre_completo'] = $this->input->post('nombre_completo');
		$data['celular'] = $this->input->post('celular');
		$data['estado'] = $this->input->post('activo');
		$this->crud->insert($this->tabla, $data);
		redirect(base_url()."index.php/Laboratorio/Estudiantes/get");
	}

	public function get(){
			$this->load->library('table');
			$datos = $this->crud->get('horas');
		    $data = array
		    (
		    	'dias' => $this->lib_horarios->crear()
		    );
		    $template = array(
        		'table_open' => '<table class="table">'
			);

			$this->table->set_template($template);
		    //print_r($this->lib_horarios->crear());
		    //$this->table->generate($this->lib_horarios->crear());
		    $this->administracion->plantilla('horarios', $data);	
	}

	public function get_where($cu){
		$where['cu'] = $cu;
		$datos = $this->crud->get_where($this->tabla, $where);
	    $data['estudiantes'] = $datos->result_array();
	    $data['contenido'] = 'estudiantes/tabla';
    	$this->load->view('plantillas/plantilla', $data);

	}

	public function update(){
		$data['cu'] = $this->input->post('cu');
		$data['ci'] = $this->input->post('ci');
		$data['nombre_completo'] = $this->input->post('nombre_completo');
		$data['celular'] = $this->input->post('celular');
		$data['nivel'] = $this->input->post('nivel');
		$data['estado'] = $this->input->post('estado');
		$where['id'] = $this->input->post('id');
		$this->crud->update($this->tabla, $data, $where);
		redirect(base_url()."index.php/Laboratorio/Estudiantes/get");
	}

	public function delete(){
		$where['id'] = $this->input->get('valor');
		$tabla = $this->crud->delete($this->tabla, $where);
		echo $tabla;
	}
}
