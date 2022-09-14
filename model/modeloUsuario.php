<?php 
include_once "../../controller/Base.php";

    class modeloUsuario {
        private $db;

        public function __construct() {
            $this->db = new Base;
        }
        
        public function crear($data){
            $this->db->query('INSERT INTO usuarios (nombre, correo, contrasena, dirrecion, telefono, fecha_nac) VALUES (:nombre, :correo, :contrasena, :dirrecion, :telefono, :fecha_nac)');
            $this->db->bind(':nombre', $data['nombre']);
            $this->db->bind(':correo', $data['correo']);
            $this->db->bind(':contrasena', $data['contrasena']);
            $this->db->bind(':dirrecion', $data['dirrecion']);
            $this->db->bind(':telefono', $data['telefono']);
            $this->db->bind(':fecha_nac', $data['fecha_nac']);

            return ($this->db->execute()) ? true : false;
        }

        public function login($correo) {
            $this->db->query("SELECT contrasena FROM usuarios WHERE correo = :correo");
            $this->db->bind(':correo', $correo);
            return $this->db->registro();
        }
    
        
    }
?>