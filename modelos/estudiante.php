<?php
    require_once('conexion.php');
    class Estudiante{
        // Atributos
        private $idEstudiante;
        private $nombreEstudiante;
        private $apellidoEstudiante;
        private $docEstudiante;
        private $estadoEstudiante;
        private $pdo;

        // Constructor
        public function __construct(){
            try {
                $this->pdo = Conexion::startUp();
            } catch (Exception $j) {
                echo "Error al conectarse con la base de datos.";
                die($j->getMessage());
            }
            $this->idEstudiante = null;
            $this->nombreEstudiante = "";
            $this->apellidoEstudiante = "";
            $this->docEstudiante = "";
            $this->estadoEstudiante = "";
        }

        // Metodo set para los atributos
        public function setAtributosEstudiante($atributo, $valor){
            $this->$atributo = $valor;
        }

        // Metodo get para los atributos
        public function getAtributosEstudiante($atributo){
            return $this->$atributo;
        }

        // Metodo para crear estudiante
        public function crearEstudiante($nombre, $apellido, $documento, $estado){
            $select = $this->pdo->prepare("SELECT * FROM Usuario ORDER BY IDUsuarioPK DESC LIMIT 1");

            if($select->execute()){
                $resultado = $select->fetch(); // Guardamos lo que venga en la consulta
                $IDusuarioFK = $resultado["IDUsuarioPK"]; // Guardamos el id del ultimo usuario insertado

                // Se prepara todo para insertar datos dentro de la tabla estudiante
                $stm = $this->pdo->prepare("INSERT INTO Estudiante values (null, :Nombre, :Apellido, :Documento, :Estado, $IDusuarioFK)");
                $stm->bindParam(':Nombre', $nombre);
                $stm->bindParam(':Apellido', $apellido);
                $stm->bindParam(':Documento', $documento);
                $stm->bindParam(':Estado', $estado);

                if($stm->execute()){
                    echo "<script>alert('Usuario registrado exitosamente');
                        location.href = \"../vistas/menu.php\"; 
                    </script>";
                    // header('location:../Vista/usuarios.php');
                }else{
                    echo "<script>
                            alert('Error al ingresar al usuario')
                            location.href = \"../vistas/crear-usuario.php\";
                        </script>";
                }
            }else{
                echo "<script>
                        alert('Error al ingresar al usuario')
                        location.href = \"../vistas/crear-usuario.php\";
                    </script>";
            }
        }

        // Metodo para modificar estudiante
        public function modificarEstudiante(){

        }
        
        // Metodo para consultar estudiante
        public function consultarEstudiante($documento){
            $str = $this->pdo->prepare("SELECT * FROM vista_informacion_estudiante WHERE N°_Documento = :documento");
            $str->bindParam(":documento", $documento);
            $str->execute();
            
            if($str->rowCount() >=1){
                $resultado = $str->fetch();
                $_SESSION['Curso']=$resultado["Curso"];
                return $resultado;
            }else{
                return false;
            }
        }

        public function EliminarUsuario($documento){
            $stm = $this->pdo->prepare("DELETE FROM Estudiante WHERE DocEstudiante = :documento");
            $stm->bindParam(":documento", $documento);
            if($stm->execute()){
                echo "<script>alert('Usuario eliminado exitosamente');
                        location.href = \"../vistas/menu.php\"; 
                    </script>";
                // header('location:../Vista/usuarios.php');
            }else{
                echo "<script>
                        alert('Error al ingresar al usuario');
                        location.href = \"../vistas/inactivar-usuario.php\";
                    </script>";
            }
        }
    }
?>