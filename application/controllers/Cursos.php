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
                $data['abiertos'] = $this->new_model->get_det_cursos_abiertos();
                $data['materia'] = $this->new_model->get_det_cursos();
                $data['persona'] = $this->new_model->get_clientes();
                $data['title'] = 'Create a news item';
                $this->load->view('templates/header', $data);
                $this->load->view('cursos/cursos');
                $this->load->view('cursos/modal_cursos_nuevo');
                $this->load->view('templates/footer');
                

                /*$this->form_validation->set_rules('nombre', 'Nombre', 'required');
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
                */
                if ($this->form_validation->run() == FALSE)
                { 
                }
                else
                {
                        echo $this->input->post('nombre');
                       
                        $this->new_model->set_news();
                        $data['title'] = 'Generar nuevo curso';
                
                        $this->load->view('templates/header', $data);
                        $this->load->view('cursos/interesadas', $data);
                        $this->load->view('templates/footer');
                        $this->load->view('cursos/modal_cursos_nuevo');
                }
        }
        public function nuevo_Curso()
        {
                       
                if (!empty($_POST)) {
                        $this->load->helper('form');
                        $this->load->library('form_validation');
                        
                        $nombre = $this->input->post('nombre');
                        $detalles = $this->input->post('detalles');
                        $duracion = $this->input->post('duracion');
                        $minimo = $this->input->post('minimo');
                        $maximo = $this->input->post('maximo'); 
                        
                        $data['title'] = 'Crear nuevo curso';

                        $datos = array(
                                'nombre' => $nombre,
                                'detalles' => $detalles,
                                'duracion' => $duracion,
                                'minimo' => $minimo,
                                'maximo' => $maximo       
                        );
                        
                        if($nombre && $detalles && $duracion && $minimo && $maximo){
                                if($respuesta = $this->new_model->set_curso($datos)){        
                                        $message = "Orden Actualizado!";
                                        $type    = "success";			
                                }	
                                else {
                                        $message = "Error en BD.";
                                        $type    = "warn";	
                                }
        
                        }
                        else {
                                $message = "Error, verifique los datos.";
                                $type    = "warn";	
                        }
                        

                }

                $data['materia'] = $this->new_model->get_det_cursos();
                $data['persona'] = $this->new_model->get_clientes();
                $this->load->view('templates/header', $data);
                $this->load->view('cursos/cursos');
                $this->load->view('cursos/modal_cursos_nuevo');
                $this->load->view('templates/footer');
                $result = array(
                        'message' => $message,
                        'type'    => $type
                );
                echo json_encode($result);
        }

        public function editar_Curso()
        {
                       
                if (!empty($_POST)) {
                        $this->load->helper('form');
                        $this->load->library('form_validation');
                        
                        $id = $this->input->post('id');
                        $nombre = $this->input->post('nombre');
                        $detalles = $this->input->post('detalles');
                        $duracion = $this->input->post('duracion');
                        $minimo = $this->input->post('minimo');
                        $maximo = $this->input->post('maximo'); 
                        $checked = $this->input->post('checked');
                        
                        $data['title'] = 'Crear nuevo curso';

                        $datos = array(
                                'id' => $id,
                                'nombre' => $nombre,
                                'detalles' => $detalles,
                                'duracion' => $duracion,
                                'minimo' => $minimo,
                                'maximo' => $maximo                         
                        );

                        
                        if($nombre && $detalles && $duracion && $minimo && $maximo){
                                if($respuesta = $this->new_model->upload_curso($datos,$checked)){        
                                        $message = "Orden Actualizado!";
                                        $type    = "success";			
                                }	
                                else {
                                        $message = "Error en BD.";
                                        $type    = "warn";	
                                }
        
                        }
                        else {
                                $message = "Error, verifique los datos.";
                                $type    = "warn";	
                        }
                        

                }

                $data['materia'] = $this->new_model->get_det_cursos();
                $data['persona'] = $this->new_model->get_clientes();
                $this->load->view('templates/header', $data);
                $this->load->view('cursos/cursos');
                $this->load->view('cursos/modal_cursos_nuevo');
                $this->load->view('templates/footer');
                $result = array(
                        'message' => $message,
                        'type'    => $type
                );
                echo json_encode($result);
        }

        public function get_det_cursos (){
                $data  = $this->New_model->get_det_cursos();
        }
        public function get_det_cursos_abiertos (){
                $data  = $this->New_model->get_det_cursos_abiertos();
        }
}