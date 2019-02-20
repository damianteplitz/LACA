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
                $this->load->view('templates/header');
                $this->load->view('estadisticas/estadisticas');
                $this->load->view('templates/footer');
        }
}