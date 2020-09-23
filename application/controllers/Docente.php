<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docente extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('docentes/login');
	}

	public function login(){
		$rni = $this->input->post('rni');
		$ci = $this->input->post('ci');

		$where['rni'] = $rni;
		$datos = $this->db->get_where('docentes', $where);
	    if ($datos->num_rows() > 0){
         $docente = $datos->row();
			if($rni == $docente->rni and $ci == $docente->ci){
				$newdata = array(
					'id_docente' => $docente->id,
			        'ci'  => $docente->ci,
			        'docente' => $docente->nombre_completo
				);

				$this->session->set_userdata($newdata);
				echo 'Logeado';

			}
		}

	}

	public function administracion(){
		$datos = array('primero' => 'Hola' );
		$this->lib_docentes->setUsuario('Alfredo');
		$this->lib_docentes->plantilla('admin/admin', $datos);
	}

	public function salir(){
		unset(
	        $_SESSION['docente'],
	        $_SESSION['id_docente']
		);
		redirect(base_url()."index.php/Docente");
	}
}