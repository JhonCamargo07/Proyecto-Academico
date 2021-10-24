<?php
    require_once('conexion.php');
    class curso{
        // Atributos
        protected $idCurso;
        protected $fechaSeguimiento;
        protected $ambienteSalon;
        private $pdo;

        public function __construct(){
            try {
                $this->pdo = Conexion::startUp();
            } catch (Exception $j) {
                echo "Error al conectarse con la base de datos.";
                die($j->getMessage());
            }
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

        public function CrearCurso(){
            
        }
    }
?>