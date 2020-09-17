<?php if ( ! defined('BASEPATH')) exit('No esta permitido el acceso');
//La primera línea impide el acceso directo a este script
class Lib_horarios {
	private $CI;
	private $dias = array('lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado');

	public function __construct()
	{
		$this->CI =& get_instance();
	}

	public function datos($id){
		$condicion['id'] = $id;
		$horas = $this->CI->db->get_where('horas', $condicion);
		return $hora = $horas->row();
	}

	public function crear(){
		return $this->dias;
	}

	public function get_dias(){
		return $this->dias;
	}

	public function get_grupo($dia, $hora){
		$query = 'select grupo, A.id as asignacion from horas as H
				  inner join horarios as Ho
				  on H.id = Ho.hora
				  inner join asignaciones as A
				  on Ho.id_asignacion = A.id 
				  where Ho.dia = "'.$dia.'" and Ho.hora ='. $hora;
		$horarios = $this->CI->db->query($query);
		return $horarios->result_array();
	}
}