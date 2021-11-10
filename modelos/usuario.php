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
            $selectUser = $this->pdo->prepare("Call sp_select_any_usuario(:UserU)");
            $selectUser->bindParam(':UserU', $user);
            $selectUser->execute();
            if($selectUser->rowCount() == 1){
                echo "<script>alert('El nombre de usuario ya se encuentra en uso, por favor coloque otro diferente.');
                        location.href = '../admin/crear-usuario.php';
                    </script>";
                    // exit();
            }
            $selectUser = null;
        }

        // Metodo para crear usuario
        public function CrearUsuario($usuario, $passwordU, $nombre, $apellido, $sexo, $email, $rol, $estado){
            self::DetectarUsuario($usuario);
            $stm = $this->pdo->prepare("Call sp_insert_usuario(:usuario, :passwordU, :nombre, :apellido, :sexo, :email, :rol, :estado)");
            $stm->bindparam(":usuario", $usuario);
            $passwordEncript = password_hash($passwordU, PASSWORD_DEFAULT); // Encriptamos la contraseña que ingresa el usuario
            $stm->bindparam(":passwordU", $passwordEncript);
            $stm->bindparam(":nombre", $nombre);
            $stm->bindparam(":apellido", $apellido);
            $stm->bindparam(":sexo", $sexo);
            $stm->bindparam(":email", $email);
            $stm->bindparam(":rol", $rol);
            $stm->bindparam(":estado", $estado);
            if($stm->execute()){
                // No redirecionamos ya que lo haremos con la funcion de insertar un estudiante, profesor o admin.
            }else{
                echo "<script>
                        alert('Error al ingresar al usuario')
                        location.href = '../';
                    </script>";
            }
            $stm = null;
        }

        // Metodo para modificar usuario
        public function updateUsuario($usuario, $passwordU ,$nombre, $apellido, $sexo, $email, $rol, $estado, $id){
            $update = $this->pdo->prepare("Call sp_update_usuario(:usuario, :passwordU, :nombre, :apellido, :sexo, :email, :rol, :estado, :id)");
            $update->bindParam(':usuario', $usuario);
            $passwordEncript = password_hash($passwordU, PASSWORD_DEFAULT); // Encriptamos la contraseña que ingresa el usuario
            $update->bindParam(':passwordU', $passwordEncript);
            $update->bindParam(':nombre', $nombre);
            $update->bindParam(':apellido', $apellido);
            $update->bindParam(':sexo', $sexo);
            $update->bindParam(':email', $email);
            $update->bindParam(':rol', $rol);
            $update->bindParam(':estado', $estado);
            $update->bindParam(':id', $id);
            if($update->execute()){
                
            }else{
                echo "<script>
                        alert('Error al actualizar al usuario');
                    </script>";
            }
            $update = null;
        }
        
        // Metodo para consultar acceso
        public function consultaAcceso(){

        }

        public function consultarInactivacionUsuario($usuario){
            
        }

        public function inactivarUsuario($usuario){
            $valor = "inactivado";
            $selectUser = $this->pdo->prepare('Call sp_select_any_usuario(:usuario)');
            $selectUser->bindParam(':usuario', $usuario);
            $selectUser->execute();
            if($selectUser->rowCount() == 1){
                $resultado = $selectUser->fetch();
                if($resultado['EstadoUsuario'] == 2){
                    echo "<script>
                            alert('Este usuario ya se encuentra inactivo, será activado nuevamente');
                        </script>";
                    $valor = "activado";
                }
            }elseif($selectUser->rowCount() == 0){
                echo "<script>
                        alert('El usuario que desea inactivar no existe.');
                        location.href = \"../admin/inactivar-usuario.php\"; 
                    </script>";
            }
            $selectUser = null;

            $str = $this->pdo->prepare('Call sp_inactivar_usuario(:user)');
            $str->bindParam(':user', $usuario);
            if($str->execute()){
                echo "<script>
                        alert('Usuario " . $valor . " exitosamente');
                        location.href = \"../\"; 
                    </script>";
            }else{
                echo "<script>
                        alert('Error al inactivar el usuario');
                        location.href = \"<?php echo htmlspecialchars(_SERVER['PHP_SELF']); ?>\";
                    </script>";
            }
            $str = null;
        }

    }
?>