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
            $str = $this->pdo->prepare("Call sp_select_usuario_login(:UserU)");
            $str->bindParam(':UserU', $usuario);
            // $str->bindParam(':PasswordU', $password);
            $str->execute();
            if($str->rowCount() == 1){
                $resultado = $str->fetch();
                // Se hace la comprobacion si la contraseña que el usuario ingresa (sin encriptar) es igual a la que esta en la base de datos (con encriptación), esto utlizando la funcion password_verify
                if(password_verify($password, $resultado['PasswordU'])){
                    // Guardar algunos datos dentro de la sesión
                    $_SESSION['Nombre'] = $resultado["NombreUsuario"] . " " . $resultado['ApellidoUsuario'];
                    $_SESSION['Sexo'] = $resultado['SexoUsuario'];
                    $_SESSION['id'] = $resultado['IDUsuarioPK'];
                    $_SESSION['Tipo_User'] = $resultado['Rol'];
                    $_SESSION['Estado'] = $resultado['EstadoUsuario'];
                    return $_SESSION['id'];
                }else{
                    return false;
                }
            }else{
                return false;
            }
            $str = null;
        }

        public function validarSesion(){
            if($_SESSION['id'] == null){
                header('location: ../vistas/login.php');
            }
        }

        public function validarEstado(){
            if($_SESSION['Estado'] == 2){
                    session_destroy();
                    return true;
            }else{
                return false;
            }
        }

        public function validarSexo(){
            if($_SESSION['Sexo'] == 1){
                $mensaje = "Bienvenido " . $_SESSION['Nombre'];
                return $mensaje;
            }elseif($_SESSION['Sexo'] == 2){
                $mensaje = "Bienvenida " . $_SESSION['Nombre'];
                return $mensaje;    
            }else{
                $mensaje = "Bienvenid@ " . $_SESSION['Nombre'];
                return $mensaje;
            }
        }

        public function validarRol(){
            if(isset($_SESSION['Tipo_User'])){
                if($_SESSION['Tipo_User'] == 1){
                    $rolActual = "administrador";
                    return $rolActual;
                }elseif($_SESSION['Tipo_User'] == 2){
                    $rolActual = "profesor";
                    return $rolActual;
                }elseif($_SESSION['Tipo_User'] == 3){
                    $rolActual = "estudiante";
                    return $rolActual;
                }
            }else{
                header('location: ../vistas/login.php');
            }
        }

        public function validarRolAdmin(){
            if(isset($_SESSION['Tipo_User'])){
                if($_SESSION['Tipo_User'] != 1){
                    header('location: ../../vistas/');
                }
            }else{
                header('location: ../login.php');
            }
        }

        public function validarRolProfesor(){
            if(isset($_SESSION['Tipo_User'])){
                if($_SESSION['Tipo_User'] != 2){
                    header('location: ../../vistas/');
                }
            }else{
                header('location: ../login.php');
            }
        }

        public function validarRolEstudiante(){
            if(isset($_SESSION['Tipo_User'])){
                if($_SESSION['Tipo_User'] != 3){
                    header('location: ../../vistas/');
                }
            }else{
                header('location: ../login.php');
            }
        }

        public function GetIdUsuario(){
            return $_SESSION['id'];
        }

    }
?>