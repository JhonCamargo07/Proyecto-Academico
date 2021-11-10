<?php
    require_once('validacion.php');
    // Se incluyen los modelos de estudiante y usuario para utlizar las clases
    require_once('../../modelos/usuario.php');
    require_once('../../modelos/profesor.php');
    if(isset($_POST['registrar-profesor'])){// Si envian el formulario  hace unas instanciaciones y crea una variables con los valores que vengan del formulario.

        $insertarUsuario = new Usuario();
        $insertarProfesor= new Profesor();

        // Con la funcion ltrim y rtrim quitamos los posibles espacios que pueda tener cada dato al inicio y al final
        $nombreP = limpiarTexto($_POST['nombres-profesor']);
        $apellidoP = limpiarTexto($_POST['apellidos-profesor']);
        $documentoP = limpiarTexto($_POST['documento-profesor']);
        $especialidadP = limpiarTexto($_POST['especialidad-profesor']);
        $correoP = limpiarTexto($_POST['correo-profesor']);
        $estadoP = limpiarTexto($_POST['estadoProfesor']);
        $sexoP = limpiarTexto($_POST['sexoProfesor']);
        $rolP = limpiarTexto($_POST['rol-profesor']);
        $usuarioP = limpiarTexto($_POST['usuario-profesor']);
        $passwordP = limpiarTexto($_POST['password-profesor']);

        // Comprobamos que los datos que vengan del formulario no sean nullos, esto para hacer más segura la página y evitar errores
        if( campoNull($nombreP) ||  campoNull($apellidoP) || campoNull($documentoP) || campoNull($especialidadP) || campoNull($estadoP) || campoNull($sexoP) || campoNull($rolP) || campoNull($usuarioP) || campoNull($passwordP)){
            echo '<script>
                    alert("Debe completar todos los campos solicitados");
                </script>';
        }elseif(!verificarEmail($correoP)){ // Con la función 'verificarEmail' comprovamos si lo ingresado es un correo o no.
            echo '<script>
                    alert("Por favor ingrese un correo valido");
                    // location.href = "../vistas/admin/crear-usuario.php";
                </script>';
        }else{
            // Con el siguiente codigo buscamos obtener solo el primer nombre en caso de que lo haya para que concuerde con el campo de la tabla usuario
            if(strpos($nombreP, " ")){ // Si en el string hay espacios entonces hace lo que este dentro del if
                $primerNombre = substr($nombreP, 0, strpos($nombreP, " ")); // Obtener el valor desde la posicion 0 hasta que haya un espacio
            }else{
                $primerNombre = $nombreP; // Si no hay espacios en el string, guarda el mismo valor sin modificar nada
            }

            // Con el siguiente codigo buscamos obtener solo el primer apellido en caso de que lo haya para que concuerde con el campo de la tabla usuario
            if(strpos($apellidoP, " ")){
                $primerApellido = substr($apellidoP, 0, strpos($apellidoP, " "));
            }else{
                $primerApellido = $apellidoP;
            }

            // Con las instanciaciones que hicimos al comienzo, llamamos las funciones para agregar usuario y estudiante
            $insertarUsuario->CrearUsuario($usuarioP, $passwordP, $primerNombre, $primerApellido, $sexoP, $correoP, $rolP, $estadoP);

            $insertarProfesor->CrearProfesor($nombreP, $apellidoP, $documentoP, $especialidadP);
        }
    }
?>