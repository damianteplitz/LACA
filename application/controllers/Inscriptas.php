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
                $data['interesadas'] =  $this->new_model->get_interesadas();
                $data['c_abiertos'] = $this->new_model->get_cursos_abiertos();
                $data['c_cerrados'] = $this->new_model->get_cursos_cerrados();
                $data['materia'] = $this->new_model->get_det_cursos();
                $data['persona'] = $this->new_model->get_clientes();
                $data['title'] = 'Create a news item';
                $this->load->view('templates/header', $data);
                $this->load->view('inscriptas/inscriptas', $data);
                $this->load->view('templates/footer');
        }

        public function get_det_cursos (){
                $data  = $this->New_model->get_det_cursos();
        }
        public function get_det_cursos_abiertos (){
                $data  = $this->New_model->get_det_cursos_abiertos();
        }
        public function get_cursos_abiertos (){
                $data  = $this->New_model->get_cursos_abiertos();
        }
        public function get_cursos_cerrados (){
                $data  = $this->New_model->get_cursos_cerrados();
        }
        public function getclientes (){
                
                $is_ajax = $this->input->is_ajax_request();

                if($is_ajax)
                {
                        $data = $this->New_model->get_clientes($id);
                        echo json_encode($data);
                        die;
                }
        }
}