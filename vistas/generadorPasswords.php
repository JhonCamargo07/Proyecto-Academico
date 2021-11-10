<?php
    require_once('../controladores/validacion.php');
    // Generar contraseña
    if(isset($_POST['generar'])){
        $nombre = ltrim(rtrim($_POST['nombres']));
        $apellido = ltrim(rtrim($_POST['apellidos']));
        $documento = ltrim(rtrim($_POST['documento']));
        $dificultad = ltrim(rtrim($_POST['dificultad']));

        if(campoNull($nombre) || campoNull($apellido) || campoNull($documento) || campoNull($dificultad)){
            echo "<script>
                    alert('Debe completar todos los datos para poder generar la contraseña');
                </script>";
        }else{
            if($dificultad == 1){
                $cantidad = 2;
            }elseif($dificultad == 2){
                $cantidad = 3;
            }elseif($dificultad == 3){
                $cantidad = 4;
            }else{
                $cantidad = 2;
            }
            $letrasMin = "abcdefghijklmnopqrstuvwxyz";
            $letrasMay = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

            $numeros = "_1$2+3/4%5*6@7^8!9-";
            $claveG = null;
            
            for($i=0; $i<=$cantidad; $i++){
                //generar numero aleatorio
                $num = rand(1, strlen($numeros));
                $letraMinus = rand(1, strlen($letrasMin));
                $letraMayus = rand(1, strlen($letrasMay));

                //crear contraseña
                $claveG .= substr($numeros, $num-1, 1);
                $claveG .= substr($letrasMin, $letraMinus-1, 1);
                $claveG .= substr($letrasMay, $letraMayus-1, 1);

            }

            $nombreSubstr = substr($nombre, 0, 1);
            $apellidoSubstr = substr($apellido, 0, 1);
            $documentoSubstr = substr($documento, (strlen($documento)-3), strlen($documento));
            $passwordGenerate = ucwords($nombreSubstr) . ucwords($apellidoSubstr) . $claveG . $documentoSubstr;
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Generador de contraseña</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/todos/index.css">
    <link rel="stylesheet" href="css/todos/formularios.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="shortcut icon" href="imagenes/escudo.jpg">
</head>
<body>
    <div class="contenedor">
        <header>
            <img src="imagenes/simbolos.png" loading="lazy" alt="Escudo y bandera del colegio Rafael Uribe Uribe">
            <h1>Colegio Rafael Uribe Uribe</h1>
        </header>
        
        <nav>
            <ul>
            
                <li><a class="botones" onclick="window.close();"><span class="icon-undo"></span>Volver</a></li>
            
            </ul>
        </nav>

        <div class="contenido">
            <h1>Generador de contraseñas</h1>
            <form action="generadorPasswords.php" method="POST">
                
                <div class="inputs">
                    <b><label for="nombres">Nombres:</label></b>
                    <input type="text" name="nombres" id="nombres" placeholder="Nombres del usuario" title="Solo los nombres del usuario. Minimo 3 caracteres y maximo 30. No se aceptan números." class="recolectores" required pattern="[a-zA-ZÁ-ÿá-ÿé ]{3,30}" value="<?php if(isset($nombre)){echo $nombre;}?>">
                </div>

                <div class="inputs">
                    <b><label for="apellidos">Apellidos:</label></b>
                    <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos del estudiante" title="Solo los apellidos del usuario. Minimo 3 caracteres y maximo 30. No se aceptan números." class="recolectores" required pattern="[a-zA-ZÁ-ÿá-ÿ ]{3,30}" value="<?php if(isset($apellido)){echo $apellido;}?>">
                </div>
                
                <div class="inputs">
                    <b><label for="documento">Número de documento:</label></b>
                    <input type="number" name="documento" id="documento" placeholder="Número de identificacion "class="recolectores" title="Número de identificacion, Minimo 5 caracteres y maximo 30. No se aceptan letras" required pattern="[1-9]{5,20}" value="<?php if(isset($documento)){echo $documento;}?>">
                </div>

                <div class="inputs">
                    <b><label for="dificultad">Tipo de contraseña:</label></b>
                    <select name="dificultad" id="dificultad" class="recolectores" required>
                        <option <?php if(isset($dificultad)){ echo $dificultad == 1 ? 'selected' : '';} ?> value="1">Normal</option>
                        <option <?php if(isset($dificultad)){ echo $dificultad == 2 ? 'selected' : '';} ?> value="2">Segura</option>
                        <option <?php if(isset($dificultad)){ echo $dificultad == 3 ? 'selected' : '';} ?> value="3">Muy segura</option>
                    </select>
                </div>

                <?php
                    if($_POST){
                ?>
                        <div class="inputs">
                        <b><label for="password">Contraseña Generada:</label></b>
                        <input type="text" name="password" id="password" placeholder="Contraseña segura. "class="recolectores" value="<?php if(isset($passwordGenerate)){ echo $passwordGenerate;} ?>">
                        </div>
                <?php 
                    }
                ?>

                <div class="inputs">
                    <center>
                        <?php
                            if($_POST){
                        ?>
                                <p class="boton" onclick='copylink(document.getElementById("password"));'>Copiar contraseña</p>
                            <?php 
                            }
                        ?>
                        
                        <input type="submit" value="Generar contraseña" name="generar" class="boton primario">
                    </center>
                </div>
                

            </form>
        </div>

        <?php include('admin/footer.php'); ?>

    </div>
    <script>
        function copylink(elem) {
            var copyText = elem;

            copyText.type = "text";
            
            console.log(elem);
            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */
            
            /* Copy the text inside the text field */
            document.execCommand("copy");
            
            /* Alert the copied text */
            alert("La contraseña ya fue copiada al portapapeles");
            // copyText.type = "password";
        }
    </script>
</body>
</html>