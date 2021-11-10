<?php
    require_once('../../modelos/login.php');
    $modeloLogin = new Login();
    $modeloLogin->validarSesion();
    $modeloLogin->validarRolAdmin();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Actualizar usuario | Colegio Rafael Uribe Uribe IED</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,  maximum-scale=1.0" user-scalable=no />
    <meta name="author" content="Jhon Camargo">
    <meta name="description" content="Actualizar usuario para el Colegio Rafael Uribe Uribe (IED) Localidad 19 Bogotá - Ciudad Bolívar.">
    <meta name="keywords" content="Colegio Rafael Uribe Uribe, Colegio, Educacion, Rafael Uribe, Colegios ciudad Bolívar">
    <link rel="stylesheet" href="../css/todos/index.css">
    <link rel="stylesheet" href="../css/todos/formularios.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="shortcut icon" href="../imagenes/escudo.jpg">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../vistas/js/alertas.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
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
                
                    <li><a href="#" class="botones activo"><span class="icon-spinner11"></span>Actualizar usuario</a></li>
                
                    <li><a href="consultar-usuario.php" class="botones"><span class="icon-search"></span>Consultar usuario</a></li>
                
                    <li><a href="inactivar-usuario.php" class="botones"><span class="icon-user-minus"></span>Inactivar usuario</a></li>
                        
                </ul>
            </div>
        </nav>

        <div class="contenido">
            <h1>Actualizar Usuario</h1>

            <?php
                    if(!$_POST){
                ?>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

                        <div class="inputs"> 
                            <b><label for="rol">Rol del usuario:</label></b><br>
                            <select name="rol" id="rol" class="recolectores" required>
                                <option value="">Selecionar opción</option>
                                <option value="3">Estudiante</option>
                                <option value="2">Profesor</option>
                                <option value="1">Administrador</option>
                            </select>
                        </div>

                        <div class="inputs">
                            <b><label for="documento">Número de identificación:</label></b><br>
                            <input type="number" name="documento" id="documento" placeholder="Número de identificacion" class="recolectores" required>
                        </div>

                        <div class="inputs">
                            <center>
                                <input type="reset" value="Limpiar" class="boton secundario">
                                <input type="submit" value="Consultar" name="consultar" class="boton primario">
                            </center>
                        </div>

                    </form>

            <?php
                    }
                include('../../controladores/actualizarUsuario.php'); 
            ?>
        </div>

        <?php include('footer.php'); ?>

    </div>
    
    <script src="../js/viewPassword.js"></script>
    <script src="../js/configuraciones.js"></script>
</body>
</html>