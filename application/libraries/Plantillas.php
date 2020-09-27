<?php if ( ! defined('BASEPATH')) exit('No esta permitido el acceso');
//La primera línea impide el acceso directo a este script
class Plantillas {
	private $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
	}

  public function plantilla($tabla, $data){
    $this->CI->load->library('parser');
    $encabezado = array(
            'title' => 'Facultad de Tecnologia | USFX',
            'url' => base_url()
      );
    $this->CI->parser->parse('plantilla/header', $encabezado);
    $this->CI->parser->parse('plantilla/menu_pro', $encabezado);
    $this->CI->parser->parse('plantilla/navegation_pro', $encabezado);
    $this->CI->parser->parse($tabla, $data);
    $this->CI->parser->parse('plantilla/footer', $encabezado);
  }

  public function consultar($tabla, $where){
    $this->CI->db->where($where);
    return $this->CI->db->get($tabla); 
  }

  public function programar($cu, $grupo){
    $this->CI->db->where('cu', $cu);
    $estudiantes = $this->CI->db->get('estudiantes');
    $query = 'select A.id, M.nombre, D.nombre_completo, grupo 
              from asignaciones as A
              inner join materias as M
              on A.id_materia = M.id
              inner join docentes as D
              on A.id_docente = D.id
              where A.id ='. $grupo;
    $asignaciones = $this->CI->db->query($query);
      $data = array(
            'estudiante' => $estudiantes->result_array(),
            'asignacion' => $asignaciones->result_array()
      );
      return $data;
  }

  public function programado($cu){
    $this->CI->db->where('cu', $cu);
    $estudiantes = $this->CI->db->get('estudiantes');
    $query = 'select P.id, P.id_asignacion, A.id_materia, A.grupo  
              from programaciones as P
              left join estudiantes as E
              on P.id_estudiante = E.id
              left join asignaciones as A
              on P.id_asignacion = A.id';
    $programaciones = $this->CI->db->query($query);
    $where = array('id' => $programaciones->row()->id_materia );
    $materias = $this->consultar('materias', $where);
    $data = array(
          'estudiante' => $estudiantes->result_array(),
          'materias' => $materias->result_array()
    );
    return $data;
  }

  public function tabla($tabla){
    $datos = $this->CI->db->get($tabla);
      $data = array(
            'estudiante' => $datos->result_array()
      );
      return $data;
  }

}