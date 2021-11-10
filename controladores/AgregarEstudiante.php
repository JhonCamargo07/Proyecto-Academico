<?php
    // Se incluyen los modelos de estudiante y usuario para utlizar las clases
    require_once('validacion.php');
    require_once('../../modelos/usuario.php');
    require_once('../../modelos/estudiante.php');
    if(isset($_POST['registrar-estudiante'])){// Si envian el formulario  hace unas instanciaciones y crea una variables con los valores que vengan del formulario.

        $insertarUsuario = new Usuario();
        $insertarEstudiante = new Estudiante();

        // Con la funcion ltrim y rtrim quitamos los posibles espacios que pueda tener cada dato al inicio y al final.
        // Con la función 'limpiarTexto' eliminamos caracteres que puedan ser maliciosos para la bd o el codigo.
        $nombreE = limpiarTexto($_POST['nombres-estudiante']);
        $apellidoE = limpiarTexto($_POST['apellidos-estudiante']);
        $documentoE = limpiarTexto($_POST['documento-estudiante']);
        $correoE = limpiarTexto($_POST['correo-estudiante']);
        $estadoE = limpiarTexto($_POST['estadoEstudiante']);
        $sexoE = limpiarTexto($_POST['sexoEstudiante']);
        $rolE = limpiarTexto($_POST['rol-estudiante']);
        $usuarioE = limpiarTexto($_POST['usuario-estudiante']);
        $passwordE = limpiarTexto($_POST['password-estudiante']);

        // Comprobamos que los datos que vengan del formulario no sean nullos, esto para hacer más segura la página y evitar errores
        if(campoNull($nombreE)||  campoNull($apellidoE) || campoNull($documentoE) || campoNull($correoE) || campoNull($estadoE) || campoNull($sexoE) || campoNull($rolE) || campoNull($usuarioE) || campoNull($passwordE)){
            echo '<script>
                    alert("Debe completar todos los campos solicitados");
                    // location.href = "../vistas/crear-usuario.php";
                </script>';
        }elseif(!verificarEmail($correoE)){ // Con la función 'verificarEmail' comprovamos si lo ingresado es un correo o no.
            echo '<script>
                    alert("Por favor ingrese un correo valido");
                    // location.href = "../vistas/crear-usuario.php";
                </script>';
        }else{
            // Con el siguiente codigo buscamos obtener solo el primer nombre en caso de que lo haya para que concuerde con el campo de la tabla usuario
            if(strpos($nombreE, " ")){ // Si en el string hay espacios entonces hace lo que este dentro del if
                $primerNombre = substr($nombreE, 0, strpos($nombreE, " ")); // Obtener el valor desde la posicion 0 hasta que haya un espacio
            }else{
                $primerNombre = $nombreE; // Si no hay espacios en el string, guarda el mismo valor sin modificar nada
            }

            // Con el siguiente codigo buscamos obtener solo el primer apellido en caso de que lo haya para que concuerde con el campo de la tabla usuario
            if(strpos($apellidoE, " ")){
                $primerApellido = substr($apellidoE, 0, strpos($apellidoE, " "));
            }else{
                $primerApellido = $apellidoE;
            }

            // Con las instanciaciones que hicimos al comienzo, llamamos las funciones para agregar usuario y estudiante
            $insertarUsuario->CrearUsuario($usuarioE, $passwordE, $primerNombre, $primerApellido, $sexoE, $correoE, $rolE, $estadoE);

            $insertarEstudiante->CrearEstudiante($nombreE, $apellidoE, $documentoE);
        }
    }
?>