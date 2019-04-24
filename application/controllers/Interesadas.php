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
                
                        $data['interesadas'] =  $this->new_model->get_interesadas();
                        $data['c_abiertos'] = $this->new_model->get_cursos_abiertos();
                        $data['c_cerrados'] = $this->new_model->get_cursos_cerrados();
                        $data['materia'] = $this->new_model->get_det_cursos();
                        $data['persona'] = $this->new_model->get_clientes();
                        $data['title'] = 'Generar nuevo curso';
                              
                        $this->load->view('templates/header', $data);
                        $this->load->view('interesadas/interesadas', $data);
                        $this->load->view('interesadas/modal_interesadas');
                        $this->load->view('templates/footer');
                }

                $data['interesadas'] =  $this->new_model->get_interesadas();
                $data['c_abiertos'] = $this->new_model->get_cursos_abiertos();
                $data['c_cerrados'] = $this->new_model->get_cursos_cerrados();
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

        public function get_det_cursos_j (){
                $is_ajax = $this->input->is_ajax_request();

                if($is_ajax)
                {
                        $data  = $this->new_model->get_det_cursos();
                        echo json_encode($data);
                        die;
                }
        }	

        public function get_cliente_dni (){
                $is_ajax = $this->input->is_ajax_request();

                if($is_ajax)
                {
                        $dni = $this->input->post('documento');
                        $data  = $this->new_model->get_det_cliente_dni($dni);
                        echo json_encode($data);
                        die;
                }
        }	
        public function get_cliente_apellido (){
                $is_ajax = $this->input->is_ajax_request();

                if($is_ajax)
                {
                        $apellido = $this->input->post('apellido');
                        $data  = $this->new_model->get_det_cliente_apellido($apellido);
                        echo json_encode($data);
                        die;
                }
        }
        

        public function nuevo_Cliente()
        {
                       
                if (!empty($_POST)) {
                        $this->load->helper('form');
                        $this->load->library('form_validation');
                        
                        $nombre = $this->input->post('nombre');
                        $apellido = $this->input->post('apellido');
                        $documento = $this->input->post('documento');
                        $direccion = $this->input->post('direccion');
                        $localidad = $this->input->post('localidad');
                        $telefono = $this->input->post('telefono');
                        $mail = $this->input->post('mail'); 
                        
                        $data['title'] = 'Crear nuevo curso';

                        $datos = array(
                                'nombre' => $nombre,
                                'apellido' => $apellido,
                                'documento' => $documento,
                                'direccion' => $direccion,
                                'telefono' => $telefono,
                                'localidad' => $localidad,
                                'mail' => $mail       
                        );
                        
                        if($nombre && $apellido && $documento && $direccion && $mail){
                                if($respuesta = $this->new_model->set_cliente($datos)){        
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

                $data['interesadas'] =  $this->new_model->get_interesadas();
                $data['c_abiertos'] = $this->new_model->get_cursos_abiertos();
                $data['c_cerrados'] = $this->new_model->get_cursos_cerrados();
                $data['materia'] = $this->new_model->get_det_cursos();
                $data['persona'] = $this->new_model->get_clientes();
                $data['title'] = 'Generar nuevo curso';
                $this->load->view('templates/header', $data);
                $this->load->view('interesadas/interesadas', $data);
                $this->load->view('interesadas/modal_interesadas');
                $this->load->view('templates/footer');
                $result = array(
                        'message' => $message,
                        'type'    => $type
                );
                echo json_encode($result);
        }

        public function editar_Cliente()
        {
                       
                if (!empty($_POST)) {
                        $this->load->helper('form');
                        $this->load->library('form_validation');
                        $data['interesadas'] =  $this->new_model->get_interesadas();
                        $id = $this->input->post('id');
                        $nombre = $this->input->post('nombre');
                        $apellido = $this->input->post('apellido');
                        $documento = $this->input->post('documento');
                        $direccion = $this->input->post('direccion');
                        $mail = $this->input->post('mail'); 
                        
                        $data['title'] = 'Crear nuevo curso';

                        $datos = array(
                                'id' => $id,
                                'nombre' => $nombre,
                                'apellido' => $apellido,
                                'documento' => $documento,
                                'direccion' => $direccion,
                                'mail' => $mail                         
                        );

                        
                        if($id && $nombre && $apellido && $documento && $direccion && $mail){
                                if($respuesta = $this->new_model->upload_cliente($datos,$data['interesadas'])){        
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

                $data['interesadas'] =  $this->new_model->get_interesadas();
                $data['c_abiertos'] = $this->new_model->get_cursos_abiertos();
                $data['c_cerrados'] = $this->new_model->get_cursos_cerrados();
                $data['materia'] = $this->new_model->get_det_cursos();
                $data['persona'] = $this->new_model->get_clientes();
                $data['title'] = 'Generar nuevo curso';
                $this->load->view('templates/header', $data);
                $this->load->view('interesadas/interesadas', $data);
                $this->load->view('interesadas/modal_interesadas');
                $this->load->view('templates/footer');
                $result = array(
                        'message' => $message,
                        'type'    => $type
                );
                echo json_encode($result);
        }

        public function actualizar_Interesada()
        {
                       
                $is_ajax = $this->input->is_ajax_request();
                if($is_ajax)
                {
                        $id_cliente = $this->input->post('id_cliente');
                        $id_cabierto = $this->input->post('id_cabierto');
                        $creado = $this->input->post('estado');
                        $estado = $this->input->post('checked');
                        $t_mañana = $this->input->post('t_mañana');
                        $t_tarde = $this->input->post('t_tarde');
                        $t_noche = $this->input->post('t_noche');
                        
                        if($estado == 'true'){
                                $estado = "1";
                        }
                        if($estado=='false'){
                                $estado = "0";
                        }
                        if($t_mañana == 'true'){
                                $t_mañana = "1";
                        }
                        if($t_mañana=='false'){
                                $t_mañana = "0";
                        }
                        if($t_tarde == 'true'){
                                $t_tarde = "1";
                        }
                        if($t_tarde=='false'){
                                $t_tarde = "0";
                        }
                        if($t_noche == 'true'){
                                $t_noche = "1";
                        }
                        if($t_noche=='false'){
                                $t_noche = "0";
                        }


                        $datos = array(
                                'id_cliente' => $id_cliente,
                                'id_cabierto' => $id_cabierto,
                                't_mañana' => $t_mañana,
                                't_tarde' => $t_tarde,
                                't_noche' => $t_noche,
                                'estado' => $estado                      
                        );

                
                        if($creado != null){
                                if($respuesta = $this->new_model->upload_interesada($datos)){        
                                        $message = "Cliente actualizada!";
                                        $type    = "success";			
                                }	
                                else {
                                        $message = "Error en BD.";
                                        $type    = "warn";	
                                }
        
                        }
                        else{
                                if($respuesta = $this->new_model->new_interesada($datos)){        
                                        $message = "Cliente actualizada!";
                                        $type    = "success";			
                                }	
                                else {
                                        $message = "Error en BD.";
                                        $type    = "warn";	
                                }
                        }
			$result = array(
                                'message' => $message,
                                'type'    => $type
                        );
                        echo json_encode($result);
                        die;
                }
        }
                

        public function get_cursos_disponibles (){
                $is_ajax = $this->input->is_ajax_request();

                if($is_ajax)
                {
                        $id = $this->input->post('id');
                        $data  = $this->new_model->get_cursos_disponibles_abiertos($id);
                        echo json_encode($data);
                        die;
                }
        }
       
}