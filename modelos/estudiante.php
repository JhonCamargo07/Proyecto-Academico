<?php
    class estudiante extends usuario{
        // Atributos
        private $idEstudiante;
        private $nombreEstudiante;
        private $apellidoEstudiante;
        private $docEstudiante;
        private $estadoEstudiante;

        // Constructor
        private function __construct(){
            $this->idEstudiante = null;
            $this->nombreEstudiante = "";
            $this->apellidoEstudiante = "";
            $this->docEstudiante = "";
            $this->estadoEstudiante = "";
        }

        // Metodo set para los atributos
        public function setAtributosEstudiante($atributo, $valor){
            $this->$atributo = $valor;
        }

        // Metodo get para los atributos
        public function getAtributosEstudiante($atributo){
            return $this->$atributo;
        }

        // Metodo para crear estudiante
        public function crearEstudiante(){
            
        }

        // Metodo para modificar estudiante
        public function modificarEstudiante(){

        }
        
        // Metodo para consultar estudiante
        public function consultarEstudiante(){

        }
    }
?>