<?php
class New_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        
        public function get_det_cursos()
        {
                $query = $this->db->get('Cursos');
                return $query->result_array();
        }
        public function get_det_cursos_abiertos()
        {
                //hacer
                $query = $this->db->get('Cursos');
                return $query->result_array();
        }

        public function set_curso($data)
        {
                
                $this->load->helper('url');
                //chequear query antes en vez de esto que no sirve
               
                $cursosexistentes = $this->new_model->get_det_cursos();
                
                foreach ($cursosexistentes as $course){
                        if ($course['nombre'] == $data['nombre']){
                                echo '<script type="text/javascript">
                                alert("Curso ya existente, no se creo el curso");
                                window.location.href="cursos";
                                </script>';
                                return -1;
                        }
                }
                if ( ! $result = $this->db->insert('Cursos', $data)){
                        $this->db->_error_message();
                }
                else{
                        //hacer
                        //set_curso_abierto($data);
                        echo '<script type="text/javascript">
                                alert("Curso nuevo creado");
                                window.location.href="cursos";
                                </script>';
                        return $result;
                }
        }

        


        public function upload_curso($data)
        {
                $this->db->where('id',$data['id']);
                
                if($this->db->update('Cursos', $data) )
                {
                        echo '<script type="text/javascript">
                                alert("Curso actualizado");
                                window.location.href="cursos";
                                </script>';
                        return $result;
                }
                else
                {
                        $this->db->_error_message();
                }
        }

        public function set_clientes()
        {
                $this->load->helper('url');
/*
                $clientesexistentes = $this->new_model->get_clientes();

                foreach ($clientesexistentes as $cliente){
                                
                        if ($cliente['documento'] == $data['dni']){
                                echo '<script type="text/javascript">
                                alert("Documento ya existente, no se creo el cliente");
                                window.location.href="interesadas";
                                </script>';
                                return -1;
                        }
                }
                if ( ! $result = $this->db->insert('Clientes', $data)){
                        $this->db->_error_message();
                }
                else{
                        echo '<script type="text/javascript">
                                alert("Cliente nuevo creado");
                                window.location.href="interesadas";
                                </script>';
                        return $result;
                }*/
        }

        public function get_clientes()
        {
                $query = $this->db->get('Clientes');
                return $query->result_array();
        }
        public function setInteresada ($data)
        {
                $resultado = $this->db->insert('Clientes_cursos',$data);
                return $resultado;
        }
        /*
        public function set_curso_abierto($dato){
                $dato['id'] = $id;
                $date = date('Y/m/d');
                $data = array(
                        'id_curso' => $id,
                        'f_inicio' => $date,
                        'f_final' => '2019-12-31',
                        'estado' => 1

                );
                $result = $this->db->insert('Cursos_abiertos', $data);
        }
        */
}

