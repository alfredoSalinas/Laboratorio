<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$datos = array(
			'nombre' => 'Alfredo Salinas'
		);
		$this->load->view('plantilla/header');
		$this->load->view('plantilla/menu');
		$this->load->view('plantilla/navegation');
		$this->load->view('app/v_admin', $datos);
		$this->load->view('plantilla/footer');
	}
}
