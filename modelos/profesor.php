<?php
    class profesor extends usuario{
        // Atributos
        private $idProfesor;
        private $nombreProfesor;
        private $apellidoProfesor;
        private $docProfesor;
        private $especialidadProfesor;
        private $estadoProfesor;

        // Constructor
        private function __construct(){
            $this->idProfesor = null;
            $this->nombreProfesor = "";
            $this->apellidoProfesor = "";
            $this->docProfesor = "";
            $this->estadoProfesor = "";
        }

        // Metodo set para los atributos
        public function setAtributosProfesor($atributo, $valor){
            $this->$atributo = $valor;
        }

        // Metodo get para los atributos
        public function getAtributosProfesor($atributo){
            return $this->$atributo;
        }
    }
?>