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
                $query = $this->db->get('Cursos_abiertos');
                return $query->result_array();
        }
        public function get_cursos_cerrados()
        {
                $sql = "SELECT Cursos.id, Cursos.nombre, Cursos.detalles, Cursos.duracion, Cursos.minimo, Cursos.maximo, Cursos_abiertos.estado
                        FROM Cursos
                        INNER JOIN Cursos_abiertos 
                        ON Cursos.id=Cursos_abiertos.id_curso 
                        WHERE Cursos_abiertos.estado = 0;";
                if ( ! $result = $this->db->query($sql)){
                        $this->db->_error_message();
                }
                else{
                        return $result->result_array();
                }
        }
        public function get_cursos_abiertos()
        {
                $sql = "SELECT Cursos.id, Cursos.nombre, Cursos.detalles, Cursos.duracion, Cursos.minimo, Cursos.maximo, Cursos_abiertos.estado
                        FROM Cursos
                        INNER JOIN Cursos_abiertos 
                        ON Cursos.id=Cursos_abiertos.id_curso 
                        WHERE Cursos_abiertos.estado = 1;";
                if ( ! $result = $this->db->query($sql)){
                        $this->db->_error_message();
                }
                else{
                        return $result->result_array();
                }
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
                        $sql = "insert into c_laca.Cursos_abiertos (id_curso,f_inicio,f_final,estado)
                        VALUES ((SELECT MAX(id) as id_curso FROM Cursos),'2019-02-01','2019-02-28',1);";
                        if ( ! $result = $this->db->query($sql)){
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
        }

        public function upload_curso($data,$checked)
        {
                if(!$checked){
                        $checked = "0";
                }
                else{
                        $checked ="1";
                }
                $this->db->where('id',$data['id']);
                
                if($this->db->update('Cursos', $data) )
                {
                        $sql = "UPDATE c_laca.Cursos_abiertos
                                        SET estado = ".$checked." 
                                        WHERE id_curso = ".$data['id'].";";
                                if ( ! $result = $this->db->query($sql)){
                                        $this->db->_error_message();
                                }
                                else{
                                        echo '<script type="text/javascript">
                                        alert("Curso actualizado");
                                        window.location.href="cursos";
                                        </script>';
                                        return $result;
                                }
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
}

