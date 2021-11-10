<?php
    // Se incluyen los modelos de usuario y admin para utlizar las clases
    require_once('validacion.php');
    require_once('../../modelos/cargo.php');
    require_once('../../modelos/usuario.php');
    require_once('../../modelos/adminAcademico.php');
    if(isset($_POST['registrar-admin'])){// Si envian el formulario  hace unas instanciaciones y crea una variables con los valores que vengan del formulario.

        $insertarCargo = new Cargo();
        $insertarUsuario = new Usuario();
        $insertarAdmin = new AdminAcademico();

        // Con la funcion 'limpiarTexto', quitamos los caracteres restingidos y los posibles espacios que pueda haber al inicio y al final de la cadena.
        $nombreA = limpiarTexto($_POST['nombres-admin']);
        $apellidoA = limpiarTexto($_POST['apellidos-admin']);
        $documentoA = limpiarTexto($_POST['documento-admin']);
        $correoA = limpiarTexto($_POST['correo-admin']);
        $cargoA = limpiarTexto($_POST['cargo-admin']);
        $estadoA = limpiarTexto($_POST['estadoAdmin']);
        $sexoA = limpiarTexto($_POST['sexoAdmin']);
        $rolA = limpiarTexto($_POST['rol-admin']);
        $usuarioA = limpiarTexto($_POST['usuario-admin']);
        $passwordA = limpiarTexto($_POST['password-admin']);

        // Comprobamos que los datos que vengan del formulario no sean nullos, esto para hacer más segura la página y evitar errores
        if(campoNull($nombreA) || campoNull($apellidoA) || campoNull($documentoA) || campoNull($correoA) || campoNull($cargoA) || campoNull($estadoA) || campoNull($sexoA) || campoNull($rolA) || campoNull($usuarioA) || campoNull($passwordA)){
            echo '<script>
                    alert("Debe completar todos los campos solicitados");
                </script>';
        }elseif(!verificarEmail($correoA)){ // Con la función 'verificarEmail' comprovamos si lo ingresado es un correo o no.
            echo '<script>
                    alert("Por favor ingrese un correo valido");
                    // location.href = "../vistas/admin/crear-usuario.php";
                </script>';
        }else{
            // Con el siguiente codigo buscamos obtener solo el primer nombre en caso de que lo haya para que concuerde con el campo de la tabla usuario
            if(strpos($nombreA, " ")){ // Si en el string hay espacios entonces hace lo que este dentro del if
                $primerNombre = substr($nombreA, 0, strpos($nombreA, " ")); // Obtener el valor desde la posicion 0 hasta que haya un espacio
            }else{
                $primerNombre = $nombreA; // Si no hay espacios en el string, guarda el mismo valor sin modificar nada
            }

            // Con el siguiente codigo buscamos obtener solo el primer apellido en caso de que lo haya para que concuerde con el campo de la tabla usuario
            if(strpos($apellidoA, " ")){
                $primerApellido = substr($apellidoA, 0, strpos($apellidoA, " "));
            }else{
                $primerApellido = $apellidoA;
            }

            // Con las instanciaciones que hicimos al comienzo, llamamos las funciones para agregar usuario, cargo y admin
            $insertarUsuario->CrearUsuario($usuarioA, $passwordA, $primerNombre, $primerApellido, $sexoA, $correoA, $rolA, $estadoA);

            $insertarCargo->CrearCargo($cargoA);

            $insertarAdmin->CrearAdmin($nombreA, $apellidoA, $documentoA);
        }
    }
?>