<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Programacion_model extends MY_Model {

    public function __construct()
    {
        parent::__construct();

        $this->table  = 'programaciones';
        $this->column = array('id','id_estudiante','id_asignacion','fecha', 'hora', 'estado');
        $this->order  = array('id' => 'asc');
    }
    
}