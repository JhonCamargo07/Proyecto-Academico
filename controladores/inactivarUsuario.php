<?php
    require_once('validacion.php');
    require_once('../../modelos/usuario.php');
    if($_POST){
        $insertar = new Usuario();
        $usuario = limpiarTexto($_POST['nombre-usuario']);
        if(campoNull($usuario)){
            echo '<script>
                    alert("Debe completar todos los campos solicitados");
                </script>';
        }else{
            $insertar->inactivarUsuario($usuario);
        }
    }
?>