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
            $stm = $this->pdo->prepare("INSERT INTO Cargo VALUES (NULL, :Cargo)");
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
    }
?>