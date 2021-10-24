<?php
    session_start(); // Iniciar sesión
    require('Conexion.php');
    class Login{
        private $pdo;

        public function __construct(){
            try {
                $this->pdo = Conexion::startUp();
            } catch (Exception $j) {
                echo "Error al conectarse con la base de datos.";
                die($j->getMessage());
            }
        }

        // Función para consultar el usuario en la base de datos
        public function login($usuario, $password){
            $str = $this->pdo->prepare("SELECT * FROM Usuario WHERE BINARY Usuario = :UserU /* AND BINARY PasswordU = :PasswordU */");
            $str->bindParam(':UserU', $usuario);
            // $str->bindParam(':PasswordU', $password);
            $str->execute();
            if($str->rowCount() == 1){
                $resultado = $str->fetch();
                // Se hace la comprobacion si la contraseña que el usuario ingresa (sin encriptar) es igual a la que esta en la base de datos (con encriptación), esto utlizando la funcion password_verify
                if(password_verify($password, $resultado['PasswordU'])){
                    // Guardar algunos datos dentro de la sesión
                    $_SESSION['Nombre']=$resultado["NombreUsuario"] . " " . $resultado['ApellidoUsuario'];
                    $_SESSION['Sexo']=$resultado['SexoUsuario'];
                    $_SESSION['id']=$resultado['IDUsuarioPK'];
                    return $_SESSION['id'];
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public function validarSesion(){
            if($_SESSION['id']==null){
                header('location: ../vistas/login.php');
            }
        }
    }
?>