<?php
    require_once('../modelos/login.php');
    $modeloLogin = new Login();
    $modeloLogin->validarSesion();
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,  maximum-scale=1.0" user-scalable=no />
    <meta name="author" content="Jhon Camargo">
    <meta name="description" content="Crear usuario en el Colegio Rafael Uribe Uribe (IED) Localidad 19 Bogotá - Ciudad Bolívar.">
    <meta name="keywords" content="Crear usuario Colegio Rafael Uribe Uribe, Colegio, Educacion, Rafael Uribe, Colegios ciudad Bolívar">
    <link rel="stylesheet" href="css/todos/index.css">
    <link rel="stylesheet" href="css/todos/formularios.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="shortcut icon" href="imagenes/escudo.jpg">
    <title>Registro usuario | Colegio Rafael Uribe Uribe IED</title>
</head>
<body>
    <div class="contenedor">

        <?php include('header.php'); ?>

        <!-- <center>Gestión de usuarios</center> -->
        <nav>

            <label for="btn-menu" class="icon-view-list"></label>
            <input type="checkbox" id="btn-menu" class="icono">

            <div class="menu">
                <ul>
                
                    <li><a href="menu.php" class="botones"><span class="icon-undo"></span>Volver</a></li>
                
                    <li><a class="botones activo"><span class="icon-user-plus"></span>Crear usuario</a></li>
                
                    <li><a href="actualizar-usuario.php" class="botones"><span class="icon-spinner11"></span>Actualizar usuario</a></li>
                
                    <li><a href="consultar-usuario.php" class="botones"><span class="icon-search"></span>Consultar usuario</a></li>
                
                    <li><a href="inactivar-usuario.php" class="botones"><span class="icon-user-minus"></span>Inactivar usuario</a></li>
                
                </ul>
            </div>

        </nav>

        <div class="contenido">

            <h1>Registro de usuarios</h1>

            <div class="inputs">
                
                    <b><label for="rol">Rol del nuevo usuario:</label><br></b>
                    <select name="rol" id="rol" class="recolectores" required onChange="mostrar(this.value)">
                        <option value="">Selecionar opción</option>
                        <option value="estudiante">Estudiante</option>
                        <option value="profesor">Profesor</option>
                        <option value="administrador">Administrador</option>
                    </select>
                
            </div>

            <!-------------------------------------------------------------->
                        <!----------------- Formulario para estudiante ---------------------->
            <!-------------------------------------------------------------->
            <form action="../controladores/AgregarEstudiante.php" method="POST">
                
                <div class="estudiante" id="estudiante">
                
                    <div class="inputs">
                        <b><label for="nombres-estudiante">Nombres:</label></b>
                        <input type="text" name="nombres-estudiante" id="nombres-estudiante" placeholder="Nombres del estudiante" title="Solo los nombres del estudiante." class="recolectores" required>
                    </div>
                    
                    <div class="inputs">
                        <b><label for="apellidos-estudiante">Apellidos:</label></b>
                        <input type="text" name="apellidos-estudiante" id="apellidos-estudiante" placeholder="Apellidos del estudiante" title="Solo los apellidos del estudiante." class="recolectores" required>
                    </div>
                    
                    <div class="inputs">
                        <b><label for="documento-estudiante">Número de documento:</label></b>
                        <input type="number" name="documento-estudiante" id="documento-estudiante" placeholder="Número de identificacion "class="recolectores" required>
                    </div>

                    <div class="inputs">
                        <b><label for="estado-Estudiante">Estado del estudiante:</label></b>
                        <select name="estadoEstudiante" id="estadoEstudiante" class="recolectores" required>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                        </select>
                    </div>

                    <div class="inputs">
                        <b><label for="sexoEstudiante">Sexo:</label></b>
                        <select name="sexoEstudiante" id="sexoEstudiante" class="recolectores" required>
                            <option value="1">Hombre</option>
                            <option value="2">Mujer</option>
                            <option value="3">Indefinido</option>
                        </select>
                    </div>

                    <div class="inputs">
                        <b><label for="usuario-estudiante">Usuario:</label></b>
                        <input type="text" name="usuario-estudiante" id="usuario-estudiante" placeholder="Nombre de usuario" title="Escribir un usuario que logre recordar." class="recolectores" required>
                    </div>

                    <div class="inputs">
                        <b><label for="password-estudiante">Contraseña:</label></b>
                        <input type="password" name="password-estudiante" id="password-estudiante" placeholder="Contraseña segura" title="Escriba una contraseña que sea segura." class="recolectores" required>
                    </div>
                    
                    <div class="inputs">
                        <center>
                            <input type="reset" value="Limpiar" class="boton secundario">
                            <input type="submit" value="Registrar" name="registar" class="boton primario">
                        </center>
                    </div>
                
                </div>

            </form>

            <!-------------------------------------------------------------->
                        <!----------------- Formulario para profesor ---------------------->
            <!-------------------------------------------------------------->

            <form action="../controladores/AgregarProfesor.php" method="POST">

                <div class="estudiante" id="profesor">
                
                    <div class="inputs">
                        <b><label for="nombres-profesor">Nombres:</label></b>
                        <input type="text" name="nombres-profesor" id="nombres-profesor" placeholder="Nombres del profesor" title="Solo los nombres del profesor." class="recolectores" required>
                    
                    </div>
                    
                    <div class="inputs">
                        <b><label for="apellidos-profesor">Apellidos:</label></b>
                        <input type="text" name="apellidos-profesor" id="apellidos-profesor" placeholder="Apellidos del profesor" title="Solo los apellidos del profesor." class="recolectores" required>
                    </div>
                    
                    <div class="inputs">
                        <b><label for="documento-profesor">Número de documento:</label></b>
                        <input type="number" name="documento-profesor" id="documento-profesor" placeholder="Número de identificacion "class="recolectores" required>
                    </div>

                    <div class="inputs">
                        <b><label for="especialidad-profesor">Especialidad del profesor:</label></b>
                        <input type="text" name="especialidad-profesor" id="especialidad-profesor" placeholder="Especialidad"class="recolectores" required>
                    </div>

                    <div class="inputs">
                        <b><label for="estadoprofesor">Estado del profesor:</label></b>
                        <select name="estadoProfesor" id="EstadoProfesor" class="recolectores" required>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                        </select>
                    </div>

                    <div class="inputs">
                        <b><label for="sexoEstudiante">Sexo:</label></b>
                        <select name="sexoProfesor" id="sexoProfesor" class="recolectores" required>
                            <option value="1">Hombre</option>
                            <option value="2">Mujer</option>
                            <option value="3">Indefinido</option>
                        </select>
                    </div>

                    <div class="inputs">
                        <b><label for="usuario-profesor">Usuario:</label></b>
                        <input type="text" name="usuario-profesor" id="usuario-profesor" placeholder="Nombre de usuario" title="Escribir un usuario que logre recordar." class="recolectores" required>
                    </div>

                    <div class="inputs">
                        <b><label for="password-profesor">Contraseña:</label></b>
                        <input type="password" name="password-profesor" id="password-profesor" placeholder="Contraseña segura" title="Escriba una contraseña segura." class="recolectores" required>
                    </div>
                    
                    <div class="inputs">
                        <center>
                            <input type="reset" value="Limpiar" class="boton secundario">
                            <input type="submit" value="Registrar"  class="boton primario">
                        </center>
                    </div>
                
                </div>
                
            </form>


            <!-------------------------------------------------------------->
                        <!----------------- Formulario para administrador ---------------------->
            <!-------------------------------------------------------------->

            <form action="../controladores/AgregarAdmin.php" method="POST">

                <div class="administrador" id="administrador">
                
                    <div class="inputs">
                        <b><label for="nombres-admin">Nombres:</label></b>
                        <input type="text" name="nombres-admin" id="nombres-admin" placeholder="Nombres del administrador" title="Solo los nombres del administrador." class="recolectores" required>
                    </div>
                    
                    <div class="inputs">
                        <b><label for="apellidos-admin">Apellidos:</label></b>
                        <input type="text" name="apellidos-admin" id="apellidos-admin" placeholder="Apellidos del administrador" title="Solo los apellidos del administrador." class="recolectores" required>
                    </div>
                    
                    <div class="inputs">
                        <b><label for="documento-admin">Documento del administrador:</label></b>
                        <input type="number" name="documento-admin" id="documento-admin" placeholder="Número de identificacion"class="recolectores" required>
                    </div>
                    
                    <div class="inputs">
                        <b><label for="cargo-admin">Cargo:</label></b>
                        <input type="text" name="cargo-admin" id="cargo-admin" placeholder="Cargo del administrador" title="Escriba el cargo que hará el administrador" class="recolectores" required>
                    </div>

                    <div class="inputs">
                        <b><label for="estadoAdmin">Estado del administrador:</label></b>
                        <select name="estadoAdmin" id="EstadoAdmin" class="recolectores" required>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                        </select>
                    </div>
                    
                    <div class="inputs">
                        <b><label for="sexoAdmin">Sexo:</label></b>
                        <select name="sexoAdmin" id="sexoAdmin" class="recolectores" required>
                            <option value="1">Hombre</option>
                            <option value="2">Mujer</option>
                            <option value="3">Indefinido</option>
                        </select>
                    </div>

                    <div class="inputs">
                        <b><label for="usuario-admin">Usuario:</label></b>
                        <input type="text" name="usuario-admin" id="usuario-admin" placeholder="Nombre de usuario" title="Escribir un usuario que logre recordar." class="recolectores" required>
                    </div>

                    <div class="inputs">
                        <b><label for="password-admin">Contraseña:</label></b>
                        <input type="password" name="password-admin" id="password-admin" placeholder="Contraseña segura" title="Escribe una contraseña segura." class="recolectores" required>
                    </div>

                    <div class="inputs">
                        <center>
                            <input type="reset" value="Limpiar" class="boton secundario">
                            <input type="submit" value="Registrar"  class="boton primario">
                        </center>
                    </div>
                
                </div>
                
            </form>

        </div>

        <?php include('footer.php'); ?>

    </div>

    <script src="js/jquery.js"></script>
    <script src="js/registro.js"></script>
    <script src="js/configuraciones.js"></script>
</body>
</html>