<?php
    require_once('validacion.php');
    if($_POST){
        $rol = limpiarTexto($_POST['rol']);
        $documento = limpiarTexto($_POST['documento']);
        if(campoNull($rol) || campoNull($documento)){
            echo '<script language="javascript">
                    alertaError();
                </script>';
        }else{
            if($rol == 3){
                require_once('../../modelos/estudiante.php');
                $modelo = new Estudiante();
                $funcion = "consultarEstudiante";
            }elseif($rol == 2){
                require_once('../../modelos/profesor.php');
                $modelo = new Profesor();
                $funcion = "consultarProfesor";
            }elseif($rol == 1){
                require_once('../../modelos/adminAcademico.php');
                $modelo = new AdminAcademico();
                $funcion = "consultarAdminAcademico";
            }else{
                echo '<script language="javascript">
                        alertaError();
                    </script>';
            }
            $entrada = $modelo->$funcion($documento);
            // Si lo que devuelve la función es false, lo redireciona a login
            if($entrada == false){
                echo '<script>
                        alert("error");
                    </script>';
            }else{
                if($rol == 3){
?>
                    <div>
                        <input type="hidden" class="recolectores formulario" value="<?php echo $entrada['IDEstudiantePK']; ?>" disabled>
                        
                        
                        <div class="inputs">
                            <b><label for="">Nombre:</label></b>
                            <input type="text" class="recolectores formulario" value="<?php echo $entrada['NombreEstudiante']?>" disabled>
                        </div>
                        
                        <div class="inputs">
                            <b><label for="">Apellido:</label></b>
                            <input type="text" class="recolectores formulario" value="<?php echo $entrada['ApellidoEstudiante']; ?>" disabled>
                        </div>
                        
                        <div class="inputs">
                            <b><label for="">Número de documento:</label></b>
                            <input type="text" class="recolectores formulario" value="<?php echo $entrada['DocEstudiante']; ?>" disabled>
                        </div>

                        <div class="inputs">
                            <b><label for="">Sexo:</label></b>
                            <input type="text" class="recolectores formulario" value="<?php if($entrada['SexoUsuario']==1){echo 'Hombre';}elseif($entrada['SexoUsuario']==2){echo 'Mujer';}else{echo 'Indefinido';}; ?>" disabled>
                        </div>

                        <div class="inputs">
                            <b><label for="">Estado:</label></b>
                            <input type="text" class="recolectores formulario" value="<?php echo $entrada['EstadoUsuario'] == 1? 'Activo' : 'Inactivo'; ?>" disabled>
                        </div>

                        <div class="inputs">
                            <b><label for="">Correo:</label></b>
                            <input type="text" class="recolectores formulario" value="<?php echo $entrada['Email']; ?>" disabled>
                        </div>

                        <div class="inputs">
                            <b><label for="">Usuario:</label></b>
                            <input type="text" class="recolectores formulario" value="<?php echo $entrada['Usuario']; ?>" disabled>
                        </div>

                    </div>
<?php
                }elseif($rol == 2){
?>
                <div>
                        <input type="hidden" class="recolectores formulario" value="<?php echo $entrada['IDProfesorPK']; ?>" disabled>
                        
                        
                        <div class="inputs">
                            <b><label for="">Nombre:</label></b>
                            <input type="text" class="recolectores formulario" value="<?php echo $entrada['NombreProfesor']?>" disabled>
                        </div>
                        
                        <div class="inputs">
                            <b><label for="">Apellido:</label></b>
                            <input type="text" class="recolectores formulario" value="<?php echo $entrada['ApellidoProfesor']; ?>" disabled>
                        </div>
                        
                        <div class="inputs">
                            <b><label for="">Número de documento:</label></b>
                            <input type="text" class="recolectores formulario" value="<?php echo $entrada['DocProfesor']; ?>" disabled>
                        </div>

                        <div class="inputs">
                            <b><label for="">Especialidad:</label></b>
                            <input type="text" class="recolectores formulario" value="<?php echo $entrada['EspecialidadProfesor']; ?>" disabled>
                        </div>

                        <div class="inputs">
                            <b><label for="">Sexo:</label></b>
                            <input type="text" class="recolectores formulario" value="<?php if($entrada['SexoUsuario']==1){echo 'Hombre';}elseif($entrada['SexoUsuario']==2){echo 'Mujer';}else{echo 'Indefinido';}; ?>" disabled>
                        </div>

                        <div class="inputs">
                            <b><label for="">Estado:</label></b>
                            <input type="text" class="recolectores formulario" value="<?php echo $entrada['EstadoUsuario'] == 1? 'Activo' : 'Inactivo'; ?>" disabled>
                        </div>

                        <div class="inputs">
                            <b><label for="">Correo:</label></b>
                            <input type="text" class="recolectores formulario" value="<?php echo $entrada['Email']; ?>" disabled>
                        </div>

                        <div class="inputs">
                            <b><label for="">Usuario:</label></b>
                            <input type="text" class="recolectores formulario" value="<?php echo $entrada['Usuario']; ?>" disabled>
                        </div>

                    </div>

<?php
                }elseif($rol == 1){
?>  
                    <div>
                        <input type="hidden" class="recolectores formulario" value="<?php echo $entrada['IDAdminAcademicoPK']; ?>" disabled>
                        
                        
                        <div class="inputs">
                            <b><label for="">Nombre:</label></b>
                            <input type="text" class="recolectores formulario" value="<?php echo $entrada['NombreAdmin']?>" disabled>
                        </div>
                        
                        <div class="inputs">
                            <b><label for="">Apellido:</label></b>
                            <input type="text" class="recolectores formulario" value="<?php echo $entrada['ApellidoAdmin']; ?>" disabled>
                        </div>
                        
                        <div class="inputs">
                            <b><label for="">Número de documento:</label></b>
                            <input type="text" class="recolectores formulario" value="<?php echo $entrada['DocAdmin']; ?>" disabled>
                        </div>

                        <div class="inputs">
                            <b><label for="">Sexo:</label></b>
                            <input type="text" class="recolectores formulario" value="<?php if($entrada['SexoUsuario']==1){echo 'Hombre';}elseif($entrada['SexoUsuario']==2){echo 'Mujer';}else{echo 'Indefinido';}; ?>" disabled>
                        </div>

                        <div class="inputs">
                            <b><label for="">Estado:</label></b>
                            <input type="text" class="recolectores formulario" value="<?php echo $entrada['EstadoUsuario'] == 1? 'Activo' : 'Inactivo'; ?>" disabled>
                        </div>

                        <div class="inputs">
                            <b><label for="">Correo:</label></b>
                            <input type="text" class="recolectores formulario" value="<?php echo $entrada['Email']; ?>" disabled>
                        </div>

                        <div class="inputs">
                            <b><label for="">Usuario:</label></b>
                            <input type="text" class="recolectores formulario" value="<?php echo $entrada['Usuario']; ?>" disabled>
                        </div>

                    </div>

<?php
                }
            }
        }
    }
?>