<script>
    var alertaError = () => {
        swal.fire({
            title: "Error en los datos",
            text:"Verifiquelos e intente nuevamente",
            confirmButtonText: 'Ok, entendí',
            confirmButtonColor: '#0EA3E3',
            imageUrl: '../vistas/imagenes/error.gif',
            imageWidth: 135,
            imageHeight: 135,
            timer: 5090,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            },
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
                },
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            stopKeydownPropagation: false,
        });
    }
</script>

<?php
    require_once('../modelos/login.php');
    require_once('validacion.php');
    if($_POST){ // Si envian el formulario, crea unas variables.
        // Con la funcion ltrim y rtrim quitamos los posibles espacios que pueda tener cada dato al inicio y al final.
        $usuario = limpiarTexto($_POST['usuario']);
        $password = limpiarTexto($_POST['password']);

        // La función 'campoNull' verifica si el campo que se le pasa está vacío o no.
        if(campoNull($usuario) || campoNull($password)){
            echo '<script language="javascript">
                    alertaError();
                </script>';
        }elseif(numCharacters($usuario, 3, 30) || numCharacters($password, 5, 30)){
            // La función 'NumCharacters' verifica si la cantidad de caracteres de un elemento está entre el rango que se le pase.
            echo "<script>
                    alert('Error en la cantidad de caracteres. En el usuario el número de caracteres minimo es de 3, en la contraseña es 5 y el máximo para ambos es de 30 caracteres.');
                </script>";
        }else{
            // Variable para recibir lo que devuelva la funcion login del modelo.
            $modelo = new Login();
            // La función 'limpiarTexto' elimina caracteres no permitidos como <>'\...
            $entrada = $modelo->login($usuario, $password);
            // Si lo que devuelve la función es false, lo redireciona a login.
            if($entrada == false){
                echo '<script>
                        alertaError();
                    </script>';
            }else{
                if($modelo->validarEstado()){
                    echo "<script>
                            alert('Usuario inactivo, no puede ingresar porque su usuario se encuentra inactivo. Si considera que es un error, comuniquese con el administrador para que le de una solución.');
                        </script>";
                }else{
                    // Si lo que devuelve la funcion es true, lo deja ingresar al menu.
                    header('Location: ../vistas/');
                }
            }
        }
    }
?>
