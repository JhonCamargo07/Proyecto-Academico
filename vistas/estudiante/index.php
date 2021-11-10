<?php
    require_once('../../modelos/login.php');
    require_once('../../modelos/estudiante.php');
    $modeloLogin = new Login();
    $modeloLogin->validarSesion();
    $modeloLogin->validarRolEstudiante();
    $model = new Estudiante();
    $idUsuario = $modeloLogin->GetIdUsuario();
    $Usuario = $model->Obtener($idUsuario);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Welcome!</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/todos/index.css">
    <link rel="stylesheet" href="../css/todos/formularios.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://kit.fontawesome.com/dca352768f.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="contenedor">
        <?php include('../admin/header.php'); 
            if($Usuario != null){
                foreach($Usuario as $r){
        ?>
        <nav>
            <ul>
                <li><a href="../" class="botones"><span class="icon-undo"></span>Volver</a></li>
            </ul>
            <ul>
                <li><a href="/proyectoacademico/vistas/estudiante/" class="botones activo"><span class="icon-user-plus"></span>Mi perfil</a></li>
            </ul>
            <ul>
                <li><a href="/proyectoacademico/vistas/estudiante/editarPerfil.php"><span class="icon-user-plus"></span> Editar mi perfil</a></li>
            </ul>
        </nav>
        <div class="contenido">
            <h1>Mi perfil</h1>
                <input type="hidden" value="<?php echo $r['IDEstudiantePK']; ?>">

                <div class="inputs">
                    <b><label for="nombres-estudiante">Nombres:</label></b>
                    <input type="text" name="nombres-estudiante" id="nombres-estudiante" placeholder="Nombres del estudiante" class="recolectores formulario" value="<?php echo $r['NombreEstudiante']; ?>" disabled>
                </div>
                
                <div class="inputs">
                    <b><label for="apellidos-estudiante">Apellidos:</label></b>
                    <input type="text" name="apellidos-estudiante" id="apellidos-estudiante" placeholder="Apellidos del estudiante" class="recolectores formulario" value="<?php echo $r['ApellidoEstudiante']; ?>" disabled>
                </div>
                
                <div class="inputs">
                    <b><label for="documento-estudiante">Número de documento:</label></b>
                    <input type="number" name="documento-estudiante" id="documento-estudiante" placeholder="Número de identificacion "class="recolectores formulario" value="<?php echo $r['DocEstudiante']; ?>" disabled>
                </div>

                <div class="inputs">
                    <b><label for="estado-Estudiante">Estado del estudiante:</label></b>
                        <input value="<?php echo $r['EstadoUsuario'] == 1 ? 'Activo' : 'Inactivo'; ?>" class="recolectores formulario" disabled>
                </div>

                <div class="inputs">
                    <b><label for="sexoEstudiante">Sexo:</label></b>
                    <input value="<?php if($r['SexoUsuario'] == 1){echo 'Hombre';}elseif($r['SexoUsuario'] == 2){echo 'Mujer';}else{echo 'Indefinido';} ?>" class="recolectores formulario" disabled>
                </div>

                <div class="inputs">
                    <b><label for="correo-estudiante">Correo:</label></b>
                    <input type="email" name="correo-estudiante" id="correo-estudiante" placeholder="Correo del estudiante" class="recolectores formulario" value="<?php echo $r['Email']; ?>" disabled>
                </div>

                <div class="inputs">
                    <b><label for="usuario-estudiante">Usuario:</label></b>
                    <input type="text" name="usuario-estudiante" id="usuario-estudiante" placeholder="Nombre de usuario" class="recolectores formulario" value="<?php echo $r['Usuario']; ?>" disabled>
                </div>

                <div class="inputs">
                    <center>
                        <a href="editarPerfil.php"><button class="boton primario">Editar mis datos</button></a>
                    </center>
                </div>
                        
                <?php
                    }
                }
            ?>
        </div>
        
        <?php include('../admin/footer.php'); ?>
    </div>
</body>
</html>