<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$datos = array(
			'nombre' => 'Alfredo Salinas'
		);
		$this->load->view('app/login', $datos);
	}
}
