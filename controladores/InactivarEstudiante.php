<?php
    require_once('../modelos/estudiante.php');
    if($_POST){
        $insertar = new Estudiante();
        $documento = $_POST['documento-estudiante'];
        if($documento == null){
            echo '<script>
                    alert("Debe completar todos los campos solicitados");
                </script>';
        }else{
            $insertar->EliminarUsuario($documento);
        }
    }
?>