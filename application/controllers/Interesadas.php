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
                $this->load->view('templates/header', $data);
                $this->load->view('interesadas/interesadas');
                $this->load->view('templates/footer');
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
                                'id_cliente'    => $id_cliente,
                                'id_cabierto'   => $id_cabierto,
                                't_mañana'      => $t_mañana,
                                't_tarde'       => $t_tarde,
                                't_noche'       => $t_noche,
                                'estado'        => $estado                      
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
        function actualizar_Cliente(){
                $is_ajax = $this->input->is_ajax_request();
                if($is_ajax)
                {
                        $id = $this->input->post('id');
                        $nombre = $this->input->post('nombre');
                        $apellido = $this->input->post('apellido');
                        $telefono = $this->input->post('telefono');
                        $documento = $this->input->post('documento');
                        $direccion = $this->input->post('direccion');
                        $localidad = $this->input->post('localidad');
                        $mail = $this->input->post('mail');
                        $actualizar = $this->input->post('actualizar');

                        if (!$telefono){
                                $telefono = 0;
                        }
                        if (!$documento){
                                $documento = 0;
                        }
                        $datos = array(
                                'id'            => $id,
                                'nombre'        => $nombre,
                                'apellido'      => $apellido,
                                'telefono'      => $telefono,
                                'documento'     => $documento,
                                'direccion'     => $direccion,
                                'localidad'     => $localidad,
                                'mail'          => $mail                     
                        );
                        if($actualizar){
                                if($respuesta = $this->new_model->update_cliente($datos)){        
                                        $message = "Curso actualizado!";
                                        $type    = "success";			
                                }	
                                else {
                                        $message = "Error en BD.";
                                        $type    = "warn";	
                                }
                                $result = array(
                                        'message' => $message,
                                        'type'    => $type
                                );
                                echo json_encode($result);
                                die;
                        }
                        else{
                                if($respuesta = $this->new_model->new_cliente($datos)){        
                                        $message = "Curso actualizado!";
                                        $type    = "success";			
                                }	
                                else {
                                        $message = "Error en BD.";
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
}