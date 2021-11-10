<?php
    require_once('../../modelos/login.php');
    $modeloLogin = new Login();
    $modeloLogin->validarSesion();
    $modeloLogin->validarRolAdmin();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,  maximum-scale=1.0" user-scalable=no />
    <meta name="author" content="Jhon Camargo">
    <meta name="description" content="Consultar curso en la plataforma de el Colegio Rafael Uribe Uribe (IED) Localidad 19 Bogotá - Ciudad Bolívar.">
    <meta name="keywords" content="Colegio Rafael Uribe Uribe, Colegio, Educacion, Rafael Uribe, Colegios ciudad Bolívar, consultar">
    <link rel="stylesheet" href="../css/todos/index.css">
    <link rel="stylesheet" href="../css/todos/formularios.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="shortcut icon" href="../imagenes/escudo.jpg">
    <title>Consultar Curso | Colegio Rafael Uribe Uribe IED</title>
</head>
<body>

    <div class="contenedor">

        <?php include('header.php'); ?>

        <nav>

            <label for="btn-menu" class="icon-view-list"></label>
            <input type="checkbox" id="btn-menu" class="icono">

            <div class="menu">
                <ul>
                    <li><a href="../" class="botones"><span class="icon-undo"></span>Volver</a></li>
                    <li><a href="crear-curso.php" class="botones"><span class="icon-folder-plus"></span>Crear Curso</a></li>
                    <li><a href="actualizar-curso.php" class="botones"><span class="icon-spinner11"></span>Actualizar Curso</a></li>
                    <li><a href="#" class="botones activo"><span class="icon-search"></span>Consultar Curso</a></li>
                    <li><a href="inactivar-curso.php" class="botones"><span class="icon-folder-minus"></span>Inactivar Curso</a></li>
                </ul>
            </div>
        </nav>

        <div class="contenido">
            
            <h1>Consultar curso</h1>
        
            <form action="inactivar-curso.php">

                <div class="inputs">
                    <label for="id">Número de identificación:</label><br>
                    <input type="number" name="id" id="id" placeholder="Número de identificacion "class="recolectores" required>
                </div>

                <div class="inputs">
                    <center>
                        <input type="reset" value="Limpiar" class="boton secundario">
                        <input type="submit" value="Consultar"  class="boton primario">
                    </center>
                </div>

            </form>
        </div>

        <?php include('footer.php'); ?>

    </div>

    <script src="../js/configuraciones.js"></script>
</body>
</html>