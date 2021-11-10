<?php
    require_once('usuario.php');
    require_once('conexion.php');
    class Estudiante extends Usuario{
        // Atributos
        public $idEstudiante;
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
        public function crearEstudiante($nombre, $apellido, $documento){
            $select = $this->pdo->prepare("Call sp_select_last_insert_usuario"); // Obtener los datos del ultimo usuario.

            if($select->execute()){
                $resultado = $select->fetch(); // Guardamos lo que venga en la consulta
                $IDusuarioFK = $resultado["IDUsuarioPK"]; // Guardamos el id del ultimo usuario insertado
                $select = null;

                // Se prepara todo para insertar datos dentro de la tabla estudiante
                $stm = $this->pdo->prepare("Call sp_insert_estudiante(:Nombre, :Apellido, :Documento, $IDusuarioFK)");
                $stm->bindParam(':Nombre', $nombre);
                $stm->bindParam(':Apellido', $apellido);
                $stm->bindParam(':Documento', $documento);

                if($stm->execute()){
                    echo "<script>alert('Usuario registrado exitosamente');
                        location.href = '../'; 
                    </script>";
                    // header('location:../Vista/usuarios.php');
                }else{
                    echo "<script>
                            alert('Error al ingresar al usuario')
                            // location.href = 'crear-usuario.php';
                        </script>";
                }
                $stm = null;
            }else{
                echo "<script>
                        alert('Error al ingresar al usuario')
                        location.href = '../vistas/crear-usuario.php';
                    </script>";
            }
        }

        // Metodo para modificar estudiante
        public function updateEstudiante($nombre, $apellido, $documento, $id){
            $update = $this->pdo->prepare('Call sp_update_estudiante(:nombre, :apellido, :documento, :id)');
            $update->bindParam(':nombre', $nombre);
            $update->bindParam(':apellido', $apellido);
            $update->bindParam(':documento', $documento);
            $update->bindParam(':id', $id);
            if($update->execute()){
                echo "<script>alert('Estudiante actualizado exitosamente');
                    location.href = \"../\"; 
                </script>";
            }else{
                echo "<script>
                        alert('Error al actualizar el estudiante');
                    </script>";
            }
            $update = null;
        }
        
        // Metodo para consultar los datos de un estudiante
        public function consultarDatosEstudiante($documento){
            $str = $this->pdo->prepare("SELECT * FROM vista_informacion_estudiante WHERE N°_Documento = :documento");
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

        // Metodo para consultar los datos de un estudiante
        public function consultarEstudiante($documento){
            $str = $this->pdo->prepare("Call sp_select_estudiante_usuario(:documento)");
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
            $stm = $this->pdo->prepare("SELECT * FROM Usuario inner join Estudiante on IDUsuarioFK = IDUsuarioPK where IDUsuarioPK = :id limit 1");
            $stm->bindParam(':id', $id);
            $stm->execute();
            while($result = $stm->fetch()){
                $rows[] = $result;
            }
            return $rows;
        }

        public function EliminarEstudiante($documento){
            $stm = $this->pdo->prepare("DELETE FROM Estudiante WHERE DocEstudiante = :documento");
            $stm->bindParam(":documento", $documento);
            if($stm->execute()){
                echo "<script>alert('Usuario eliminado exitosamente');
                        location.href = \"../vistas/\"; 
                    </script>";
                // header('location:../Vista/usuarios.php');
            }else{
                echo "<script>
                        alert('Error al ingresar al usuario');
                        location.href = \"../vistas/inactivar-usuario.php\";
                    </script>";
            }
            $stm = null;
        }
    }
?>