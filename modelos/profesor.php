<?php
    require_once('usuario.php');
    require_once('conexion.php');
    class Profesor extends Usuario{
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

        public function crearProfesor($nombre, $apellido, $documento, $especialidad){
            $select = $this->pdo->prepare("Call sp_select_last_insert_usuario"); // Obtener los datos del ultimo usuario.
            if($select->execute()){
                $resultado = $select->fetch(); // Guardamos lo que venga en la consulta
                $IDusuarioFK = $resultado["IDUsuarioPK"]; // Guardamos el id del ultimo usuario insertado
                $select = null;

                // Se prepara todo para insertar datos dentro de la tabla profesor
                $stm = $this->pdo->prepare("Call sp_insert_profesor(:Nombre, :Apellido, :Documento, :Especialidad, $IDusuarioFK)");
                $stm->bindParam(':Nombre', $nombre);
                $stm->bindParam(':Apellido', $apellido);
                $stm->bindParam(':Documento', $documento);
                $stm->bindParam(':Especialidad', $especialidad);

                if($stm->execute()){
                    echo "<script>alert('Profesor registrado exitosamente');
                        location.href = \"../\"; 
                    </script>";
                    // header('location:../Vista/usuarios.php');
                }else{
                    echo "<script>
                            alert('Error al ingresar al profesor, intente nuevamente.')
                            // location.href = \"crear-usuario.php\";
                        </script>";
                }
                $stm = null;
            }else{
                echo "<script>
                        alert('Error al ingresar al profesor, intente nuevamente.')
                        // location.href = \"crear-usuario.php\";
                    </script>";
            }
        }

        // Metodo para modificar estudiante
        public function updateProfesor($nombre, $apellido, $documento, $especialidad, $id){
            $update = $this->pdo->prepare('Call sp_update_profesor(:nombre, :apellido, :documento, :especialidad, :id)');
            $update->bindParam(':nombre', $nombre);
            $update->bindParam(':apellido', $apellido);
            $update->bindParam(':documento', $documento);
            $update->bindParam(':especialidad', $especialidad);
            $update->bindParam(':id', $id);
            if($update->execute()){
                echo "<script>alert('Profesor actualizado exitosamente');
                    location.href = \"../\"; 
                </script>";
            }else{
                echo "<script>
                        alert('Error al actualizar al profesor');
                    </script>";
            }
            $update = null;
        }

        // Metodo para consultar profesor
        public function consultarProfesor($documento){
            $str = $this->pdo->prepare("SELECT * FROM Profesor inner join Usuario on IDUsuarioPK = IDUsuarioFK WHERE DocProfesor = :documento");
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

        public function Obtener($id){
            $rows = null;
            $stm = $this->pdo->prepare("SELECT * FROM Usuario inner join Profesor on IDUsuarioFK = IDUsuarioPK where IDUsuarioPK = :id limit 1");
            $stm->bindParam(':id', $id);
            $stm->execute();
            while($result = $stm->fetch()){
                $rows[] = $result;
            }
            return $rows;
        }

    }
?>