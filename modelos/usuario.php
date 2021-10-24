<?php
    require_once('Conexion.php');
    class Usuario{
        // Atributos
        protected $idUsuario;
        protected $user;
        protected $password;
        private $pdo;

        public function __construct(){
            try {
                $this->pdo = Conexion::startUp();
            } catch (Exception $j) {
                echo "Error al conectarse con la base de datos.";
                die($j->getMessage());
            }
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

        // Funcion para detectar si el nombre de usuario ya esta en uso, esto para evitar inconvenientes en el login, ya que en la base de datos el dato usuario debe ser unico
        private function DetectarUsuario($user){
            // Selecionamos todos los datos de la tabla para luego comprobar si el usuario que ingresen ya existe
            $selectUser = $this->pdo->prepare("SELECT * FROM Usuario WHERE Usuario = :UserU");
            $selectUser->bindParam(':UserU', $user);
            $selectUser->execute();
            if($selectUser->rowCount() == 1){
                echo "<script>alert('El nombre de usuario ya se encuentra en uso, por favor coloque otro diferente.');
                        location.href = \"../vistas/crear-usuario.php\"; 
                    </script>";
                    exit();
            }
        }

        // Metodo para crear usuario
        public function CrearUsuario($usuario, $passwordU, $nombre, $apellido, $sexo){
            self::DetectarUsuario($usuario);
            $stm = $this->pdo->prepare("INSERT INTO Usuario VALUES (null, :usuario, :passwordU, :nombre, :apellido, :sexo)");
            $stm->bindparam(":usuario", $usuario);
            $passwordEncript = password_hash($passwordU, PASSWORD_DEFAULT); // Encriptamos la contraseña que ingresa el usuario
            $stm->bindparam(":passwordU", $passwordEncript);
            $stm->bindparam(":nombre", $nombre);
            $stm->bindparam(":apellido", $apellido);
            $stm->bindparam(":sexo", $sexo);
            if($stm->execute()){
                // No redirecionamos ya que lo haremos con la funcion de insertar un estudiante, profesor o admin.
            }else{
                echo "<script>
                        alert('Error al ingresar al usuario')
                        location.href = \"../vistas/crear-usuario.php\";
                    </script>";
                    exit();
            }
        }

        // Metodo para modificar usuario
        public function modificarUsuario(){

        }
        
        // Metodo para consultar acceso
        public function consultaAcceso(){

        }

    }
?>