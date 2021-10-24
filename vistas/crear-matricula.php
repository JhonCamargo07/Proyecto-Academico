<?php
    require_once('../modelos/login.php');
    $modeloLogin = new Login();
    $modeloLogin->validarSesion();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,  maximum-scale=1.0" user-scalable=no />
    <meta name="author" content="Jhon Camargo">
    <meta name="description" content="Crear matriculas en el Colegio Rafael Uribe Uribe (IED) Localidad 19 Bogotá - Ciudad Bolívar.">
    <meta name="keywords" content="Colegio Rafael Uribe Uribe, Colegio, Educacion, Rafael Uribe, Colegios ciudad Bolívar">
    <link rel="stylesheet" href="css/todos/index.css">
    <link rel="stylesheet" href="css/todos/formularios.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="shortcut icon" href="imagenes/escudo.jpg">
    <title>Registrar Matrícula | Colegio Rafael Uribe Uribe IED</title>
</head>
<body>

    <div class="contenedor">

        <?php include('header.php'); ?>

        <nav>

            <label for="btn-menu" class="icon-view-list"></label>
            <input type="checkbox" id="btn-menu" class="icono">

            <div class="menu">
                <ul>
                    <li><a href="menu.php" class="botones"><span class="icon-undo"></span>Volver</a></li>
                    <li><a href="#" class="botones activo"><span class="icon-file-text"></span>Crear Matricula</a></li>
                    <li><a href="actualizar-matricula.php" class="botones"><span class="icon-spinner11"></span>Actualizar Matricula</a></li>
                    <li><a href="consultar-matricula.php" class="botones"><span class="icon-search"></span>Consultar Matricula</a></li>
                    <li><a href="inactivar-matricula.php" class="botones"><span class="icon-blocked"></span>Inactivar Matricula</a></li>
                </ul>
            </div>
        </nav>

        <div class="contenido">
            
            <h1>Registro de Matriculas</h1>
        
            <form action="crear-matricula.php">
                <div class="inputs">
                    
                    <input type="date" name="fecha" id="fecha" title="Fecha en la que se hace el registro" class="recolectores" required>
                
                </div>
                
                <!-- <div class="inputs">
                
                    <input type="text" name="apellidos-profesor" id="apellidos-profesor" placeholder="Apellidos del profesor" title="Solo los apellidos del profesor." class="recolectores" required>
                
                </div>
                
                <div class="inputs">
                
                    <input type="number" name="documento-profesor" id="documento-profesor" placeholder="Número de identificacion "class="recolectores" required>
                
                </div>

                <div class="inputs">
                
                    <input type="number" name="especialidad-profesor" id="especialidad-profesor" placeholder="Especialidad del profesor"class="recolectores" required>
                
                </div> -->

                <div class="inputs">
                    <select name="estadoMatricula" id="EstadoMatricula" class="recolectores" required>
                        <option value="">Estado de la matricula</option>
                        <option value="activoProfesor">Activa</option>
                        <option value="inactivoProfesor">Inactiva</option>
                    </select>
                </div>

                <div class="inputs">
                
                    <input type="number" name="id_usuario" id="id_usuario" placeholder="Identificacion del estudiante"class="recolectores" required>
                
                </div>
                
                <div class="inputs">
                
                    <center>
                        <input type="reset" value="Limpiar" class="boton secundario">
                        <input type="submit" value="Registrar"  class="boton primario">
                    </center>
                
                </div>
            </form>
        </div>

        <?php include('footer.php'); ?>

    </div>

    <script src="js/configuraciones.js"></script>
</body>
</html>