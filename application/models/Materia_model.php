<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Materia_model extends MY_Model {

    public function __construct()
    {
        parent::__construct();

        $this->table  = 'materias';
        $this->column = array('id','sigla','nombre','nivel');
        $this->order  = array('id' => 'asc');
    }
    
}