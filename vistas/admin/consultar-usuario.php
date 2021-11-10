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
    <meta name="description" content="Consultar usuario en el Colegio Rafael Uribe Uribe (IED) Localidad 19 Bogotá - Ciudad Bolívar.">
    <meta name="keywords" content="Colegio Rafael Uribe Uribe, Colegio, Educacion, Rafael Uribe, Colegios ciudad Bolívar, consultar usuario">
    <link rel="stylesheet" href="../css/todos/index.css">
    <link rel="stylesheet" href="../css/todos/formularios.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="shortcut icon" href="../imagenes/escudo.jpg">
    <title>Consultar usuario | Colegio Rafael Uribe Uribe IED</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="../js/alertas.js"></script>
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
                
                    <li><a href="#" class="botones activo"><span class="icon-search"></span>Consultar usuario</a></li>
                
                    <li><a href="inactivar-usuario.php" class="botones"><span class="icon-user-minus"></span>Inactivar usuario</a></li>
                    
                </ul>
            </div>
        </nav>

        <div class="contenido">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

                <h1>Consultar Usuario</h1>

                        <div class="inputs"> 
                            <b><label for="rol">Rol del usuario:</label></b><br>
                            <select name="rol" id="rol" class="recolectores" required>
                                <option value="">Selecionar opción</option>
                                <option <?php if(isset($rol)){if($rol == 3){echo 'selected';}} ?> value="3">Estudiante</option>
                                <option <?php if(isset($rol)){if($rol == 2){echo 'selected';}} ?> value="2">Profesor</option>
                                <option <?php if(isset($rol)){if($rol == 1){echo 'selected';}} ?> value="1">Administrador</option>
                            </select>
                        </div>

                        <div class="inputs">
                            <b><label for="documento">Número de identificación:</label></b><br>
                            <input type="number" name="documento" id="documento" placeholder="Número de identificacion "class="recolectores" required>
                        </div>

                        <div class="inputs">
                            <center>
                                <input type="submit" value="Limpiar" class="boton secundario" onclick="window.location='consultar-usuario.php'">
                                <input type="submit" value="Consultar" class="boton primario">
                            </center>
                        </div>
                    
                        <?php include('../../controladores/consultarUsuario.php'); ?>
            </form>

        </div>

        <?php include('footer.php'); ?>

    </div>

    <script src="../js/configuraciones.js"></script>
    <script src="../js/alertas.js"></script>
</body>
</html>