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
                $data['interesadas'] =  $this->new_model->get_interesadas();
                $data['persona'] = $this->new_model->get_clientes();
                $data['c_abiertos'] = $this->new_model->get_cursos_abiertos();
                $this->load->view('templates/header');
                $this->load->view('estadisticas/estadisticas', $data);
                $this->load->view('templates/footer');
        }
}