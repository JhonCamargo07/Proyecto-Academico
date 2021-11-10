<?php
    require_once('../../modelos/login.php');
    $modeloLogin = new Login();
    $modeloLogin->validarSesion();
    $modeloLogin->validarRolAdmin();
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,  maximum-scale=1.0" user-scalable=no />
    <meta name="author" content="Jhon Camargo">
    <meta name="description" content="Crear usuario en el Colegio Rafael Uribe Uribe (IED) Localidad 19 Bogotá - Ciudad Bolívar.">
    <meta name="keywords" content="Crear usuario Colegio Rafael Uribe Uribe, Colegio, Educacion, Rafael Uribe, Colegios ciudad Bolívar">
    <link rel="stylesheet" href="../css/todos/index.css">
    <link rel="stylesheet" href="../css/todos/formularios.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="shortcut icon" href="../imagenes/escudo.jpg">
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
                
                    <li><a href="../" class="botones"><span class="icon-undo"></span>Volver</a></li>
                
                    <li><a class="botones activo"><span class="icon-user-plus"></span>Crear usuario</a></li>
                
                    <li><a href="actualizar-usuario.php" class="botones"><span class="icon-spinner11"></span>Actualizar usuario</a></li>
                
                    <li><a href="consultar-usuario.php" class="botones"><span class="icon-search"></span>Consultar usuario</a></li>
                
                    <li><a href="inactivar-usuario.php" class="botones"><span class="icon-user-minus"></span>Inactivar usuario</a></li>
                
                </ul>
            </div>

        </nav>

        <div class="contenido">

            <?php require('../../controladores/AgregarEstudiante.php'); ?>
            <?php require('../../controladores/AgregarProfesor.php'); ?>
            <?php require('../../controladores/AgregarAdmin.php'); ?>

            <h1>Registro de usuarios</h1>

            <div class="inputs">
                
                    <b><label for="rol">Rol del nuevo usuario:</label><br></b>
                    <select name="rol" id="rol" class="recolectores" required onChange="mostrar(this.value)">
                        <option value="">Selecionar opción</option>
                        <option <?php echo isset($rolE) ? 'selected' : ''; ?> value="estudiante">Estudiante</option>
                        <option <?php echo isset($rolP) ? 'selected' : ''; ?> value="profesor">Profesor</option>
                        <option <?php echo isset($rolA) ? 'selected' : ''; ?> value="administrador">Administrador</option>
                    </select>
                
            </div>

            <!-------------------------------------------------------------->
                        <!----------------- Formulario para estudiante ---------------------->
            <!-------------------------------------------------------------->
            <div class="estudiante" id="estudiante">

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

                    <input type="hidden" name="rol-estudiante" value="3">
                
                    <div class="inputs">
                        <b><label for="nombres-estudiante">Nombres:</label></b>
                        <input type="text" name="nombres-estudiante" id="nombres-estudiante" placeholder="Nombres del estudiante" title="Solo los nombres del estudiante. Minimo 2 caracteres y maximo 30. No se aceptan números." class="recolectores" value="<?php if(isset($nombreE)){ echo $nombreE;}?>" required pattern="[a-zA-ZÁ-ÿá-ÿé ]{2,30}">
                    </div>
                    
                    <div class="inputs">
                        <b><label for="apellidos-estudiante">Apellidos:</label></b>
                        <input type="text" name="apellidos-estudiante" id="apellidos-estudiante" placeholder="Apellidos del estudiante" title="Solo los apellidos del estudiante. Minimo 2 caracteres y maximo 30. No se aceptan números." class="recolectores" value="<?php if(isset($apellidoE)){ echo $apellidoE;}?>" required pattern="[a-zA-ZÁ-ÿá-ÿ ]{2,50}">
                    </div>
                    
                    <div class="inputs">
                        <b><label for="documento-estudiante">Número de documento:</label></b>
                        <input type="number" name="documento-estudiante" id="documento-estudiante" placeholder="Número de identificacion "class="recolectores" title="Número de identificacion, Minimo 5 caracteres y maximo 30. No se aceptan letras" value="<?php if(isset($documentoE)){ echo $documentoE;}?>" required pattern="[1-9]{5,20}">
                    </div>

                    <div class="inputs">
                        <b><label for="estado-Estudiante">Estado del estudiante:</label></b>
                        <select name="estadoEstudiante" id="estadoEstudiante" class="recolectores" required>
                            <option <?php if(isset($estadoE)){if($estadoE == 1){echo "Selected";}} ?> value="1">Activo</option>
                            <option <?php if(isset($estadoE)){if($estadoE == 2){echo "Selected";}} ?> value="2">Inactivo</option>
                        </select>
                    </div>

                    <div class="inputs">
                        <b><label for="sexoEstudiante">Sexo:</label></b>
                        <select name="sexoEstudiante" id="sexoEstudiante" class="recolectores" required>
                            <option <?php if(isset($sexoE)){if($sexoE == 1){echo "Selected";}} ?> value="1">Hombre</option>
                            <option <?php if(isset($sexoE)){if($sexoE == 2){echo "Selected";}} ?> value="2">Mujer</option>
                            <option <?php if(isset($sexoE)){if($sexoE == 3){echo "Selected";}} ?> value="3">Indefinido</option>
                        </select>
                    </div>

                    <div class="inputs">
                        <b><label for="correo-estudiante">Correo:</label></b>
                        <input type="email" name="correo-estudiante" id="correo-estudiante" placeholder="Correo del estudiante" title="Escribir el correo del estudiante. Minimo 3 caracteres y maximo 30" class="recolectores" value="<?php if(isset($correoE)){ echo $correoE;}?>" required>
                    </div>

                    <div class="inputs">
                        <b><label for="usuario-estudiante">Usuario:</label></b>
                        <input type="text" name="usuario-estudiante" id="usuario-estudiante" placeholder="Nombre de usuario" title="Escribir un usuario que logre recordar." class="recolectores" value="<?php if(isset($usuarioE)){ echo $usuarioE;}?>" required>
                    </div>

                    <div class="inputs">
                        <b><label for="password-estudiante">Contraseña:</label></b>
                        <input type="password" name="password-estudiante" id="password-estudiante" placeholder="Contraseña segura" title="Escriba una contraseña que sea segura." class="recolectores" value="<?php if(isset($passwordE)){ echo $passwordE;}?>" required>
                        <span class="icon-eye-blocked eye" id="icono1"></span>
                    </div>
                    
                    <div class="inputs">
                        <center>
                            <a href="../generadorPasswords.php" target="_blanck" class="boton secundario password">Generar contraseña</a>
                            <input type="reset" value="Limpiar" class="boton secundario">
                            <input type="submit" value="Registrar" name="registrar-estudiante" class="boton primario">
                        </center>
                    </div>
                
                </form>
                    
            </div>

            <!-------------------------------------------------------------->
                        <!----------------- Formulario para profesor ---------------------->
            <!-------------------------------------------------------------->
            <div class="estudiante" id="profesor">
            
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

                    <input type="hidden" name="rol-profesor" value="2">
                
                    <div class="inputs">
                        <b><label for="nombres-profesor">Nombres:</label></b>
                        <input type="text" name="nombres-profesor" id="nombres-profesor" placeholder="Nombres del profesor" title="Solo los nombres del profesor." class="recolectores" value="<?php if(isset($nombreP)){ echo $nombreP;} ?>" required>
                    
                    </div>
                    
                    <div class="inputs">
                        <b><label for="apellidos-profesor">Apellidos:</label></b>
                        <input type="text" name="apellidos-profesor" id="apellidos-profesor" placeholder="Apellidos del profesor" title="Solo los apellidos del profesor." value="<?php if(isset($apellidoP)){ echo $apellidoP;} ?>" class="recolectores" required>
                    </div>
                    
                    <div class="inputs">
                        <b><label for="documento-profesor">Número de documento:</label></b>
                        <input type="number" name="documento-profesor" id="documento-profesor" placeholder="Número de identificacion "class="recolectores" value="<?php if(isset($documentoP)){ echo $documentoP;} ?>" required>
                    </div>

                    <div class="inputs">
                        <b><label for="especialidad-profesor">Especialidad del profesor:</label></b>
                        <input type="text" name="especialidad-profesor" id="especialidad-profesor" placeholder="Especialidad"class="recolectores" value="<?php if(isset($especialidadP)){ echo $especialidadP;} ?>" required>
                    </div>

                    <div class="inputs">
                        <b><label for="estadoprofesor">Estado del profesor:</label></b>
                        <select name="estadoProfesor" id="EstadoProfesor" class="recolectores" required>
                            <option <?php if(isset($estadoP)){if($estadoP == 1){echo "Selected";}} ?> value="1">Activo</option>
                            <option <?php if(isset($estadoP)){if($estadoP == 2){echo "Selected";}} ?> value="2">Inactivo</option>
                        </select>
                    </div>

                    <div class="inputs">
                        <b><label for="sexoEstudiante">Sexo:</label></b>
                        <select name="sexoProfesor" id="sexoProfesor" class="recolectores" required>
                            <option <?php if(isset($sexoP)){if($sexoP == 1){echo "Selected";}} ?> value="1">Hombre</option>
                            <option <?php if(isset($sexoP)){if($sexoP == 2){echo "Selected";}} ?> value="2">Mujer</option>
                            <option <?php if(isset($sexoP)){if($sexoP == 3){echo "Selected";}} ?> value="3">Indefinido</option>
                        </select>
                    </div>

                    <div class="inputs">
                        <b><label for="correo-profesor">Correo:</label></b>
                        <input type="email" name="correo-profesor" id="correo-profesor" placeholder="Correo del estudiante" title="Escribir el correo del profesor. Minimo 3 caracteres y maximo 30" class="recolectores" value="<?php if(isset($correoP)){ echo $correoP;} ?>" required>
                    </div>

                    <div class="inputs">
                        <b><label for="usuario-profesor">Usuario:</label></b>
                        <input type="text" name="usuario-profesor" id="usuario-profesor" placeholder="Nombre de usuario" title="Escribir un usuario que logre recordar." class="recolectores" value="<?php if(isset($usuarioP)){ echo $usuarioP;} ?>" required>
                    </div>

                    <div class="inputs">
                        <b><label for="password-profesor">Contraseña:</label></b>
                        <input type="password" name="password-profesor" id="password-profesor" placeholder="Contraseña segura" title="Escriba una contraseña segura." class="recolectores" value="<?php if(isset($passwordP)){ echo $passwordP;} ?>" required>
                        <span class="icon-eye-blocked eye" id="icono2"></span>
                    </div>
                    
                    <div class="inputs">
                        <center>
                            <a href="../generadorPasswords.php" target="_blanck" class="boton secundario password">Generar contraseña</a>
                            <input type="reset" value="Limpiar" class="boton secundario">
                            <input type="submit" value="Registrar" name="registrar-profesor" class="boton primario">
                        </center>
                    </div>
                
                </form>
                    
            </div>


            <!-------------------------------------------------------------->
                        <!----------------- Formulario para administrador ---------------------->
            <!-------------------------------------------------------------->
            <div class="administrador" id="administrador">
            
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

                    <input type="hidden" name="rol-admin" value="1">
                
                    <div class="inputs">
                        <b><label for="nombres-admin">Nombres:</label></b>
                        <input type="text" name="nombres-admin" id="nombres-admin" placeholder="Nombres del administrador" title="Solo los nombres del administrador." class="recolectores" value="<?php if(isset($nombreA)){ echo $nombreA;} ?>" required>
                    </div>
                    
                    <div class="inputs">
                        <b><label for="apellidos-admin">Apellidos:</label></b>
                        <input type="text" name="apellidos-admin" id="apellidos-admin" placeholder="Apellidos del administrador" title="Solo los apellidos del administrador." class="recolectores" value="<?php if(isset($apellidoA)){ echo $apellidoA;} ?>" required>
                    </div>
                    
                    <div class="inputs">
                        <b><label for="documento-admin">Documento del administrador:</label></b>
                        <input type="number" name="documento-admin" id="documento-admin" placeholder="Número de identificacion"class="recolectores" value="<?php if(isset($documentoA)){ echo $documentoA;} ?>" required>
                    </div>
                    
                    <div class="inputs">
                        <b><label for="cargo-admin">Cargo:</label></b>
                        <input type="text" name="cargo-admin" id="cargo-admin" placeholder="Cargo del administrador" title="Escriba el cargo que hará el administrador" class="recolectores" value="<?php if(isset($cargoA)){echo $cargoA;} ?>" required>
                    </div>

                    <div class="inputs">
                        <b><label for="estadoAdmin">Estado del administrador:</label></b>
                        <select name="estadoAdmin" id="EstadoAdmin" class="recolectores" required>
                            <option <?php if(isset($estadoA)){if($estadoA == 1){echo "Selected";}} ?> value="1">Activo</option>
                            <option <?php if(isset($estadoA)){if($estadoA == 2){echo "Selected";}} ?> value="2">Inactivo</option>
                        </select>
                    </div>
                    
                    <div class="inputs">
                        <b><label for="sexoAdmin">Sexo:</label></b>
                        <select name="sexoAdmin" id="sexoAdmin" class="recolectores" required>
                            <option <?php if(isset($sexoA)){if($sexoA == 1){echo "Selected";}} ?> value="1">Hombre</option>
                            <option <?php if(isset($sexoA)){if($sexoA == 2){echo "Selected";}} ?> value="2">Mujer</option>
                            <option <?php if(isset($sexoA)){if($sexoA == 3){echo "Selected";}} ?> value="3">Indefinido</option>
                        </select>
                    </div>

                    <div class="inputs">
                        <b><label for="correo-admin">Correo:</label></b>
                        <input type="email" name="correo-admin" id="correo-admin" placeholder="Correo del estudiante" title="Escribir el correo del administrador. Minimo 3 caracteres y maximo 30" class="recolectores" value="<?php if(isset($correoA)){ echo $correoA;} ?>" required>
                    </div>

                    <div class="inputs">
                        <b><label for="usuario-admin">Usuario:</label></b>
                        <input type="text" name="usuario-admin" id="usuario-admin" placeholder="Nombre de usuario" title="Escribir un usuario que logre recordar." class="recolectores" value="<?php if(isset($usuarioA)){echo $usuarioA;} ?>" required>
                    </div>

                    <div class="inputs">
                        <b><label for="password-admin">Contraseña:</label></b>
                        <input type="password" name="password-admin" id="password-admin" placeholder="Contraseña segura" title="Escribe una contraseña segura." class="recolectores" value="<?php if(isset($passwordA)){ echo $passwordA;} ?>" required>
                        <span class="icon-eye-blocked eye" id="icono3"></span>
                    </div>

                    <div class="inputs">
                        <center>
                            <a href="../generadorPasswords.php" target="_blanck" class="boton secundario password">Generar contraseña</a>
                            <input type="reset" value="Limpiar" class="boton secundario">
                            <input type="submit" value="Registrar" name="registrar-admin" class="boton primario">
                        </center>
                    </div>
                
                </form>
                
            </div>

        </div>

        <?php include('footer.php'); ?>

    </div>

    <script src="../js/jquery.js"></script>
    <script src="../js/registro.js"></script>
    <script src="../js/viewPassword.js"></script>
    <script src="../js/configuraciones.js"></script>
</body>
</html>