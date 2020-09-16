<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asignacion extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->Model('Lista_asignacion_model','dbase');
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
            'controllerajax'    => 'Laboratorio/Asignacion/',
            'materias' => $materias->result_array(),
            'docentes' => $docentes->result_array(),
        );
        $data['vista']  = 'admin/v_asignacion';
        //$this->administracion->plantilla('v_estudiante', $data);
        $this->load->view('admin/frontend/header');
        //$this->load->view('plantilla/header');
        $this->load->view($data['vista'],$data);
        $this->load->view('plantilla/footer');
    }

    public function seleccionar(){
        $id = $this->input->get('valor');
        echo $id;
    }

    public function ajax_list()
    {
        $list = $this->dbase->get_datatables();
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
                        "recordsTotal" => $this->dbase->count_all(),
                        "recordsFiltered" => $this->dbase->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

     public function post_data()
    {
        $data = array(
                'cu'  => $this->input->post('cu'),
                'ci' => $this->input->post('ci'),
                'nombre_completo' => $this->input->post('nombre_completo'),
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

        if($this->input->post('nombre') == '')
        {
            $data['inputerror'][] = 'nombre';
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