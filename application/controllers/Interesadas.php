<?php
class Interesadas extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('new_model');
                $this->load->helper('url_helper');
        }
        
        public function interesadas()
        {
                $data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
                );
                $this->load->helper('form');
                $this->load->library('form_validation');

                $this->form_validation->set_rules('nombre', 'Nombre', 'required');
                $this->form_validation->set_rules('apellido', 'Apellido', 'required');
                $this->form_validation->set_rules('documento', 'Documento', 'required');
                $this->form_validation->set_rules('direccion', 'Direccion', 'required');
                $this->form_validation->set_rules('mail', 'Mail', 'required');
                $this->form_validation->set_rules('f_alta', 'Fecha alta', 'required');

                if ($this->form_validation->run())
                {
                        $this->new_model->set_clientes();  
                
                        $data['materia'] = $this->new_model->get_det_cursos();
                        $data['persona'] = $this->new_model->get_clientes();
                        $data['title'] = 'Generar nuevo curso';
                              
                        $this->load->view('templates/header', $data);
                        $this->load->view('interesadas/interesadas', $data);
                        $this->load->view('interesadas/modal_interesadas');
                        $this->load->view('templates/footer');
                }


                $data['materia'] = $this->new_model->get_det_cursos();
                $data['persona'] = $this->new_model->get_clientes();
                $data['title'] = 'Generar nuevo curso';
        
                $this->load->view('templates/header', $data);
                $this->load->view('interesadas/interesadas', $data);
                $this->load->view('templates/footer');
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
        public function get_det_cursos (){
                $data  = $this->New_model->get_det_cursos();
        }	
        public function updateInteresada(){
                $is_ajax = $this->input->is_ajax_request();

                if($is_ajax)
                {
                        $id_cliente     = $this->input->post('id_cliente');
                        $id_cabierto    = $this->input->post('id_cabierto');
                        $estado         = $this->input->post('estado');
                        $data = array(
				'id_cliente'            => $id_cliente,
				'id_cabierto'              => $id_cabierto,
				'estado'        => $estado
                        );
                        $response = $this->new_model->setInteresada($data);
                        if($response)
			{
				$message = "Curso asignado";
				$type    = "success";
			}
			else
			{
				$message = "Error, verifique los datos.";
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
       
}