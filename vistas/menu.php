<?php
    require_once('../modelos/login.php');
    $modeloLogin = new Login();
    $modeloLogin->validarSesion();

    $mensaje = "";
    if($_SESSION['Sexo'] == 1){
        $mensaje = "Bienvenido " . $_SESSION['Nombre'];
    }elseif($_SESSION['Sexo'] == 2){
        $mensaje = "Bienvenida " . $_SESSION['Nombre'];    
    }else{
        $mensaje = "Bienvenid@ " . $_SESSION['Nombre'];
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Menú | Colegio Rafael Uribe Uribe IED</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,  maximum-scale=1.0" user-scalable=no />
    <meta name="author" content="Jhon Camargo">
    <meta name="description" content="Menu del Colegio Rafael Uribe Uribe (IED) Localidad 19 Bogotá - Ciudad Bolívar.">
    <meta name="keywords" content="Colegio Rafael Uribe Uribe, Colegio, Educacion, Rafael Uribe, Colegios ciudad Bolívar">
    <link rel="shortcut icon" href="imagenes/escudo.jpg">
    <link rel="stylesheet" href="css/todos/index.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/fonts.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body>
    <div class="contenedor">

        <?php include('header.php'); ?>

            <div class="navegador">

                <section>
                    <p class="nombreingresado">
                        <?php echo "<strong>$mensaje</strong>"; ?>
                    </p>
                </section>

                <label for="btn-menu" class="icon-view-list"></label>
                <input type="checkbox" id="btn-menu">

                <nav class="menu">
                    
                    <ul>

                        <!-- <li>
                            <a href="../index.html" class="botones"><span class="icon-home"></span>Ininio</a>
                        </li> -->

                        <li class="submenu inactivo" id="padreBoton1">
                            <a id="gestiones" class="botones"><span class="icon-users"></span>Gestionar Usuarios
                                <span><span id="boton1" name="spans" class="icon-cheveron-down"></span></span>
                            </a>
                                <ul>
                                    <li><a href="crear-usuario.php" class="botones"><span class="icon-user-plus"></span>Crear Usuario</a></li>
                                    <li><a href="actualizar-usuario.php" class="botones"><span class="icon-spinner11"></span> Actualizar Usuario</a></li>
                                    <li><a href="consultar-usuario.php" class="botones"><span class="icon-search"></span> Consultar Usuario</a></li>
                                    <li><a href="inactivar-usuario.php" class="botones"><span class="icon-user-minus"></span> Inactivar Usuario</a></li>
                                </ul>
                        </li>

                        <li class="submenu inactivo" id="padreBoton2">
                            <a id="gestiones" class="botones"><span class="icon-folder-open"></span>Gestionar Cursos
                                <span><span id="boton2" name="spans" class="icon-cheveron-down"></span></span>
                            </a>
                                <ul>
                                    <li><a href="crear-curso.php" class="botones"><span class="icon-folder-plus"></span>Crear Curso</a></li>
                                    <li><a href="actualizar-curso.php" class="botones"><span class="icon-spinner11"></span>Actualizar Curso</a></li>
                                    <li><a href="consultar-curso.php" class="botones"><span class="icon-search"></span>Consultar Curso</a></li>
                                    <li><a href="inactivar-curso.php" class="botones"><span class="icon-folder-minus"></span>Inactivar Curso</a></li>
                                </ul>
                        </li>

                        <li class="submenu inactivo" id="padreBoton3">
                            <a id="gestiones" class="botones"><span class="icon-profile"></span>Gestionar Matriculas
                                <span><span id="boton3" name="spans" class="icon-cheveron-down"></span></span>
                            </a>
                                <ul>
                                    <li><a href="crear-matricula.php" class="botones"><span class="icon-file-text"></span>Crear Matricula</a></li>
                                    <li><a href="actualizar-matricula.php" class="botones"><span class="icon-spinner11"></span>Actualizar Matricula</a></li>
                                    <li><a href="consultar-matricula.php" class="botones"><span class="icon-search"></span>Consultar Matricula</a></li>
                                    <li><a href="inactivar-matricula.php" class="botones"><span class="icon-blocked"></span>Inactivar Matricula</a></li>
                                </ul>
                        </li>

                        <li>
                            <a href="../controladores/logout.php" class="botones"><span class="icon-exit"></span>Cerrar Sesión</a>
                        </li>

                    </ul>

                </nav>
            </div>

        <div class="contenido">
            <h2 class="subtitulo">Algunas instrucciones</h2><br>
            <p>
                Esta es la página principal, desde aquí puede dirigirse al resto de opciones que tiene permitidos. Cualquier problema que tenga puede mirar si en la página de ayuda lo logra solucionar, de no ser así puede dirigirse a la página de contacto para que el encargado de hacer todas las gestiones le ayude a solucionar el dilema que presenta.
            </p><br>
            <p>
                En el menú que está arriba puede selecionar la opción que necesite, dependiendo de cual escoja será llevado a una página en donde pueda realizar la accion escogida.
            </p><br>
            <p>
                Su sesión permanecerá activa siempre y cuando no salga de ella, por tal motivo no la deje abierta en cualquier lado (computador o celular ajeno, cafe internet, o en cualquier otro dispositivo perteneciente a un tercero), si por algun motivo sucede lo anterior, debe tratar de cambiar su contraseña lo más pronto posible para que la persona que tenga acceso no pueda hacer ningun cambio.
            </p><br>
            <p>
                Todas las acciones que realice serán guardadas en la base de datos, y se sabrá que usuario modificó o hizo un cambio en la base de datos, esto para garantizar la seguridad de los datos que se encuentren registrados.
            </p>

        </div>

        <?php include('footer.php'); ?>

    </div>

    <script src="js/jquery.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/configuraciones.js"></script>
</body>
</html>