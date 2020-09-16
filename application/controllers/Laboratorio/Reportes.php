<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

	private $tabla= 'materias';

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

	public function index(){
		$datos = $this->crud->get('estudiantes');
	    $data['estudiantes'] = $datos->result_array();
		$this->load->view('estudiantes/reportes', $data);
	}
}