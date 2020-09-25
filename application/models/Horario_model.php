<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Horario_model extends MY_Model {

    public function __construct()
    {
        parent::__construct();

        $this->table  = 'horarios';
        $this->column = array('id','hora','dia','id_asignacion');
        $this->order  = array('id' => 'asc');
    }
    
}