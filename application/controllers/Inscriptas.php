<?php
class Inscriptas extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('new_model');
                $this->load->helper('url_helper');
        }
        public function inscriptas()
        {
                
                $this->load->helper('form');
                $this->load->library('form_validation');
                $data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
                );
                $this->load->view('templates/header', $data);
                $this->load->view('inscriptas/inscriptas');
                $this->load->view('templates/footer');
        }
        public function actualizar_Inscripta(){
                $is_ajax = $this->input->is_ajax_request();
                if($is_ajax)
                {
                        $estado;
                        $id_cabierto = $this->input->post('id_cabierto');
                        $id_cliente = $this->input->post('id_cliente');
                        $interesada = $this->input->post('interesada');
                        $rechazada = $this->input->post('rechazada');
                        $confirmada = $this->input->post('confirmada');
                        if ($interesada == 'true'){
                                $estado = 1;
                        }
                        else if ($rechazada == 'true'){
                                $estado = 2;
                        }
                        else if ($confirmada == 'true'){
                                $estado = 3;
                        }
                        $data = array(
                                'id_cabierto'   => $id_cabierto,
                                'id_cliente'    => $id_cliente,
                                'estado'        => $estado                   
                        );
                        if($respuesta = $this->new_model->actualizar_inscripta($data)){        
                                $message = "Curso actualizado!";
                                $type    = "success";			
                        }	
                        else {
                                $message = "Error en BD.";
                                $type    = "warn";	
                        }
                        $result = array(
                                'message' => $message,
                                'type'    => $type
                        );
                        echo json_encode($result);
                        die;
                }
        }
        public function get_cursos_abiertos(){
                $is_ajax = $this->input->is_ajax_request();
                if($is_ajax)
                {
                        $data  = $this->new_model->get_cursos_abiertos();
                        echo json_encode($data);
                        die;
                }
        }
        public function get_cursos_personas(){
                $is_ajax = $this->input->is_ajax_request();
                if($is_ajax)
                {
                        $data  = $this->new_model->get_cursos_personas();
                        echo json_encode($data);
                        die;
                }
        }     
        public function get_clientes(){
                $is_ajax = $this->input->is_ajax_request();
                if($is_ajax)
                {
                        $data  = $this->new_model->get_clientes();
                        echo json_encode($data);
                        die;
                }
        }       
        
}