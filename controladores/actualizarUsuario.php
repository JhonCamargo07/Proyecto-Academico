<?php
    require_once('validacion.php');
    require_once('../../modelos/usuario.php');
    $modeloUsuario = new Usuario();
    if(isset($_POST['consultar'])){ // Si envian el formulario, crea unas variables con los datos que envien.
        // Con la funcion 'limpiarTexto', quitamos los caracteres restingidos y los posibles espacios que pueda haber al inicio y al final de la cadena.
        $rol = limpiarTexto($_POST['rol']);
        $documento = limpiarTexto($_POST['documento']);

        if(campoNull($rol) || campoNull($documento)){
            echo '<script language="javascript">
                    alertaError();
                </script>';
        }else{
            // Verificar cual es el rol del usuario al que se desea actualizar
            if($rol == 3){
                require_once('../../modelos/estudiante.php');
                $modelo = new Estudiante();
                $entrada = $modelo->consultarEstudiante($documento);
            }elseif($rol == 2){
                require_once('../../modelos/profesor.php');
                $modelo = new Profesor();
                $entrada = $modelo->consultarProfesor($documento);
            }elseif($rol == 1){
                require_once('../../modelos/adminAcademico.php');
                $modelo = new AdminAcademico();
                $entrada = $modelo->consultarAdminAcademico($documento);
            }else{
                echo '<script language="javascript">
                        alertaError();
                    </script>';
            }

            // Si lo que devuelve la función es false, lo redireciona a login
            if($entrada == false){
                echo '<script>
                        alertaError();
                    </script>';
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
            }else{
                if($rol == 3){
?>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <input type="hidden" name="rol" value="3">
                        <input type="hidden" name="IDUsuario" value="<?php echo $entrada['IDUsuarioPK'] ?>">
                        <input type="hidden" name="IDEstudiante" value="<?php echo $entrada['IDEstudiantePK'] ?>">

                        <div class="inputs">
                            <b><label for="">Nombre:</label></b>
                            <input type="text" name="nombre" class="recolectores" value="<?php echo $entrada['NombreEstudiante'] ?>">
                        </div>

                        <div class="inputs">
                            <b><label for="">Apellido:</label></b>
                            <input type="text" name="apellido" class="recolectores" value="<?php echo $entrada['ApellidoEstudiante'] ?>">
                        </div>

                        <div class="inputs">
                            <b><label for="">Número de documento:</label></b>
                            <input type="text" name="documento" class="recolectores" value="<?php echo $entrada['DocEstudiante']; ?>">
                        </div>

                        <div class="inputs">
                            <b><label for="estado">Estado del estudiante:</label></b>
                            <select name="estado" id="estado" class="recolectores" required>
                                <option value="1" <?php if($entrada['EstadoUsuario'] == 1){echo "selected";} ?> >Activo</option>
                                <option value="2" <?php if($entrada['EstadoUsuario'] == 2){echo "selected";} ?> >Inactivo</option>
                            </select>
                        </div>

                        <div class="inputs">
                            <b><label for="new_rol">Rol:</label></b>
                            <select name="new_rol" id="new_rol" class="recolectores" required>
                                <option <?php if($entrada['Rol'] == 3){echo "selected";} ?> value="3">Estudiante</option>
                                <option <?php if($entrada['Rol'] == 2){echo "selected";} ?> value="2">Profesor</option>
                                <option <?php if($entrada['Rol'] == 1){echo "selected";} ?> value="1">Administrador</option>
                            </select>
                        </div>

                        <div class="inputs">
                            <b><label for="sexo">Sexo:</label></b>
                            <select name="sexo" id="sexo" class="recolectores" required>
                                <option <?php if($entrada['SexoUsuario'] == 1){echo "selected";} ?> value="1">Hombre</option>
                                <option <?php if($entrada['SexoUsuario'] == 2){echo "selected";} ?> value="2">Mujer</option>
                                <option <?php if($entrada['SexoUsuario'] == 3){echo "selected";} ?> value="3">Indefinido</option>
                            </select>
                        </div>
                        
                        <div class="inputs">
                            <b><label for="">Correo:</label></b>
                            <input type="text" name="email" class="recolectores" value="<?php echo $entrada['Email']; ?>">
                        </div>

                        <div class="inputs">
                            <b><label for="">Usuario</label></b>
                            <input type="text" name="usuario" class="recolectores" value="<?php echo $entrada['Usuario']; ?>">
                        </div>

                        <div class="inputs">
                    <b><label for="password">Contraseña:</label></b>
                    <input type="password" name="password" id="password" placeholder="Contraseña segura" title="Escriba una contraseña que sea segura." class="recolectores" required>
                    <span class="icon-eye-blocked eye" id="icono1"></span>
                </div>

                        <div class="inputs">
                            <center>
                                
                                <input type="submit" value="Actualizar" name="actualizar" class="boton primario">
                            </center>
                        </div>
                    </form>
<?php
                }elseif($rol == 2){
?>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <input type="hidden" name="rol" value="2">
                        <input type="hidden" name="IDUsuario" value="<?php echo $entrada['IDUsuarioPK'] ?>">
                        <input type="hidden" name="IDProfesor" value="<?php echo $entrada['IDProfesorPK'] ?>">

                        <div class="inputs">
                            <b><label for="">Nombre:</label></b>
                            <input type="text" name="nombre" class="recolectores" value="<?php echo $entrada['NombreProfesor'] ?>">
                        </div>

                        <div class="inputs">
                            <b><label for="">Apellido:</label></b>
                            <input type="text" name="apellido" class="recolectores" value="<?php echo $entrada['ApellidoProfesor'] ?>">
                        </div>

                        <div class="inputs">
                            <b><label for="">Número de documento:</label></b>
                            <input type="text" name="documento" class="recolectores" value="<?php echo $entrada['DocProfesor']; ?>">
                        </div>

                        <div class="inputs">
                            <b><label for="">Especialidad:</label></b>
                            <input type="text" name="especialidad" class="recolectores" value="<?php echo $entrada['EspecialidadProfesor']; ?>">
                        </div>

                        <div class="inputs">
                            <b><label for="estado">Estado del estudiante:</label></b>
                            <select name="estado" id="estado" class="recolectores" required>
                                <option value="1" <?php if($entrada['EstadoUsuario'] == 1){echo "selected";} ?> >Activo</option>
                                <option value="2" <?php if($entrada['EstadoUsuario'] == 2){echo "selected";} ?> >Inactivo</option>
                            </select>
                        </div>

                        <div class="inputs">
                            <b><label for="new_rol">Rol:</label></b>
                            <select name="new_rol" id="new_rol" class="recolectores" required>
                                <option <?php if($entrada['Rol'] == 3){echo "selected";} ?> value="3">Estudiante</option>
                                <option <?php if($entrada['Rol'] == 2){echo "selected";} ?> value="2">Profesor</option>
                                <option <?php if($entrada['Rol'] == 1){echo "selected";} ?> value="1">Administrador</option>
                            </select>
                        </div>

                        <div class="inputs">
                            <b><label for="sexo">Sexo:</label></b>
                            <select name="sexo" id="sexo" class="recolectores" required>
                                <option <?php if($entrada['SexoUsuario'] == 1){echo "selected";} ?> value="1">Hombre</option>
                                <option <?php if($entrada['SexoUsuario'] == 2){echo "selected";} ?> value="2">Mujer</option>
                                <option <?php if($entrada['SexoUsuario'] == 3){echo "selected";} ?> value="3">Indefinido</option>
                            </select>
                        </div>
                        
                        <div class="inputs">
                            <b><label for="">Correo:</label></b>
                            <input type="text" name="email" class="recolectores" value="<?php echo $entrada['Email']; ?>">
                        </div>

                        <div class="inputs">
                            <b><label for="">Usuario</label></b>
                            <input type="text" name="usuario" class="recolectores" value="<?php echo $entrada['Usuario']; ?>">
                        </div>

                        <div class="inputs">
                            <b><label for="password">Contraseña:</label></b>
                            <input type="password" name="password" id="password" placeholder="Contraseña segura" title="Escriba una contraseña que sea segura." class="recolectores" required>
                            <span class="icon-eye-blocked eye" id="icono1"></span>
                        </div>

                        <div class="inputs">
                            <center>
                                
                                <input type="submit" value="Actualizar" name="actualizar" class="boton primario">
                            </center>
                        </div>
                    </form>
<?php
                }elseif($rol == 1){
?>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <input type="hidden" name="rol" value="1">
                        <input type="hidden" name="IDCargo" value="<?php echo $entrada['IDCargoPK'] ?>">
                        <input type="hidden" name="IDUsuario" value="<?php echo $entrada['IDUsuarioPK'] ?>">
                        <input type="hidden" name="IDAdmin" value="<?php echo $entrada['IDAdminAcademicoPK'] ?>">

                        <div class="inputs">
                            <b><label for="">Nombre:</label></b>
                            <input type="text" name="nombre" class="recolectores" value="<?php echo $entrada['NombreAdmin'] ?>">
                        </div>

                        <div class="inputs">
                            <b><label for="">Apellido:</label></b>
                            <input type="text" name="apellido" class="recolectores" value="<?php echo $entrada['ApellidoAdmin'] ?>">
                        </div>

                        <div class="inputs">
                            <b><label for="">Número de documento:</label></b>
                            <input type="text" name="documento" class="recolectores" value="<?php echo $entrada['DocAdmin']; ?>">
                        </div>

                        <div class="inputs">
                            <b><label for="">Cargo:</label></b>
                            <input type="text" name="cargo" class="recolectores" value="<?php echo $entrada['NombreCargo']; ?>">
                        </div>

                        <div class="inputs">
                            <b><label for="estado">Estado del estudiante:</label></b>
                            <select name="estado" id="estado" class="recolectores" required>
                                <option value="1" <?php if($entrada['EstadoUsuario'] == 1){echo "selected";} ?> >Activo</option>
                                <option value="2" <?php if($entrada['EstadoUsuario'] == 2){echo "selected";} ?> >Inactivo</option>
                            </select>
                        </div>

                        <div class="inputs">
                            <b><label for="new_rol">Rol:</label></b>
                            <select name="new_rol" id="new_rol" class="recolectores" required>
                                <option <?php if($entrada['Rol'] == 3){echo "selected";} ?> value="3">Estudiante</option>
                                <option <?php if($entrada['Rol'] == 2){echo "selected";} ?> value="2">Profesor</option>
                                <option <?php if($entrada['Rol'] == 1){echo "selected";} ?> value="1">Administrador</option>
                            </select>
                        </div>

                        <div class="inputs">
                            <b><label for="sexo">Sexo:</label></b>
                            <select name="sexo" id="sexo" class="recolectores" required>
                                <option <?php if($entrada['SexoUsuario'] == 1){echo "selected";} ?> value="1">Hombre</option>
                                <option <?php if($entrada['SexoUsuario'] == 2){echo "selected";} ?> value="2">Mujer</option>
                                <option <?php if($entrada['SexoUsuario'] == 3){echo "selected";} ?> value="3">Indefinido</option>
                            </select>
                        </div>
                        
                        <div class="inputs">
                            <b><label for="">Correo:</label></b>
                            <input type="text" name="email" class="recolectores" value="<?php echo $entrada['Email']; ?>">
                        </div>

                        <div class="inputs">
                            <b><label for="">Usuario</label></b>
                            <input type="text" name="usuario" class="recolectores" value="<?php echo $entrada['Usuario']; ?>">
                        </div>

                        <div class="inputs">
                            <b><label for="password">Contraseña:</label></b>
                            <input type="password" name="password" id="password" placeholder="Contraseña segura" title="Escriba una contraseña que sea segura." class="recolectores" required>
                            <span class="icon-eye-blocked eye" id="icono1"></span>
                        </div>

                        <div class="inputs">
                            <center>
                                
                                <input type="submit" value="Actualizar" name="actualizar" class="boton primario">
                            </center>
                        </div>
                    </form>
<?php
                }
            }
        }
    }
    if(isset($_POST['actualizar'])){
        $rol = limpiarTexto($_POST['rol']);
        $IDUsuario = limpiarTexto($_POST['IDUsuario']);
        $nombre = limpiarTexto($_POST['nombre']);
        $apellido = limpiarTexto($_POST['apellido']);
        $documento = limpiarTexto($_POST['documento']);
        $usuario = limpiarTexto($_POST['usuario']);
        $password = limpiarTexto($_POST['password']);
        $sexo = limpiarTexto($_POST['sexo']);
        $email = limpiarTexto($_POST['email']);
        $new_rol = limpiarTexto($_POST['new_rol']);
        $estado = limpiarTexto($_POST['estado']);

        // Con el siguiente codigo buscamos obtener solo el primer nombre en caso de que lo haya para que concuerde con el campo de la tabla usuario
        if(strpos($nombre, " ")){ // Si en el string hay espacios entonces hace lo que este dentro del if
            $primerNombre = substr($nombre, 0, strpos($nombre, " ")); // Obtener el valor desde la posicion 0 hasta que haya un espacio
        }else{
            $primerNombre = $nombre; // Si no hay espacios en el string, guarda el mismo valor sin modificar nada
        }

        // Con el siguiente codigo buscamos obtener solo el primer apellido en caso de que lo haya para que concuerde con el campo de la tabla usuario
        if(strpos($apellido, " ")){
            $primerApellido = substr($apellido, 0, strpos($apellido, " "));
        }else{
            $primerApellido = $apellido;
        }

        if(campoNull($rol)){
            echo '<script language="javascript">
                    alertaError();
                </script>';
        }else{
            // Verificar cual es el rol del usuario al que se desea actualizar
            if($rol == 3){
                $IDEstudiante = limpiarTexto($_POST['IDEstudiante']);
                require_once('../../modelos/estudiante.php');
                $modelo = new Estudiante();
                $modeloUsuario->updateUsuario($usuario, $password, $primerNombre, $primerApellido, $sexo, $email, $new_rol, $estado, $IDUsuario);
                $modelo->updateEstudiante($nombre, $apellido, $documento, $IDEstudiante);
            }elseif($rol == 2){
                $especialidad = limpiarTexto($_POST['especialidad']);
                $IDProfesor = limpiarTexto($_POST['IDProfesor']);
                require_once('../../modelos/profesor.php');
                $modelo = new Profesor();
                $modeloUsuario->updateUsuario($usuario, $password, $primerNombre, $primerApellido, $sexo, $email, $new_rol, $estado, $IDUsuario);
                $modelo->updateProfesor($nombre, $apellido, $documento, $especialidad, $IDProfesor);
            }elseif($rol == 1){
                $cargo = limpiarTexto($_POST['cargo']);
                $IDAdmin = limpiarTexto($_POST['IDAdmin']);
                $IDCargo = limpiarTexto($_POST['IDCargo']);
                require_once('../../modelos/adminAcademico.php');
                require_once('../../modelos/cargo.php');
                $modelo = new AdminAcademico();
                $modeloCargo = new Cargo();
                $modeloUsuario->updateUsuario($usuario, $password, $primerNombre, $primerApellido, $sexo, $email, $new_rol, $estado, $IDUsuario);
                $modeloCargo->updateCargo($cargo, $IDCargo);
                $modelo->updateAdmin($nombre, $apellido, $documento, $IDAdmin);
            }else{
                echo '<script language="javascript">
                        alertaError();
                    </script>';
            }    
        }
    }
?>