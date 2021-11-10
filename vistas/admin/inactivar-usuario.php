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
    <meta name="description" content="Inactivar usuario en el Colegio Rafael Uribe Uribe (IED) Localidad 19 Bogotá - Ciudad Bolívar.">
    <meta name="keywords" content="Colegio Rafael Uribe Uribe, Colegio, Educacion, Rafael Uribe, Colegios ciudad Bolívar">
    <link rel="stylesheet" href="../css/todos/index.css">
    <link rel="stylesheet" href="../css/todos/formularios.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="shortcut icon" href="../imagenes/escudo.jpg"> 
    <title>Inactivar usuario | Colegio Rafael Uribe Uribe IED</title>
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
                        
                    <li><a href="crear-usuario.php" class="botones"><span class="icon-user-plus"></span>Crear usuario</a></li>
                
                    <li><a href="actualizar-usuario.php" class="botones"><span class="icon-spinner11"></span>Actualizar usuario</a></li>
                
                    <li><a href="consultar-usuario.php" class="botones"><span class="icon-search"></span>Consultar usuario</a></li>
                
                    <li><a href="#" class="botones activo"><span class="icon-user-minus"></span>Inactivar usuario</a></li>
                        
                </ul>
            </div>
        </nav>

        <div class="contenido">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

                <h1>Inactivar Usuario</h1>

                <div class="inputs">
                    <b><label for="nombre-usuario">Nombre de usuario:</label></b><br>
                    <input type="text" name="nombre-usuario" id="nombre-usuario" placeholder="Nombre de usuario "class="recolectores" required>
                </div>

                <div class="inputs">

                    <center>
                        <input type="reset" value="Limpiar" class="boton secundario">
                        <input type="submit" value="Inactivar"  class="boton primario">
                    </center>

                </div>

                <?php include('../../controladores/inactivarUsuario.php'); ?>

            </form>
        </div>

        <?php include('footer.php'); ?>

    </div>

    <script src="../js/configuraciones.js"></script>
</body>
</html>