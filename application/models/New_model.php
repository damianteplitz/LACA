<?php
class New_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_todos_cursos()
        {
                $sql = "SELECT Cursos.id, Cursos.nombre, Cursos.detalles, Cursos.duracion, Cursos.minimo, Cursos.maximo, Cursos_abiertos.estado, Cursos.profesor, Cursos.modalidad, Cursos.objetivo, Cursos.programa, Cursos.materiales, Cursos.requisitos, Cursos.kit_inicio
                        FROM Cursos
                        INNER JOIN Cursos_abiertos 
                        ON Cursos.id=Cursos_abiertos.id_curso;";
                if ( ! $result = $this->db->query($sql)){
                        $this->db->_error_message();
                }
                else{
                        return $result->result_array();
                }
        }
        public function get_cursos_abiertos()
        {
                $sql = "SELECT Cursos.id, Cursos.nombre, Cursos.detalles, Cursos.duracion, Cursos.minimo, Cursos.maximo, Cursos_abiertos.estado, Cursos.profesor, Cursos.modalidad, Cursos.objetivo, Cursos.programa, Cursos.materiales, Cursos.requisitos, Cursos.kit_inicio
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
        public function get_clientes()
        {
                $query = $this->db->get('Clientes');
                return $query->result_array();
        }
        public function get_det_cliente_dni ($dni){
                $sql = "SELECT id, nombre, apellido, documento, direccion, mail, telefono, localidad
                FROM Clientes
                WHERE documento = $dni;";
                if ( ! $result = $this->db->query($sql)){
                        $this->db->_error_message();
                }
                else{
                        return $result->result_array();
                }
        }
        public function get_det_cliente_apellido ($apellido){
                $sql = "SELECT id, nombre, apellido, documento, direccion, mail, telefono, localidad
                FROM Clientes
                WHERE apellido = '$apellido';";
                if ( ! $result = $this->db->query($sql)){
                        $this->db->_error_message();
                }
                else{
                        return $result->result_array();
                }
        }
        public function get_cursos_disponibles_abiertos($id){

                $sql = "SELECT Cursos.id, Cursos.nombre, Cursos.detalles, Cursos.duracion, Cursos.minimo, Cursos.maximo, Clientes_cursos.estado, Clientes_cursos.t_m, Clientes_cursos.t_t, Clientes_cursos.t_n, Cursos.profesor, Cursos.modalidad, Cursos.objetivo, Cursos.programa, Cursos.materiales, Cursos.requisitos, Cursos.kit_inicio
                FROM Cursos
                INNER JOIN Cursos_abiertos
                ON Cursos_abiertos.id_curso=Cursos.id
                LEFT JOIN Clientes_cursos 
                ON (Clientes_cursos.id_cabierto = Cursos.id AND Clientes_cursos.id_cliente=".$id.") 
                WHERE Cursos_abiertos.estado = 1 AND (Clientes_cursos.estado IS NULL OR Clientes_cursos.estado < 2);";
                if ( ! $result = $this->db->query($sql)){
                        $this->db->_error_message();
                }
                else{
                        return $result->result_array();
                }
        }
        public function get_cursos_clientes(){
                
                $sql = "SELECT Clientes_cursos.id_cabierto, Clientes_cursos.estado, Clientes_cursos.t_m, Clientes_cursos.t_t, Clientes_cursos.t_n, Clientes.nombre, Clientes.apellido, Clientes.telefono, Clientes.mail, Clientes.id
                FROM Clientes_cursos
                LEFT JOIN Clientes 
                ON Clientes_cursos.id_cliente=Clientes.id order by Clientes_cursos.id_cabierto, Clientes_cursos.estado;";
                if ( ! $result = $this->db->query($sql)){
                        $this->db->_error_message();
                }
                else{
                        return $result->result_array();
                }
        }
        public function get_cursos_personas()
        {
                $sql = "SELECT Clientes_cursos.id_cabierto, Clientes_cursos.id_cliente, Clientes_cursos.estado, Cursos.nombre as curso, Clientes.nombre, Clientes.apellido, Clientes.documento
                        FROM Clientes_cursos
                                INNER JOIN Cursos
                                ON Cursos.id = Clientes_cursos.id_cabierto
                                INNER JOIN Clientes
                                ON Clientes.id = Clientes_cursos.id_cliente
                                WHERE estado != 0;";
                if ( ! $result = $this->db->query($sql)){
                        $this->db->_error_message();
                }
                else{
                        return $result->result_array();
                }
        }
        public function new_curso($data)
        {                
                $sql = 'INSERT INTO Cursos (nombre,profesor,detalles,objetivo,programa,materiales,requisitos,kit_inicio,minimo,maximo,duracion,modalidad)
                VALUES ("'.$data['nombre'].'","'.$data['profesor'].'","'.$data['detalles'].'","'.$data['objetivo'].'","'.$data['programa'].'","'.$data['materiales'].'","'.$data['requisitos'].'","'.$data['kit_inicio'].'",'.$data['minimo'].','.$data['maximo'].','.$data['duracion'].','.$data['curso'].');';
                if ( ! $result = $this->db->query($sql)){                       
                        $this->db->_error_message();
                }
                else{
                        $sql =  'INSERT INTO Cursos_abiertos (id_curso,estado)
                        VALUES ((SELECT MAX(id) as id_curso FROM Cursos),'.$data['abierto'].');';
                        if ( ! $result = $this->db->query($sql)){

                                $this->db->_error_message();
                        
                        }
                        else{
                                return $result;
                        }
                }
        }
        public function new_interesada($data){
                $sql = "INSERT INTO Clientes_cursos (id_cliente,id_cabierto,estado,f_consulta,f_inscripcion,t_m,t_t,t_n) 
                VALUES (".$data['id_cliente'].",".$data['id_cabierto'].",".$data['estado'].",CURDATE(),CURDATE(),".$data['t_mañana'].",".$data['t_tarde'].",".$data['t_noche'].");";
                if ( ! $result = $this->db->query($sql)){
                        $this->db->_error_message();
                }
                else{
                        return $result;
                }
        }
        public function new_cliente ($data){
                $sql =  'INSERT INTO Clientes (nombre,apellido,telefono,documento,direccion,localidad,mail)
                VALUES ("'.$data['nombre'].'","'.$data['apellido'].'",'.$data['telefono'].','.$data['documento'].',"'.$data['direccion'].'","'.$data['localidad'].'","'.$data['mail'].'");';
                if ( ! $result = $this->db->query($sql)){
                        $this->db->_error_message();
                }
                else{
                        return $result;
                }
        }
        public function update_curso($data)
        {                
                $sql = 'UPDATE Cursos
                SET nombre = "'.$data['nombre'].'" , profesor = "'.$data['profesor'].'" , detalles = "'.$data['detalles'].'" , objetivo = "'.$data['objetivo'].'", programa = "'.$data['programa'].'" , materiales = "'.$data['materiales'].'" , requisitos = "'.$data['requisitos'].'" , kit_inicio = "'.$data['kit_inicio'].'", minimo = '.$data['minimo'].' , maximo = '.$data['maximo'].' , duracion = '.$data['duracion'].' , modalidad = '.$data['curso'].'
                WHERE id = '.$data['id'].';';
                if ( ! $result = $this->db->query($sql)){
                       
                        $this->db->_error_message();
                }
                else{
                        $sql =  'UPDATE Cursos_abiertos
                        SET estado = '.$data['abierto'].'
                        WHERE id_curso = '.$data['id'].';';
                        if ( ! $result = $this->db->query($sql)){

                                $this->db->_error_message();
                        
                        }
                        else{
                                return $result;
                        }
                }
        }
        public function upload_interesada($data)
        {
                $sql = "UPDATE Clientes_cursos
                SET estado = ".$data['estado']." , t_m = ".$data['t_mañana']." , t_t = ".$data['t_tarde']." , t_n = ".$data['t_noche']." 
                WHERE id_cliente = ".$data['id_cliente']." AND id_cabierto = ".$data['id_cabierto'].";";
                if ( ! $result = $this->db->query($sql)){
                        $this->db->_error_message();
                }
                else{
                        return $result;
                }
        }
        public function update_cliente ($data){

                $sql =  'UPDATE Clientes
                        SET nombre = "'.$data['nombre'].'",apellido = "'.$data['apellido'].'",telefono = '.$data['telefono'].',documento = '.$data['documento'].',direccion = "'.$data['direccion'].'",localidad = "'.$data['localidad'].'",mail = "'.$data['mail'].'"
                        WHERE id = '.$data['id'].';';
                        if ( ! $result = $this->db->query($sql)){
                                $this->db->_error_message();
                        }
                        else{
                                return $result;
                        }
        }
        public function actualizar_inscripta($data){
                $sql =  'UPDATE Clientes_cursos
                        SET estado = '.$data['estado'].'
                        WHERE id_cabierto = '.$data['id_cabierto'].' AND id_cliente = '.$data['id_cliente'].';';
                        if ( ! $result = $this->db->query($sql)){
                                $this->db->_error_message();
                        }
                        else{
                                return $result;
                        }
        }
}

