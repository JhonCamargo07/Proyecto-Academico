<?php
    require_once('usuario.php');
    require_once('conexion.php');
    class Profesor extends usuario{
        // Atributos
        private $idProfesor;
        private $nombreProfesor;
        private $apellidoProfesor;
        private $docProfesor;
        private $especialidadProfesor;
        private $estadoProfesor;
        private $pdo;

        // Constructor
        public function __construct(){
            try {
                $this->pdo = Conexion::startUp();
            } catch (Exception $j) {
                echo "Error al conectarse con la base de datos.";
                die($j->getMessage());
            }
            $this->idProfesor = null;
            $this->nombreProfesor = "";
            $this->apellidoProfesor = "";
            $this->docProfesor = "";
            $this->estadoProfesor = "";
        }

        // Metodo set para los atributos
        public function setAtributosProfesor($atributo, $valor){
            $this->$atributo = $valor;
        }

        // Metodo get para los atributos
        public function getAtributosProfesor($atributo){
            return $this->$atributo;
        }

        public function crearProfesor($nombre, $apellido, $documento, $estado, $especialidad){
            $select = $this->pdo->prepare("SELECT * FROM Usuario ORDER BY IDUsuarioPK DESC LIMIT 1");
            if($select->execute()){
                $resultado = $select->fetch(); // Guardamos lo que venga en la consulta
                $IDusuarioFK = $resultado["IDUsuarioPK"]; // Guardamos el id del ultimo usuario insertado

                // Se prepara todo para insertar datos dentro de la tabla profesor
                $stm = $this->pdo->prepare("INSERT INTO Profesor values (null, :Nombre, :Apellido, :Documento, :Estado, :Especialidad, $IDusuarioFK)");
                $stm->bindParam(':Nombre', $nombre);
                $stm->bindParam(':Apellido', $apellido);
                $stm->bindParam(':Documento', $documento);
                $stm->bindParam(':Estado', $estado);
                $stm->bindParam(':Especialidad', $especialidad);

                if($stm->execute()){
                    echo "<script>alert('Profesor registrado exitosamente');
                        location.href = \"../vistas/menu.php\"; 
                    </script>";
                    // header('location:../Vista/usuarios.php');
                }else{
                    echo "<script>
                            alert('Error al ingresar al profesor, intente nuevamente.')
                            location.href = \"../vistas/crear-usuario.php\";
                        </script>";
                }
            }else{
                echo "<script>
                        alert('Error al ingresar al profesor, intente nuevamente.')
                        location.href = \"../vistas/crear-usuario.php\";
                    </script>";
            }
        }
    }
?>