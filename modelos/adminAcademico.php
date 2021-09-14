<?php
    class adminAcademico extends usuario{
        // Atributos
        private $idAdmin;
        private $nombreAdmin;
        private $apellidoAdmin;
        private $docAdmin;
        private $especialidadAdmin;
        private $estadoAdmin;

        // Constructor
        private function __construct(){
            $this->idAdmin = null;
            $this->nombreAdmin = "";
            $this->apellidoAdmin = "";
            $this->docAdmin = "";
            $this->estadoAdmin = "";
        }

        // Metodo set para los atributos
        public function setAtributosAdmin($atributo, $valor){
            $this->$atributo = $valor;
        }

        // Metodo get para los atributos
        public function getAtributosAdmin($atributo){
            return $this->$atributo;
        }
    }
?>