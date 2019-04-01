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
        public function update_inscriptas()
        {
                       
                if (!empty($_POST)) {
                        $this->load->helper('form');
                        $this->load->library('form_validation');
                        
                        $id_curso = $this->input->post('id_curso');
                        $id_cliente = $this->input->post('id_cliente');
                        $interesada = $this->input->post('interesada');
                        $rechazada = $this->input->post('rechazada');
                        $confirmada = $this->input->post('confirmada');
                        
                        if($interesada){
                                $estado = "1";
                        }
                        
                        if($rechazada){
                                $estado = "3";
                        }
                        
                        if($confirmada){
                                $estado = "2";
                        }
                        

                        $data['title'] = 'Crear nuevo curso';

                        $datos = array(
                                'id_curso' => $id_curso,
                                'id_cliente' => $id_cliente,
                                'estado' => $estado                      
                        );

                        
                        if($id_cliente && $id_curso){
                                if($respuesta = $this->new_model->upload_inscripta($datos)){        
                                        $message = "Orden Actualizado!";
                                        $type    = "success";			
                                }	
                                else {
                                        $message = "Error en BD.";
                                        $type    = "warn";	
                                }
        
                        }
                        else {
                                $message = "Error, verifique los datos";
                                $type    = "warn";	
                        }
                        

                }

                $data['interesadas'] =  $this->new_model->get_interesadas();
                $data['c_abiertos'] = $this->new_model->get_cursos_abiertos();
                $data['c_cerrados'] = $this->new_model->get_cursos_cerrados();
                $data['materia'] = $this->new_model->get_det_cursos();
                $data['persona'] = $this->new_model->get_clientes();
                $data['title'] = 'Create a news item';
                $this->load->view('templates/header', $data);
                $this->load->view('inscriptas/inscriptas', $data);
                $this->load->view('templates/footer');
                $result = array(
                        'message' => $message,
                        'type'    => $type
                );
                echo json_encode($result);
        }
}