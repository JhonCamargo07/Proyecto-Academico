<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vistas/css/todos/index.css">
    <title></title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="../vistas/js/alertas.js"></script>
</head>
<body>
<?php
    if($_POST){ // Si envian el formulario, crea unas variables con los datos que envien.
        $rol = $_POST['rol'];
        $documento = $_POST['documento'];

        if($documento == null || $rol == null){
            echo '<script language="javascript">
                    alertaError();
                </script>';
        }else{
            // Verificar cual es el rol del usuario al que se desea actualizar
            if($rol == 1){
                require_once('../modelos/estudiante.php');
                $modelo = new Estudiante();
                $funcion = "actualizarEstudiante";
            }elseif($rol == 2){
                require_once('../modelos/profesor.php');
                $modelo = new Profesor();
                $funcion = "actualizarProfesor";
            }elseif($rol == 3){
                require_once('../modelos/adminAcademico.php');
                $modelo = new AdminAcademico();
                $funcion = "actualizarAdminAcademico";
            }else{
                echo '<script language="javascript">
                        alertaError();
                    </script>';
            }

            $entrada = $modelo->$funcion($documento);
            // Si lo que devuelve la función es false, lo redireciona a login
            // if($entrada == false){
            //     echo '<script>
            //             alertaError();
            //         </script>';
            // }else{
            // }
        }
    }
?>
</body>
</html>
