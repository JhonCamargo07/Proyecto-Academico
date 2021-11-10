<?php
    require_once('conexion.php');
    class Cargo{
        private $pdo;

        public function __construct(){
            try {
                $this->pdo = Conexion::startUp();
            } catch (Exception $j) {
                echo "Error al conectarse con la base de datos.";
                die($j->getMessage());
            }
        }

        public function CrearCargo($cargo){
            $stm = $this->pdo->prepare("Call sp_insert_cargo(:Cargo)");
            $stm->bindParam(':Cargo', $cargo);
            if($stm->execute()){
                // No redirecionamos ya que lo haremos con la funcion de insertar un admin
            }else{
                echo "<script>
                        alert('Error al ingresar el cargo')
                        location.href = \"../vistas/crear-usuario.php\";
                    </script>";
            }
        }

        // Metodo para modificar estudiante
        public function updateCargo($nombre, $id){
            $update = $this->pdo->prepare('Call sp_update_cargo(:nombre, :id)');
            $update->bindParam(':nombre', $nombre);
            $update->bindParam(':id', $id);
            if($update->execute()){
            }else{
                echo "<script>
                        alert('Error al actualizar el cargo...');
                    </script>";
            }
            $update = null;
        }
    }
?>