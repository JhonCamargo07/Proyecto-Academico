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

        public function crearAdmin($nombre, $apellido, $documento, $estado){
            $selectCargo = $this->pdo->prepare("SELECT * FROM Cargo ORDER BY IDCargoPK DESC LIMIT 1");

            $selectUsuario = $this->pdo->prepare("SELECT * FROM Usuario ORDER BY IDUsuarioPK DESC LIMIT 1");

            // Si logra ejecutar las dos consultas anteriores, inserta los datos en la tabla admin
            if($selectUsuario->execute() && $selectCargo->execute()){
                $resultadoCargo = $selectCargo->fetch(); // Guardamos lo que venga en la consulta de cargo
                $IDcargoFK = $resultadoCargo["IDCargoPK"]; // Guardamos el id del último cargo insertado

                $resultadoUsuario = $selectUsuario->fetch(); // Guardamos lo que venga en la consulta de usuario
                $IDusuarioFK = $resultadoUsuario["IDUsuarioPK"]; // Guardamos el id del ultimo usuario insertado

                // Se prepara todo para insertar datos en la tabla admin
                $stm = $this->pdo->prepare("INSERT INTO AdminAcademico values (null, :Nombre, :Apellido, :Documento, :Estado, $IDcargoFK, $IDusuarioFK)");
                $stm->bindParam(':Nombre', $nombre);
                $stm->bindParam(':Apellido', $apellido);
                $stm->bindParam(':Documento', $documento);
                $stm->bindParam(':Estado', $estado);
                
                if($stm->execute()){
                    echo "<script>alert('Administrador registrado exitosamente');
                        location.href = \"../vistas/menu.php\"; 
                    </script>";
                    // header('location:../Vista/usuarios.php');
                }else{
                    echo "<script>
                            alert('Error al ingresar al Administrador, intente nuevamente.')
                            location.href = \"../vistas/crear-usuario.php\";
                        </script>";
                }
            }else{
                echo "<script>
                        alert('Error al ingresar al Administrador, intente nuevamente.')
                        location.href = \"../vistas/crear-usuario.php\";
                    </script>";
            }
        }
    }
?>