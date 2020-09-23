<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asignacion extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->Model('Lista_asignacion_model','vista_dbase');
        $this->load->Model('Asignacion_model','dbase');
        $this->load->Model('Materia_model','materias');

        //$this->load->library('Window');
        //isLoggedIn();
    }

    public function index()
    {   
        $materias = $this->db->get('materias');
        $docentes = $this->db->get('docentes');
        $opcion = 'Asignacion';
        $data = array(
            'opcion'            => $opcion,
            'controllerajax'    => 'index.php/Laboratorio/Asignacion/',
            'materias' => $materias->result_array(),
            'docentes' => $docentes->result_array(),
        );
        $data['vista']  = 'admin/v_asignacion';
        $this->load->view('plantilla/header');
        $this->load->view('plantilla/menu');
        $this->load->view('plantilla/navegation');
        $this->load->view($data['vista'],$data);
        $this->load->view('plantilla/footer');
    }

    public function seleccionar(){
        $id = $this->input->get('valor');
        echo $id;
    }

    public function ajax_list()
    {
        $list = $this->vista_dbase->get_datatables();
        $data = array();
        $no = isset($_POST['start'])? $_POST['start'] : 0;
        foreach ($list as $d) {
            $no++;
            $row = array();

            $row[] = $no;
            $row[] = $d->nombre_completo;
            $row[] = $d->sigla;
            $row[] = $d->grupo;
            $row[] = $d->cantidad;
            
            $row[] = '<button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-info" onclick="edit_row('.$d->id.')">
                            <i class="material-icons">create</i>
                        </button>    
                        <button type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-info" onclick="delete_row('.$d->id.')">
                            <i class="material-icons">delete</i>
                        </button>';
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->vista_dbase->count_all(),
                        "recordsFiltered" => $this->vista_dbase->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

     public function post_data()
    {
        $data = array(
                'id_docente'  => $this->input->post('id_docente'),
                'id_materia' => $this->input->post('id_materia'),
                'grupo' => $this->input->post('grupo'),
                'cantidad' => $this->input->post('cantidad'),
            );
        return $data;
    }

    public function ajax_edit($id)
    {
        $data = $this->dbase->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $this->_validate();
        $data = $this->post_data();
        $insert = $this->dbase->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update()
    {
        $this->_validate();
        $data = $this->post_data();
        $this->dbase->update($this->input->post('id'), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $this->dbase->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
    
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('id_docente') == '')
        {
            $data['inputerror'][] = 'id_docente';
            $data['error_string'][] = 'El nombre es requerido';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

}