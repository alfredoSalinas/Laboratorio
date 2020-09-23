<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docentes extends CI_Controller {

	private $tabla= 'programaciones';

	function __construct(){
		parent::__construct();
		$session = $this->session->has_userdata('ci');
		if($session){
			$this->load->model('Crud_model');
			$this->load->Model('Docente_model','dbase');
	    }else{
	    	redirect(base_url()."index.php/Docente");
	    }
	}

	public function index()
	{
		echo "string";	
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
