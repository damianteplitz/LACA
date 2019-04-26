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
                $data['csrf'] = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
                );
                $this->load->view('templates/header', $data);
                $this->load->view('cursos/cursos');
                $this->load->view('templates/footer');
                
        }
        function actualizar_Curso(){
                $is_ajax = $this->input->is_ajax_request();
                if($is_ajax)
                {
                        $id = $this->input->post('id');
                        $nombre = $this->input->post('nombre');
                        $profesor = $this->input->post('profesor');
                        $detalles = $this->input->post('detalles');
                        $objetivo = $this->input->post('objetivo');
                        $programa = $this->input->post('programa');
                        $materiales = $this->input->post('materiales');
                        $requisitos = $this->input->post('requisitos');
                        $kit_inicio = $this->input->post('kit_inicio');
                        $duracion = $this->input->post('duracion');
                        $minimo = $this->input->post('minimo');
                        $maximo = $this->input->post('maximo');
                        $curso = $this->input->post('curso');
                        $abierto = $this->input->post('abierto');
                        $actualizar = $this->input->post('actualizar');
                        if(!$duracion){
                                $duracion = 0;
                        }
                        if(!$minimo){
                                $minimo = 0;
                        }
                        if(!$maximo){
                                $maximo = 0;
                        }
                        if($curso == 'true'){
                                $curso = "1";
                        }
                        if($curso=='false'){
                                $curso = "0";
                        }
                        if($abierto == 'true'){
                                $abierto = "1";
                        }
                        if($abierto=='false'){
                                $abierto = "0";
                        }
                        $datos = array(
                                'id'            => $id,
                                'nombre'        => $nombre,
                                'profesor'      => $profesor,
                                'detalles'      => $detalles,
                                'objetivo'      => $objetivo,
                                'programa'      => $programa,
                                'materiales'    => $materiales,
                                'requisitos'    => $requisitos,
                                'kit_inicio'    => $kit_inicio,
                                'minimo'        => $minimo,
                                'maximo'        => $maximo,
                                'duracion'      => $duracion,
                                'curso'         => $curso,
                                'abierto'       => $abierto                      
                        );
                        if($actualizar){
                                if($respuesta = $this->new_model->update_curso($datos)){        
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
                                if($respuesta = $this->new_model->new_curso($datos)){        
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
        
        public function get_cursos (){
                $is_ajax = $this->input->is_ajax_request();

                if($is_ajax)
                {
                        $data  = $this->new_model->get_todos_cursos();
                        echo json_encode($data);
                        die;
                }
        }

}