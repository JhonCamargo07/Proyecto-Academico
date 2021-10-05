<?php
    class Conexion{
        public static function startUp(){
            // Conectarse a la base de datos
            $pdo = new PDO('mysql:host=localhost;dbname=proyecto_academico;charset=utf8', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// Para los errores
            return $pdo;
        }
    }
?>