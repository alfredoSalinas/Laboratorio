<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Estudiante_model extends MY_Model {

    public function __construct()
    {
        parent::__construct();

        $this->table  = 'estudiantes';
        $this->column = array('id','cu','ci','nombre_completo', 'celular', 'nivel', 'estado');
        $this->order  = array('id' => 'asc');
    }
    
}