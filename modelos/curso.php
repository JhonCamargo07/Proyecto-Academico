<?php
    class curso{
        // Atributos
        protected $idCurso;
        protected $fechaSeguimiento;
        protected $ambienteSalon;

        private function __construct(){
            $this->idCurso = null;
            $this->fechaSeguimiento = "";
            $this->ambienteSalon = "";
        }
    
        // Metodos get y set
        
        // Metodo set para los atributos
        public function setAtributosCurso($atributo, $valor){
            $this->$atributo = $valor;
        }

        // Metodo get para los atributos
        public function getAtributosCurso($atributo){
            return $this->$atributo;
        }
    }
?>