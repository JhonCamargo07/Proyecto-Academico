<?php
    if(isset($_POST['ingresar'])){
        $usuarioWeb = $_POST['usuario'];
        $contraseñaWeb = $_POST['contraseña'];

        if($usuarioWeb == "" || $contraseñaWeb == ""){
            echo "<p class='parrafo__php'>Debes rellenas todos los compos solicitados<p>";
        }else{
            include('../modelos/login.php');
            $ingreso = new ingresar();
            $meterDatos = $ingreso->setDatos($usuarioWeb, $contraseñaWeb);
            $datos = $ingreso->getIngreso();
        }

        // $host = "localhost";
        // $basededatos = "proyecto_academico"; 
        // $usuarioBD = "root";
        // $clave = "";
        // $tabla_Usuario = "usuario";

        // $conexion = mysqli_connect($host, $usuarioBD, $clave, $basededatos);
        // $consulta = "SELECT * FROM $tabla_Usuario WHERE binary Usuario = '$usuarioWeb' and binary PasswordU = '$contraseñaWeb'";
        // $resultado = mysqli_query($conexion, $consulta);

        // $filas = mysqli_num_rows($resultado);

        // if ($conexion->connect_errno) {
        //     echo "Nuestro sitio experimenta fallos....";
        //     exit();
        // }

        // if($filas > 0){
            // session_start();
            // $_SESSION['usuario'] = $usuarioWeb;
            // header("location:menu.php");
        // }
        // else{
        //     echo '<script language="javascript">swal.fire({
        //             title: "Error en los datos suministados",
        //             text:"Alguno de los campos fue mal diligenciado",
        //             confirmButtonText: \'Ok, entendí\',
        //             imageUrl: \'imagenes/stop.gif\',
        //             imageWidth: 100,
        //             imageHeight: 100,
        //             showClass: {
        //                 popup: \'animate__animated animate__fadeInDown\'
        //                 },
        //                 hideClass: {
        //                 popup: \'animate__animated animate__fadeOutUp\'
        //                 }
        //         });</script>' . "<p class='parrafo__php'>El usuario y/o la contraseña son incorrectos<p>";
        // }
        
        // mysqli_free_result($resultado);
    //     mysqli_close($conexion);
    }
?>