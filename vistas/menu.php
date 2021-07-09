<?php
    session_start();
    if(empty($_SESSION['usuario'])){
        header("location:login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,  maximum-scale=1.0" user-scalable=no />
    <meta name="author" content="Jhon Camargo">
    <meta name="description" content="Menu del Colegio Rafael Uribe Uribe (IED) Localidad 19 Bogotá - Ciudad Bolívar.">
    <meta name="keywords" content="Colegio Rafael Uribe Uribe, Colegio, Educacion, Rafael Uribe, Colegios ciudad Bolívar">
    <link rel="stylesheet" href="css/todos/index.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="shortcut icon" href="imagenes/escudo.jpg">
    <title>Menú | Colegio Rafael Uribe Uribe IED</title>
</head>
<body>
    <div class="contenedor">

        <header>

                <img src="imagenes/simbolos.png" loading="lazy" alt="Escudo y bandera del colegio Rafael Uribe Uribe">
                <h1>Colegio Rafael Uribe Uribe</h1>

        </header>

            <div class="navegador">

                <section>
                    <p class="nombreingresado">Bienvenido(a) 
                        <?php
                            $usuario = $_SESSION['usuario'];
                            echo "$usuario";
                        ?>
                    </p>
                </section>

                <label for="btn-menu" class="icon-view-list"></label>
                <input type="checkbox" id="btn-menu">

                <nav class="menu">
                    
                    <ul>

                        <li>
                            <a href="../index.html" class="botones"><span class="icon-home"></span>Ininio</a>
                        </li>

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
                            <a href="logout.php" class="botones"><span class="icon-exit"></span>Cerrar Sesión</a>
                        </li>

                    </ul>

                </nav>
            </div>

        <div class="contenido">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat dolore tempora quia ea inventore similique aut! Aspernatur accusamus beatae perferendis pariatur cum quo eveniet doloremque, vitae, nulla, expedita rerum saepe!
            </p>
            <p>
                Dolore consequuntur esse eos voluptatum non sequi repellendus, earum facilis expedita eligendi laborum unde repudiandae eum distinctio, quidem quas officiis optio? Distinctio, obcaecati voluptates. Repellat nemo fuga ex repudiandae dolore?
            </p>
            <p>
                Sapiente, tempora natus incidunt magni odit magnam mollitia eum obcaecati harum fugit quos nulla accusantium at nesciunt cumque dolor dolorum quod? Dignissimos placeat consequatur, aut repellendus vel ipsum. Consequuntur, sit?
            </p>
            <p>
                Mollitia inventore odit cum nemo tempora assumenda ipsam tempore asperiores unde neque est quo dolorum, saepe quod rem! Corrupti excepturi ab, mollitia quibusdam pariatur quos expedita facere inventore laudantium enim!
            </p>
            <p>
                Laboriosam, labore. Voluptates voluptas repudiandae incidunt deserunt sed! Ullam distinctio magni, quas praesentium quod sed aliquid repudiandae deleniti veniam ea exercitationem rerum iure voluptates nihil doloribus velit quaerat quibusdam numquam.
            </p>
            <p>
                Pariatur, laborum! Accusamus nisi corrupti earum ipsam repellat est maxime similique pariatur officia maiores ex labore consequuntur quidem fuga, deserunt illum blanditiis eveniet! Minus veritatis, omnis atque libero qui non.
            </p>
            <p>
                Ipsam illo dolore aut minima laboriosam quidem quam, vel minus dolor sapiente enim voluptatem facilis harum aliquam placeat voluptate nostrum saepe ipsa consequatur tenetur! Necessitatibus maiores tempora magni voluptate nemo?
            </p>
            <p>
                Dolor, ut culpa sint cum repellendus tempora aspernatur natus animi asperiores cupiditate id iure recusandae, voluptates deserunt dicta molestias, quisquam perferendis quasi sed illum doloribus? Quisquam temporibus fugit velit. Eius.
            </p>

        </div>

        <footer>
            <p>Todos los derechos reservados al Colegio Rafael Uribe Uribe | Copyright ©</p>
        </footer>

    </div>

    <script src="js/jquery.js"></script>
    <script src="js/menu.js"></script>
</body>
</html>