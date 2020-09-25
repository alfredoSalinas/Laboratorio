<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Horarios extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $session = $this->session->has_userdata('usuario');
        if($session){
            $this->load->Model('Horario_model','dbase');
        }else{
            redirect(base_url()."index.php/Admin");
        }
    }

    public function index()
    {       
        $opcion = 'Horario';
        $horas = $this->db->get('horas');
        $asignaciones = $this->db->get('asignaciones');
        $data = array(
            'opcion'            => $opcion,
            'controllerajax'    => 'index.php/Laboratorio/Horarios/',
            'horas' => $horas->result_array(),
            'asignaciones' => $asignaciones->result_array(),
        );
        $data['vista']  = 'admin/v_horarios';
        $this->load->view('plantilla/header');
        $this->load->view('plantilla/menu');
        $this->load->view('plantilla/navegation');
        $this->load->view($data['vista'],$data);
        $this->load->view('plantilla/footer');
    }

     public function post_data()
    {
        $data = array(
            'hora' => $this->input->post('hora'),
            'dia' => $this->input->post('dia'),
            'id_asignacion' => $this->input->post('id_asignacion'),
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

        if($this->input->post('hora') == '')
        {
            $data['inputerror'][] = 'hora';
            $data['error_string'][] = 'El campo hora es requerido';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

}