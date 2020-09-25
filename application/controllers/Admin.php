<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
			$this->load->model('Crud_model');
	}
	
	public function index()
	{
    $datos['contenido'] = 'login';
    $this->load->view('admin/login', $datos);
	}

	public function login(){
		$user = $this->input->post('user');
		$password = $this->input->post('password');

		$where['usuario'] = $user;
		$datos = $this->db->get_where('usuarios', $where);
	    if ($datos->num_rows() > 0){
         $usuario = $datos->row();
			if($user == $usuario->usuario and $password == $usuario->clave){
				$newdata = array(
					'id_admin' => $usuario->id,
			        'usuario'  => $usuario->usuario
				);

				$this->session->set_userdata($newdata);
				echo 'Logeado';

			}
		}
	}

	public function salir(){
		unset(
	        $_SESSION['id_admin'],
	        $_SESSION['usuario']
		);
		redirect(base_url()."index.php/Admin");
	}
}
