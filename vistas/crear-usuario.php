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

        <header>

                <img src="imagenes/simbolos.png">
                <h1>Colegio Rafael Uribe Uribe</h1>

        </header>
        <!-- <center>Gestión de usuarios</center> -->
        <nav>

            <label for="btn-menu" class="icon-view-list"></label>
            <input type="checkbox" id="btn-menu" class="icono">

            <div class="menu">
                <ul>
                
                    <li><a href="menu.php" class="botones"><span class="icon-undo"></span>Volver</a></li>
                
                    <li><a href="#" class="botones activo"><span class="icon-user-plus"></span>Crear usuario</a></li>
                
                    <li><a href="actualizar-usuario.php" class="botones"><span class="icon-spinner11"></span>Actualizar usuario</a></li>
                
                    <li><a href="consultar-usuario.php" class="botones"><span class="icon-search"></span>Consultar usuario</a></li>
                
                    <li><a href="inactivar-usuario.php" class="botones"><span class="icon-user-minus"></span>Inactivar usuario</a></li>
                
                </ul>
            </div>

        </nav>

        <div class="contenido">

            <h1>Registro de usuarios</h1>

            <div class="inputs">
                
                    <label for="rol">Rol del nuevo usuario:</label><br>
                    <select name="rol" id="rol" class="recolectores" required onChange="mostrar(this.value)">
                        <option value="selecionar">Selecionar opción</option>
                        <option value="estudiante">Estudiante</option>
                        <option value="profesor">Profesor</option>
                        <option value="administrador">Administrador</option>
                    </select>
                
            </div>

            <!-------------------------------------------------------------->
                        <!----------------- Formulario para estudiante ---------------------->
            <!-------------------------------------------------------------->
            <form action="crear-usuario.php" method="POST">
                
                <div class="estudiante" id="estudiante">
                
                    <div class="inputs">

                        <input type="text" name="nombres-estudiante" id="nombres-estudiante" placeholder="Nombres del estudiante" title="Solo los nombres del estudiante." class="recolectores" required>
                    
                    </div>
                    
                    <div class="inputs">
                    
                        <input type="text" name="apellidos-estudiante" id="apellidos-estudiante" placeholder="Apellidos del estudiante" title="Solo los apellidos del estudiante." class="recolectores" required>
                    
                    </div>
                    
                    <div class="inputs">

                        <input type="number" name="documento-estudiante" id="documento-estudiante" placeholder="Número de identificacion "class="recolectores" required>
                    
                    </div>

                    <div class="inputs">
                        <select name="estadoEstudiante" id="EstadoEstudiante" class="recolectores" required>
                            <option value="">Estado del Estudiante</option>
                            <option value="activoEstudiante">Activo</option>
                            <option value="inactivoEstudiante">Inactivo</option>
                        </select>
                    
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
                        <!----------------- Formulario para profesor ---------------------->
            <!-------------------------------------------------------------->

            <form action="crear-usuario.php" method="POST">

                <div class="estudiante" id="profesor">
                
                    <div class="inputs">
                    
                        <input type="text" name="nombres-profesor" id="nombres-profesor" placeholder="Nombres del profesor" title="Solo los nombres del profesor." class="recolectores" required>
                    
                    </div>
                    
                    <div class="inputs">
                    
                        <input type="text" name="apellidos-profesor" id="apellidos-profesor" placeholder="Apellidos del profesor" title="Solo los apellidos del profesor." class="recolectores" required>
                    
                    </div>
                    
                    <div class="inputs">
                    
                        <input type="number" name="documento-profesor" id="documento-profesor" placeholder="Número de identificacion "class="recolectores" required>
                    
                    </div>

                    <div class="inputs">
                    
                        <input type="number" name="especialidad-profesor" id="especialidad-profesor" placeholder="Especialidad del profesor"class="recolectores" required>
                    
                    </div>

                    <div class="inputs">
                        <select name="estadoProfesor" id="EstadoProfesor" class="recolectores" required>
                            <option value="">Estado del Profesor</option>
                            <option value="activoProfesor">Activo</option>
                            <option value="inactivoProfesor">Inactivo</option>
                        </select>
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

            <form action="crear-usuario.php" method="POST">

                <div class="administrador" id="administrador">
                
                    <div class="inputs">
                    
                        <input type="text" name="nombres-admin" id="nombres-admin" placeholder="Nombres del administrador" title="Solo los nombres del administrador." class="recolectores" required>
                    
                    </div>
                    
                    <div class="inputs">
                    
                        <input type="text" name="apellidos--admin" id="apellidos--admin" placeholder="Apellidos del administrador" title="Solo los apellidos del administrador." class="recolectores" required>
                    
                    </div>
                    
                    <div class="inputs">
                    
                        <input type="number" name="documento-admin" id="documento-admin" placeholder="Número de identificacion "class="recolectores" required>
                    
                    </div>
                    
                    <div class="inputs">
                        <select name="estadoAdministrador" id="EstadoAdministrador" class="recolectores" required>
                            <option value="">Estado del Administrador</option>
                            <option value="activoAdministrador">Activo</option>
                            <option value="inactivoAdministrador">Inactivo</option>
                        </select>
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

        <footer class="footer">
            <p>Todos los derechos reservados al Colegio Rafael Uribe Uribe | Copyright ©</p>
        </footer>

    </div>

    <script src="js/jquery.js"></script>
    <script src="js/registro.js"></script>
</body>
</html>