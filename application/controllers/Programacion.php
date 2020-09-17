<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programacion extends CI_Controller {

	function __construct(){
		parent::__construct();
			$this->load->model('Crud_model');
	}
	
	public function index()
	{
    $datos['contenido'] = 'login';
    $this->load->view('login', $datos);
	}

	public function login(){
		$cu = $this->input->post('cu');
		$ci = $this->input->post('ci');

		$where['cu'] = $cu;
		$datos = $this->db->get_where('estudiantes', $where);
	    print_r($datos);

	    if ($datos->num_rows() > 0){
         $usuario = $datos->row();
			if($cu == $usuario->cu and $ci == $usuario->ci){
				$newdata = array(
					'id_estudiante' => $usuario->id,
			        'cu'  => $usuario->cu,
			        'estudiante' => $usuario->nombre_completo
				);

				$this->session->set_userdata($newdata);
				echo 'Logeado';

			}
		}
	}

	public function salir(){
		unset(
	        $_SESSION['cu'],
	        $_SESSION['id_estudiante'],
	        $_SESSION['estudiante']
		);
		redirect(base_url()."index.php/Programacion");
	}
}
