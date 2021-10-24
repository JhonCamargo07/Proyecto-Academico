<?php
    // Se incluyen los modelos de estudiante y usuario para utlizar las clases
    require_once('../modelos/usuario.php');
    require_once('../modelos/profesor.php');
    if($_POST){// Si envian el formulario  hace unas instanciaciones y crea una variables con los valores que vengan del formulario.

        $insertarUsuario = new Usuario();
        $insertarProfesor= new Profesor();

        // Con la funcion ltrim y rtrim quitamos los posibles espacios que pueda tener cada dato al inicio y al final
        $nombre = ltrim(rtrim($_POST['nombres-profesor']));
        $apellido = ltrim(rtrim($_POST['apellidos-profesor']));
        $documento = ltrim(rtrim($_POST['documento-profesor']));
        $especialidad = ltrim(rtrim($_POST['especialidad-profesor']));
        $estado = ltrim(rtrim($_POST['estadoProfesor']));
        $sexo = ltrim(rtrim($_POST['sexoProfesor']));
        $usuario = ltrim(rtrim($_POST['usuario-profesor']));
        $password = ltrim(rtrim($_POST['password-profesor']));

        // Comprobamos que los datos que vengan del formulario no sean nullos, esto para hacer más segura la página y evitar errores
        if($nombre == null ||  $apellido == null || $documento == null || $especialidad == null || $estado == null || $sexo == null || $usuario == null || $password == null){
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

            // Con las instanciaciones que hicimos al comienzo, llamamos las funciones para agregar usuario y estudiante
            $insertarUsuario->CrearUsuario($usuario, $password, $primerNombre, $primerApellido, $sexo);

            $insertarProfesor->CrearProfesor($nombre, $apellido, $documento, $estado, $especialidad);
        }
    }
?>