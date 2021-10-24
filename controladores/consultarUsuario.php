<?php
    if($_POST){
        $rol = $_POST['rol'];
        $documento = $_POST['documento'];
        if($documento == null ){
            echo '<script language="javascript">
                    alertaError();
                </script>';
        }else{
            if($rol == 1){
                require_once('../modelos/estudiante.php');
                $modelo = new Estudiante();
                $funcion = "consultarEstudiante";
            }elseif($rol == 2){
                require_once('../modelos/profesor.php');
                $modelo = new Profesor();
                $funcion = "consultarProfesor";
            }elseif($rol == 3){
                require_once('../modelos/adminAcademico.php');
                $modelo = new AdminAcademico();
                $funcion = "consultarAdmin";
            }else{
                echo '<script language="javascript">
                        alertaError();
                    </script>';
            }
            $entrada = $modelo->$funcion($documento);
            // Si lo que devuelve la función es false, lo redireciona a login
            if($entrada == false){
                echo '<script>
                        alertaError();
                    </script>';
            }else{

?>
            <div>
                <div class="inputs">
                    <b><label for="">Curso:</label></b>
                    <input type="text" class="recolectores formulario" value="<?php echo $entrada['Curso']; ?>" disabled>
                </div>
                
                <div class="inputs">
                    <b><label for="">Número de documento:</label></b>
                    <input type="text" class="recolectores formulario" value="<?php echo $entrada['N°_Documento']; ?>" disabled>
                </div>

                <div class="inputs">
                    <b><label for="">Nombre:</label></b>
                    <input type="text" class="recolectores formulario" value="<?php echo $entrada['Nombre_Estudiante'] . " " .  $entrada['Apellido_Estudiante']; ?>" disabled>
                </div>

                <div class="inputs">
                    <b><label for="">Profesor:</label></b>
                    <input type="text" class="recolectores formulario" value="<?php echo $entrada['Nombre_Profesor'] . " " . $entrada['Apellido_Profesor']; ?>" disabled>
                </div>

                <div class="inputs">
                    <b><label for="">Materias:</label></b>
                    <input type="text" class="recolectores formulario" value="<?php echo $entrada['Materia']; ?>" disabled>
                </div>
                <div class="inputs">
                    <b><label for="">Horas a la semana:</label></b>
                    <input type="text" class="recolectores formulario" value="<?php echo $entrada['Horas_Semana']; ?>" disabled>
                </div>

            </div>

<?php
            }
        }
    }
?>