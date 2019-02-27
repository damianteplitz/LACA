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

                $data = array(
                    'nombre' => $this->input->post('nombre'),
                    'apellido' => $this->input->post('apellido'),
                    'documento' => $this->input->post('documento'),
                    'direccion' => $this->input->post('direccion'),
                    'mail' => $this->input->post('mail'),
                    'f_alta' => $this->input->post('f_alta')       
                );

                return $this->db->insert('Clientes', $data);
        }

        public function get_clientes()
        {
                $query = $this->db->get('Clientes');
                return $query->result_array();
        }
}