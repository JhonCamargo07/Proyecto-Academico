<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vistas//css/todos/index.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <title></title>

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
            }).then((result)=>{
                if(result.isConfirmed){
                    location.href ="../vistas/login.php";
                }
            });
            // Redirecionar al login
            setInterval( ()=>{
                location.href ="../vistas/login.php";
            }, 5100);
        }
    </script>

</head>
<body>
    <?php
        require_once('../modelos/login.php');
        if($_POST){
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];

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
</body>
</html>