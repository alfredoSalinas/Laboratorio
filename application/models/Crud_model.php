<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model {

	public function insert($tabla, $data){
		$this->db->insert($tabla, $data);
	}

	public function get($tabla){
		return $this->db->get($tabla);
	}

	public function get_where($tabla, $where){
		return $this->db->get_where($tabla, $where);
	}

	public function update($tabla, $data, $where){
		return $this->db->update($tabla, $data, $where);
	}

	public function delete($tabla, $where){
		return $this->db->delete($tabla, $where);
	}

}
