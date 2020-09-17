<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programaciones extends CI_Controller {

	private $tabla= 'programaciones';

	function __construct(){
		parent::__construct();
		$session = $this->session->has_userdata('cu');
		if($session){
			$this->load->model('Crud_model');
			$this->load->Model('Estudiante_model','dbase');
	    }else{
	    	redirect(base_url()."index.php/Programacion");
	    }
	}

	public function index()
	{

		$where = array('id_estudiante' =>  $this->session->id_estudiante);
		if($this->db->get_where('programaciones',$where)->num_rows()>0){
			$asignacion = $this->db->get_where('programaciones',$where)->row()->id_asignacion;
	    	$where1['id'] = $asignacion;
	    	$grupo = $this->db->get_where('asignaciones',$where1)->row()->grupo;
    	}else{
    		$grupo = '';
    	}
			$this->load->library('table');
			$datos = $this->db->get('horas');
		    $data = array
		    (
		    	'dias' => $this->lib_horarios->crear(),
		    	'cu' => $this->session->cu,
				'nombre' => $this->session->estudiante,
				'grupo' => $grupo
		    );
		    $template = array(
        		'table_open' => '<table class="table">'
			);

			$this->table->set_template($template);
		    //print_r($this->lib_horarios->crear());
		    //$this->table->generate($this->lib_horarios->crear());
			//$this->administracion->plantilla('horarios', $data);
			$this->load->view('plantilla/header');
        $this->load->view('plantilla/menu');
        $this->load->view('plantilla/navegation');
        $this->load->view('programaciones/horarios', $data); 
        $this->load->view('plantilla/footer');
		    
		
	}

	public function insert()
	{
		$data['id_estudiante'] = $this->input->post('id_estudiante');
		$data['id_asignacion'] = $this->input->post('id_asignacion');
		$data['fecha'] = date("Y-m-d H:i:s");
		$data['hora'] = date("Y-m-d H:i:s");
		$data['estado'] = '1';
		$this->crud->insert($this->tabla, $data);
		$datos['celular'] = $this->input->post('celular');
		$datos['estado'] = 'programado';
		$where['id'] = $this->input->post('id_estudiante');
		$this->crud->update('estudiantes', $datos, $where);
		redirect(base_url()."index.php/Programacion");
	}

	public function update()
	{
		$data['id_asignacion'] = $this->input->post('id_asignacion');
		$data['fecha'] = date("Y-m-d H:i:s");
		$data['hora'] = date("Y-m-d H:i:s");
		$data['estado'] = '2';
		$where['id_estudiante'] = $this->input->post('id_estudiante');
		$this->crud->update($this->tabla, $data, $where);
		$datos['celular'] = $this->input->post('celular');
		$datos['estado'] = 'reprogramado';
		$where1['id'] = $this->input->post('id_estudiante');
		$this->crud->update('estudiantes', $datos, $where1);
		redirect(base_url()."index.php/Programacion");
	}

	public function programar(){
		$where = array('id_estudiante' =>  $this->session->id_estudiante);
		if($this->plantillas->consultar('programaciones', $where)->num_rows() == 0){
			$datos = $this->plantillas->programar($this->session->cu, $this->input->get('grupo'));
    		$this->plantillas->plantilla('programaciones/programar', $datos);
		}else{
			$where1['id'] = $this->session->id_estudiante;
			if($this->db->get_where('estudiantes', $where1)->row()->estado == 'programado'){
				$datos = $this->plantillas->programar($this->session->cu, $this->input->get('grupo'));
    			$this->plantillas->plantilla('programaciones/reprogramar', $datos);	
	    	}else{
	    		$datos = $this->plantillas->programado($this->session->cu);
	    		$this->plantillas->plantilla('programaciones/programado', $datos);
	    	}
		}
		
	}

	public function grupo(){
		echo $this->input->get('grupo');
	}

}
