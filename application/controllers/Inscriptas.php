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
                $this->load->view('templates/header');
                $this->load->view('inscriptas/inscriptas');
                $this->load->view('templates/footer');
        }
}