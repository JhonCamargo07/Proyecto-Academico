<?php
    // Se incluyen los modelos de usuario y admin para utlizar las clases
    require_once('../modelos/cargo.php');
    require_once('../modelos/usuario.php');
    require_once('../modelos/adminAcademico.php');
    if($_POST){// Si envian el formulario  hace unas instanciaciones y crea una variables con los valores que vengan del formulario.

        $insertarCargo = new Cargo();
        $insertarUsuario = new Usuario();
        $insertarAdmin = new AdminAcademico();

        // Con la funcion ltrim y rtrim quitamos los posibles espacios que pueda tener cada dato al inicio y al final
        $nombre = ltrim(rtrim($_POST['nombres-admin']));
        $apellido = ltrim(rtrim($_POST['apellidos-admin']));
        $documento = ltrim(rtrim($_POST['documento-admin']));
        $cargo = ltrim(rtrim($_POST['cargo-admin']));
        $estado = ltrim(rtrim($_POST['estadoAdmin']));
        $sexo = ltrim(rtrim($_POST['sexoAdmin']));
        $usuario = ltrim(rtrim($_POST['usuario-admin']));
        $password = ltrim(rtrim($_POST['password-admin']));

        // Comprobamos que los datos que vengan del formulario no sean nullos, esto para hacer más segura la página y evitar errores
        if($nombre == null ||  $apellido == null || $documento == null || $cargo == null || $estado == null || $sexo == null || $usuario == null || $password == null){
            echo '<script>
                    alert("Debe completar todos los campos solicitados");
                </script>';
        }else{
            // Con el siguiente codigo buscamos obtener solo el primer nombre en caso de que lo haya para que concuerde con el campo de la tabla usuario
            if(strpos($nombre, " ")){ // Si en el string hay espacios entonces hace lo que este dentro del if
                $primerNombre = substr($nombre, 0, strpos($nombre, " ")); // Obtener el valor desde la posicion 0 hasta que haya un espacio
            }else{
                $primerNombre = $nombre; // Si no hay espacios en el string, guarda el mismo valor sin modificar nada
            }

            // Con el siguiente codigo buscamos obtener solo el primer apellido en caso de que lo haya para que concuerde con el campo de la tabla usuario
            if(strpos($apellido, " ")){
                $primerApellido = substr($apellido, 0, strpos($apellido, " "));
            }else{
                $primerApellido = $apellido;
            }

            // Con las instanciaciones que hicimos al comienzo, llamamos las funciones para agregar usuario, cargo y admin
            $insertarUsuario->CrearUsuario($usuario, $password, $primerNombre, $primerApellido, $sexo);

            $insertarCargo->CrearCargo($cargo);

            $insertarAdmin->CrearAdmin($nombre, $apellido, $documento, $estado);
        }
    }
?>