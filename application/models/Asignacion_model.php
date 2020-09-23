<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Asignacion_model extends MY_Model {

    public function __construct()
    {
        parent::__construct();

        $this->table  = 'asignaciones';
        $this->column = array('id','id_docente','id_materia','grupo', 'cantidad');
        $this->order  = array('id' => 'asc');
    }
    
}