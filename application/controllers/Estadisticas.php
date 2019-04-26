<?php
class Estadisticas extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('new_model');
                $this->load->helper('url_helper');
                
        }
        
        public function estadisticas()
        {
                $this->load->helper('form');
                $this->load->library('form_validation');
                $data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
                );
                $this->load->view('templates/header');
                $this->load->view('estadisticas/estadisticas', $data);
                $this->load->view('templates/footer');
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
        public function get_clientes_cursos(){
                $is_ajax = $this->input->is_ajax_request();
                if($is_ajax)
                {
                        $data  = $this->new_model->get_cursos_clientes();
                        echo json_encode($data);
                        die;
                }
        }
}