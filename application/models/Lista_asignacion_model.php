<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lista_asignacion_model extends MY_Model {

    public function __construct()
    {
        parent::__construct();

        $this->table  = 'lista_asignaciones';
        $this->column = array('id','id_docente','id_materia', 'grupo', 'cantidad', 'sigla','nombre_completo');
        $this->order  = array('id' => 'asc');
    }
    
}