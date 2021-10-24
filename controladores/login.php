<!-- <script src="../vistas/js/alertas.js"></script> -->
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
    if($_POST){ // Si envian el formulario, crea unas variables
        // Con la funcion ltrim y rtrim quitamos los posibles espacios que pueda tener cada dato al inicio y al final
        $usuario = ltrim(rtrim($_POST['usuario']));
        $password = ltrim(rtrim($_POST['password']));

        if($usuario == null || $password == null){
            echo '<script language="javascript">
                    alertaError();
                </script>';
        }else{
            // Variable para recibir lo que devuelva la funcion login del modelo
            $modelo = new Login();
            $entrada = $modelo->login($usuario, $password);
            // Si lo que devuelve la función es false, lo redireciona a login
            if($entrada == false){
                echo '<script>
                        alertaError();
                    </script>';
            }else{
                // Si lo que devuelve la funcion es true, lo deja ingresar al menu
                header('Location: ../vistas/menu.php');
            }
        }
    }
?>
