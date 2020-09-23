<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lista_programacion_model extends MY_Model {

    public function __construct()
    {
        parent::__construct();

        $this->table  = 'lista_programaciones';
        $this->column = array('id','id_estudiante','id_asignacion', 'fecha', 'hora', 'estado','cu', 'grupo');
        $this->order  = array('id' => 'asc');
    }
    
}