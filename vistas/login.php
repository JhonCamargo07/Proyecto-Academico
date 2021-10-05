<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,  maximum-scale=1.0" user-scalable=no />
    <meta name="author" content="Jhon Camargo">
    <meta name="description" content="login en el Colegio Rafael Uribe Uribe (IED) Localidad 19 Bogotá - Ciudad Bolívar.">
    <meta name="keywords" content="Colegio Rafael Uribe Uribe, Colegio, Educacion, Rafael Uribe, Colegios ciudad Bolívar, login">
    <link rel="stylesheet" href="css/todos/index.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="shortcut icon" href="imagenes/escudo.jpg">
    <script src="js/sweetalert2.js"></script>
    <title>Iniciar sesión | Colegio Rafael Uribe Uribe IED</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body>
    <div class="contenedor-login">
        <div class="formulario">

            <div class="imagen">
                <center><img loading="lazy" src="imagenes/aulas_virtuales.png" alt="Logo"><hr></center>
            </div>

            <div class="centro">
                
                <form action="../controladores/login.php" name="login" method="POST">
                
                    <div class="inputs">
                        <label for="usuario"></label>
                        <input type="text" name="usuario" class="recolectores" id="usuario" placeholder="Nombre de usuario" autofocus>
                        <div><p class="mensaje__input-error" id="mensaje-error">El usuario es obligatorio</p></div>
                    </div>

                    <div class="inputs">
                        <label for="contraseña"></label>
                        <input type="password" name="password" class="recolectores" id="contraseña" placeholder="Contraseña">
                        <span class="icon-eye-blocked eye" id="icono"></span>
                        <div><p class="mensaje__input-error" id="mensaje-error2">La contraseña es obligatoria</p></div>
                    </div>

                    <div class="inputs">
                        <input type="submit" name="ingresar" value="Iniciar sesión" class="ingresar" id="acceder">
                    </div>

                </form>
                <center class="center"><a href="ayuda.html" class="link">¿Olvidaste tu contraseña?</a></center>

            </div>

        </div> 

        <footer class="footer-login">
            <p>Todos los derechos reservados al Colegio Rafael Uribe Uribe | Copyright ©</p>
        </footer>

    </div>
    
    <script src="js/login.js"></script>
</body>
</html>