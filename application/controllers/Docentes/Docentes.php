<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docentes extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $session = $this->session->has_userdata('docente');
        if($session){
            $this->load->Model('Docente_model','dbase');
        }else{
            redirect(base_url()."index.php/Docente");
        }
    }

    public function index()
    {
    	$id_docente = $this->session->userdata('id_docente');
    	$nombre_docente = $this->session->userdata('docente');
    	$where = array(
    		'id' => $id_docente, 
    	);
    	$lista = $this->db->get_where('lista_grupos', $where);       
        $opcion = 'Docente';
        $data = array(
            'opcion'            => $opcion,
            'controllerajax'    => 'index.php/Docentes/Docentes/',
            'lista' => $lista->result_array(),
            'nombre_docente' => $nombre_docente,
        );
        $data['vista']  = 'docentes/v_docente';
        $this->load->view('plantilla/header');
        $this->load->view('plantilla/menu_docente');
        $this->load->view('plantilla/navegation_docente');
        $this->load->view($data['vista'],$data);
        $this->load->view('plantilla/footer');
    }

    public function ajax_list(){
    	$id = $this->input->post('num');
    	$where = array('id' => $id, );
    	$lista_estudiantes = $this->db->get_where('lista_estudiantes', $where)->result_array();
    ?>
    	<table id="table" cellspacing="0" width="100%" class="table table-striped mb-none">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>C.U.</th>
                <th>Celular</th>
            </tr>
        </thead>
        <tbody>
    <?php
    	foreach ($lista_estudiantes as $item) {
    ?>
    	<tr>
    		<td><?php echo $item['nombre_completo'] ?></td>
    		<td><?php echo $item['cu'] ?></td>
    		<td><?php echo $item['celular'] ?></td>
    	</tr>
    <?php
    	}
    ?>
        </tbody>   
    </table>
    <?php
    }

}