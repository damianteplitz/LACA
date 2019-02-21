<?php
class Cursos extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('new_model');
                $this->load->helper('url_helper');
        }
        public function cursos()
        {
                $this->load->helper('form');
                $this->load->library('form_validation');
               
                $data['materia'] = $this->new_model->get_news();
                $data['persona'] = $this->new_model->get_clientes();
                $data['title'] = 'Create a news item';


                $this->form_validation->set_rules('nombre', 'Nombre', 'required');
                $this->form_validation->set_rules('apellido', 'Apellido', 'required');
                $this->form_validation->set_rules('documento', 'Documento', 'required');
                $this->form_validation->set_rules('direccion', 'Direccion', 'required');
                $this->form_validation->set_rules('mail', 'Mail', 'required');
                $this->form_validation->set_rules('f_alta', 'Fecha alta', 'required');

                $this->form_validation->set_rules('nombre', 'Nombre', 'required');
                $this->form_validation->set_rules('detalles', 'Detalles', 'required');
                $this->form_validation->set_rules('duracion', 'Duracion', 'required');
                $this->form_validation->set_rules('minimo', 'Minimo', 'required');
                $this->form_validation->set_rules('maximo', 'Maximo', 'required');
                
                if ($this->form_validation->run() === FALSE)
                {
                        $this->load->view('templates/header', $data);
                        $this->load->view('cursos/cursos');
                        $this->load->view('templates/footer');
                        $this->load->view('cursos/modal_cursos_nuevo');
                }
                else
                {
                        $this->new_model->set_news();
                        $data['title'] = 'Generar nuevo curso';
                
                        $this->load->view('templates/header', $data);
                        $this->load->view('cursos/interesadas', $data);
                        $this->load->view('templates/footer');
                        $this->load->view('cursos/modal_cursos_nuevo');
                }
        }
}