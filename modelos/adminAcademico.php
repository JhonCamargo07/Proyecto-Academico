<?php
    require_once('usuario.php');
    require_once('conexion.php');
    class AdminAcademico extends Usuario{
        // Atributos
        private $idAdmin;
        private $nombreAdmin;
        private $apellidoAdmin;
        private $docAdmin;
        private $especialidadAdmin;
        private $estadoAdmin;
        private $pdo;

        // Constructor
        public function __construct(){
            try {
                $this->pdo = Conexion::startUp();
            } catch (Exception $j) {
                echo "Error al conectarse con la base de datos.";
                die($j->getMessage());
            }
            $this->idAdmin = null;
            $this->nombreAdmin = "";
            $this->apellidoAdmin = "";
            $this->docAdmin = "";
            $this->estadoAdmin = "";
        }

        // Metodo set para los atributos
        public function setAtributosAdmin($atributo, $valor){
            $this->$atributo = $valor;
        }

        // Metodo get para los atributos
        public function getAtributosAdmin($atributo){
            return $this->$atributo;
        }

        public function crearAdmin($nombre, $apellido, $documento){
            $selectCargo = $this->pdo->prepare("Call sp_select_last_insert_curso"); // Obtener los datos del ultimo cargo.

            // Si logra ejecutar la consulta anterior, hace lo siguiente.
            if($selectCargo->execute()){
                $resultadoCargo = $selectCargo->fetch(); // Guardamos lo que venga en la consulta de cargo.
                $IDcargoFK = $resultadoCargo["IDCargoPK"]; // Guardamos el id del último cargo insertado.
                $selectCargo = null;

                $selectUsuario = $this->pdo->prepare("Call sp_select_last_insert_usuario"); // Obtener los datos del ultimo usuario.
                if($selectUsuario->execute()){
                    $resultadoUsuario = $selectUsuario->fetch(); // Guardamos lo que venga en la consulta de usuario.
                    $IDusuarioFK = $resultadoUsuario["IDUsuarioPK"]; // Guardamos el id del ultimo usuario insertado.
                    $selectUsuario = null;
    
                    // Se prepara todo para insertar datos en la tabla admin
                    $stm = $this->pdo->prepare("Call sp_insert_admin(:Nombre, :Apellido, :Documento, $IDcargoFK, $IDusuarioFK)");
                    $stm->bindParam(':Nombre', $nombre);
                    $stm->bindParam(':Apellido', $apellido);
                    $stm->bindParam(':Documento', $documento);
                    
                    if($stm->execute()){
                        echo "<script>alert('Administrador registrado exitosamente');
                            location.href = \"../\"; 
                        </script>";
                        // header('location:../Vista/usuarios.php');
                    }else{
                        echo "<script>
                                alert('Error al ingresar al Administrador, intente nuevamente.')
                                // location.href = \"../\";
                            </script>";
                    }
                    $stm = null;
                }else{
                    echo "<script>
                            alert('Error al ingresar al Administrador, intente nuevamente.')
                            // location.href = \"../vistas/crear-usuario.php\";
                        </script>";
                }
            }else{
                echo "<script>
                        alert('Error al ingresar al Administrador, intente nuevamente.')
                        // location.href = \"../vistas/crear-usuario.php\";
                    </script>";
            }
        }

        // Metodo para modificar estudiante
        public function updateAdmin($nombre, $apellido, $documento, $id){
            $update = $this->pdo->prepare('Call sp_update_admin(:nombre, :apellido, :documento, :id)');
            $update->bindParam(':nombre', $nombre);
            $update->bindParam(':apellido', $apellido);
            $update->bindParam(':documento', $documento);
            $update->bindParam(':id', $id);
            if($update->execute()){
                echo "<script>alert('Administrador actualizado exitosamente');
                    location.href = \"../\"; 
                </script>";
            }else{
                echo "<script>
                        alert('Error al actualizar el administrador');
                    </script>";
            }
            $update = null;
        }

        // Metodo para consultar admin
        public function consultarAdminAcademico($documento){
            $str = $this->pdo->prepare("Call sp_select_admin(:documento)");
            $str->bindParam(":documento", $documento);
            $str->execute();
            
            if($str->rowCount() >=1){
                $resultado = $str->fetch();
                return $resultado;
            }else{
                return false;
            }
            $str = null;
        }
    }
?>