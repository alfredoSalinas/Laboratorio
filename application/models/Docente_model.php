<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Docente_model extends MY_Model {

    public function __construct()
    {
        parent::__construct();

        $this->table  = 'docentes';
        $this->column = array('id','ci','nombre_completo', 'celular');
        $this->order  = array('id' => 'asc');
    }
    
}