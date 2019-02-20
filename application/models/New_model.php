<?php
class New_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        
        public function get_news()
        {
                $query = $this->db->get('Cursos');
                return $query->result_array();
        }

        public function set_news()
        {
                $this->load->helper('url');

                $data = array(
                    'nombre' => $this->input->post('nombre'),
                    'detalles' => $this->input->post('detalles'),
                    'duracion' => $this->input->post('duracion'),
                    'minimo' => $this->input->post('minimo'),
                    'maximo' => $this->input->post('maximo')       
                );

                return $this->db->insert('Cursos', $data);
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