<?php
    class ingresar{
        private $usuario;
        private $clave;
        private $db;

        public function __construct(){
            $this->usuario = array();
            $this->clave = array();
            $this->db = new PDO('mysql:host=localhost;dbname=proyecto_academico',"root", "");
        }

        private function setNames(){
            return $this->db->query("SET NAMES 'utf8'");
        }

        public function setDatos($usuario_ingresado, $clave_ingresada){
            $this->usuario = $usuario_ingresado;
            $this->clave = $clave_ingresada;
        }

        public function getIngreso(){
            self::setNames();
            // $select = "SELECT id_PK, nombre, precio FROM servicio";
            $select = "SELECT * FROM Usuario WHERE binary Usuario =  $this->usuario  and binary PasswordU = $this->clave";
            foreach($this->db->query($select) as $resultado){
                // $this->usuario[] = $resultado;
                header("location:menu.php");
            }
            return $this->usuario;
            $this->db = null;
            session_start();
            $_SESSION['usuario'] = $this->usuario;
        }
    }
?>