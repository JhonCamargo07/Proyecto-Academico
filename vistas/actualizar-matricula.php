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
    <meta name="description" content="Actualizar matricula para el Colegio Rafael Uribe Uribe (IED) Localidad 19 Bogotá - Ciudad Bolívar.">
    <meta name="keywords" content="Colegio Rafael Uribe Uribe, Colegio, Educacion, Rafael Uribe, Colegios ciudad Bolívar">
    <link rel="stylesheet" href="css/todos/index.css">
    <link rel="stylesheet" href="css/todos/formularios.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="shortcut icon" href="imagenes/escudo.jpg">
    <title>Actualizar Matrícula | Colegio Rafael Uribe Uribe IED</title>
</head>
<body>
    <div class="contenedor">
        
        <header>
            <img src="imagenes/simbolos.png" loading="lazy" alt="Escudo y bandera del colegio Rafael Uribe Uribe">
            <h1>Colegio Rafael Uribe Uribe</h1>
        </header>

        <nav>
            <label for="btn-menu" class="icon-view-list"></label>
            <input type="checkbox" id="btn-menu" class="icono">

            <div class="menu">
                <ul>
                        
                <li><a href="menu.php" class="botones"><span class="icon-undo"></span>Volver</a></li>
                        
                    <li><a href="crear-matricula.php" class="botones"><span class="icon-file-text"></span>Crear Matricula</a></li>
                
                    <li><a href="#" class="botones activo"><span class="icon-spinner11"></span>Actualizar Matricula</a></li>
                
                    <li><a href="consultar-matricula.php" class="botones"><span class="icon-search"></span>Consultar Matricula</a></li>
                
                    <li><a href="inactivar-matricula.php" class="botones"><span class="icon-blocked"></span>Inactivar Matricula</a></li>
                        
                </ul>
            </div>
        </nav>

        <div class="contenido">
            <form action="actualizar-usuario.php" method="POST">

                <h1>Actualizar Matricula</h1>

                <div class="inputs">

                    <label for="id">Número de identificación:</label><br>
                    <input type="number" name="id" id="id" placeholder="Número de identificacion "class="recolectores" required>

                </div>

                <div class="inputs">

                    <center>
                        <input type="reset" value="Limpiar" class="boton secundario">
                        <input type="submit" value="Actualizar"  class="boton primario">
                    </center>

                </div>

            </form>

        </div>

        <footer class="footer-actualizar">
            <p>Todos los derechos reservados al Colegio Rafael Uribe Uribe | Copyright ©</p>
        </footer>

    </div>
</body>
</html>