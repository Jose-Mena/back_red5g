<?php 
include_once "../../controller/Base.php";

    class modeloNoticias {
        private $db;

        public function __construct() {
            $this->db = new Base;
        }
        
        public function listar(){
            $this->db->query("SELECT * FROM noticias");
            return $this->db->registros();
        }

        public function consultar($id) {
            $this->db->query("SELECT * FROM noticias WHERE id = :id");
            $this->db->bind(':id', $id);
            return $this->db->registro();
        }

        public function crear($data){
            $this->db->query('INSERT INTO noticias (titulo, descripcion) VALUES (:titulo, :descripcion)');
            $this->db->bind(':titulo', $data['titulo']);
            $this->db->bind(':descripcion', $data['descripcion']);
            return ($this->db->execute()) ? true : false;
        }
    
        public function editar($data, $id){
            $this->db->query("UPDATE noticias SET titulo=:titulo, descripcion=:descripcion WHERE id = :id");
            $this->db->bind(':id', $id);
            $this->db->bind(':titulo', $data['titulo']);
            $this->db->bind(':descripcion', $data['descripcion']);
            return ($this->db->execute()) ? true : false;
        }
    
        public function eliminar($id){
            $this->db->query("DELETE FROM noticias WHERE id = :id");
            $this->db->bind(':id', $id);
            return ($this->db->execute()) ? true : false;
        }

        public function comentario($comentario, $noticia){
            $this->db->query('INSERT INTO comentarios (comentario, noticia) VALUES (:comentario, :noticia)');
            $this->db->bind(':comentario', $comentario);
            $this->db->bind(':noticia', $noticia);
            return ($this->db->execute()) ? true : false;
        }
    }
?>