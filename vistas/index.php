<?php
    require_once('../modelos/login.php');
    $modeloLogin = new Login();
    $modeloLogin->validarSesion();
    $modeloLogin->validarEstado();
    $mensaje = $modeloLogin->validarSexo();
    $rolActual = $modeloLogin->validarRol();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Menú <?php echo $rolActual; ?> | Colegio Rafael Uribe Uribe IED</title>
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

        <header>
            <img src="imagenes/simbolos.png" loading="lazy" alt="Escudo y bandera del colegio Rafael Uribe Uribe">
            <h1>Colegio Rafael Uribe Uribe</h1>
        </header>

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

                    <li class="submenu inactivo" id="padreBoton1">
                        <a id="gestiones" class="botones"><span class="icon-users"></span>Gestionar Usuarios
                            <span><span id="boton1" name="spans" class="icon-cheveron-down"></span></span>
                        </a>
                            <ul>
                                <?php 
                                    if($_SESSION['Tipo_User'] == 1){
                                ?>
                                        <li><a href="admin/crear-usuario.php" class="botones"><span class="icon-user-plus"></span>Crear Usuario</a></li>
                                        <li><a href="admin/actualizar-usuario.php" class="botones"><span class="icon-spinner11"></span> Actualizar Usuario</a></li>
                                        <li><a href="admin/consultar-usuario.php" class="botones"><span class="icon-search"></span> Consultar Usuario</a></li>
                                        <li><a href="admin/inactivar-usuario.php" class="botones"><span class="icon-user-minus"></span> Inactivar Usuario</a></li>
                                <?php
                                    }elseif($_SESSION['Tipo_User'] == 2){
                                ?>
                                        <li><a href="profesor/" class="botones"><span class="icon-user-plus"></span>Ver mi perfil</a></li>
                                        <li><a href="profesor/editarPerfil.php" class="botones"><span class="icon-spinner11"></span>Actualizar Usuario</a></li>
                                        <!-- <li><a href="admin/consultar-usuario.php" class="botones"><span class="icon-search"></span> Consultar Usuario</a></li>
                                        <li><a href="admin/inactivar-usuario.php" class="botones"><span class="icon-user-minus"></span> Inactivar Usuario</a></li> -->
                                <?php
                                }elseif($_SESSION['Tipo_User'] == 3){
                                ?>
                                        <li><a href="estudiante/" class="botones"><span class="icon-user-plus"></span>Ver mi perfil</a></li>
                                        <li><a href="estudiante/editarPerfil.php" class="botones"><span class="icon-spinner11"></span>Actualizar Usuario</a></li>
                                        <!-- <li><a href="admin/consultar-usuario.php" class="botones"><span class="icon-search"></span> Consultar Usuario</a></li>
                                        <li><a href="admin/inactivar-usuario.php" class="botones"><span class="icon-user-minus"></span> Inactivar Usuario</a></li> -->
                                <?php
                                }
                                ?>
                            </ul>
                    </li>

                    <li class="submenu inactivo" id="padreBoton2">
                        <a id="gestiones" class="botones"><span class="icon-folder-open"></span>Gestionar Cursos
                            <span><span id="boton2" name="spans" class="icon-cheveron-down"></span></span>
                        </a>
                            <ul>
                                <?php 
                                    if($_SESSION['Tipo_User'] == 1){
                                ?>
                                        <li><a href="admin/crear-curso.php" class="botones"><span class="icon-folder-plus"></span>Crear Curso</a></li>
                                        <li><a href="admin/actualizar-curso.php" class="botones"><span class="icon-spinner11"></span>Actualizar Curso</a></li>
                                        <li><a href="admin/consultar-curso.php" class="botones"><span class="icon-search"></span>Consultar Curso</a></li>
                                        <li><a href="admin/inactivar-curso.php" class="botones"><span class="icon-folder-minus"></span>Inactivar Curso</a></li>
                                <?php
                                    }
                                    if($_SESSION['Tipo_User'] == 2){
                                ?>
                                        <li><a href="profesor/" class="botones"><span class="icon-folder-plus"></span>Ver mis cursos</a></li>
                                        <!-- <li><a href="admin/actualizar-curso.php" class="botones"><span class="icon-spinner11"></span>Actualizar Curso</a></li>
                                        <li><a href="admin/consultar-curso.php" class="botones"><span class="icon-search"></span>Consultar Curso</a></li>
                                        <li><a href="admin/inactivar-curso.php" class="botones"><span class="icon-folder-minus"></span>Inactivar Curso</a></li> -->
                                <?php
                                    }
                                    if($_SESSION['Tipo_User'] == 3){
                                ?>
                                        <li><a href="estudiante/" class="botones"><span class="icon-folder-plus"></span>Ver mis curso</a></li>
                                        <!-- <li><a href="admin/actualizar-curso.php" class="botones"><span class="icon-spinner11"></span>Actualizar Curso</a></li>
                                        <li><a href="admin/consultar-curso.php" class="botones"><span class="icon-search"></span>Consultar Curso</a></li>
                                        <li><a href="admin/inactivar-curso.php" class="botones"><span class="icon-folder-minus"></span>Inactivar Curso</a></li> -->
                                <?php
                                    }
                                ?>
                            </ul>
                    </li>

                    <li class="submenu inactivo" id="padreBoton3">
                        <a id="gestiones" class="botones"><span class="icon-profile"></span>Gestionar Matriculas
                            <span><span id="boton3" name="spans" class="icon-cheveron-down"></span></span>
                        </a>
                            <ul>
                                <?php 
                                    if($_SESSION['Tipo_User'] == 1){
                                ?>
                                    <li><a href="admin/crear-matricula.php" class="botones"><span class="icon-file-text"></span>Crear Matricula</a></li>
                                    <li><a href="admin/actualizar-matricula.php" class="botones"><span class="icon-spinner11"></span>Actualizar Matricula</a></li>
                                    <li><a href="admin/consultar-matricula.php" class="botones"><span class="icon-search"></span>Consultar Matricula</a></li>
                                    <li><a href="admin/inactivar-matricula.php" class="botones"><span class="icon-blocked"></span>Inactivar Matricula</a></li>
                                <?php
                                    }
                                    if($_SESSION['Tipo_User'] == 2){
                                        ?>
                                            <li><a href="profesor/" class="botones"><span class="icon-file-text"></span>Ver matriculas</a></li>
                                            <!-- <li><a href="admin/actualizar-matricula.php" class="botones"><span class="icon-spinner11"></span>Actualizar Matricula</a></li>
                                            <li><a href="admin/consultar-matricula.php" class="botones"><span class="icon-search"></span>Consultar Matricula</a></li>
                                            <li><a href="admin/inactivar-matricula.php" class="botones"><span class="icon-blocked"></span>Inactivar Matricula</a></li> -->
                                <?php
                                        }
                                    if($_SESSION['Tipo_User'] == 3){
                                ?>
                                    <li><a href="estudiante/" class="botones"><span class="icon-file-text"></span>Ver mi matricula</a></li>
                                    <!-- <li><a href="admin/actualizar-matricula.php" class="botones"><span class="icon-spinner11"></span>Actualizar Matricula</a></li>
                                    <li><a href="admin/consultar-matricula.php" class="botones"><span class="icon-search"></span>Consultar Matricula</a></li>
                                    <li><a href="admin/inactivar-matricula.php" class="botones"><span class="icon-blocked"></span>Inactivar Matricula</a></li> -->
                                <?php
                                    }
                                ?>
                                
                                    
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

        <?php include('admin/footer.php'); ?>

    </div>

    <script src="js/jquery.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/configuraciones.js"></script>
</body>
</html>