<?php
    class usuario{
        // Atributos
        protected $idUsuario;
        protected $user;
        protected $password;

        function __construct(){
            $this->idUsuario = null;
            $this->user = "";
            $this->password = "";
        }
    
        // Metodos get y set
        
        // Metodo set para los atributos
        public function setAtributosUsuario($atributo, $valor){
            $this->$atributo = $valor;
        }

        // Metodo get para los atributos
        public function getAtributosUsuario($atributo){
            return $this->$atributo;
        }


        // Metodo para crear usuario
        public function crearUsuario(){
            
        }

        // Metodo para modificar usuario
        public function modificarUsuario(){

        }
        
        // Metodo para consultar acceso
        public function consultaAcceso(){

        }

    }
?>