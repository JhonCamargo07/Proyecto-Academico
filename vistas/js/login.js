(function(){
    var login = document.getElementsByName('login')[0],
        elementos = login.elements,
        password = document.getElementById('contraseña'),
        usuario = login.usuario,
        campoPassword = login.contraseña,
        mensajeError = document.getElementById('mensaje-error'),    //Mensaje de error en usuario
        mensajeError2 = document.getElementById('mensaje-error2');  //Mensaje de error en contraseña

    var alertaError = function () {
        swal.fire({
            title: "Error en los datos",
            text:"Debe llenar todos los campos solicitados",
            confirmButtonText: 'Ok, entendí',
            imageUrl: 'imagenes/error.gif',
            imageWidth: 135,
            imageHeight: 135,
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            stopKeydownPropagation: false,
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
                }
        });
    }

    var validarUsuario = function(e){
        if(usuario.value == 0){
            alertaError();
            usuario.classList.add("error");
            usuario.setAttribute("placeholder", "Escribe tu usuario aquí");
            //Mostrar mensajes de error
            mensajeError.style.display="block";

            var comprobarUsuario = function(){
                usuario.classList.remove("error");
                usuario.setAttribute("placeholder", "Nombre de usuario");
                mensajeError.style.display="none";
            };

            usuario.addEventListener("keydown", comprobarUsuario);
            e.preventDefault();
        }
    };

    var validarPassword = function(e){
        if(campoPassword.value == 0){
            alertaError();
            campoPassword.classList.add("error");
            campoPassword.setAttribute("placeholder", "Escribe tu contraseña aquí");
            mensajeError2.style.display="block";

            var comprobarPassword = function(){
                campoPassword.classList.remove("error");
                campoPassword.setAttribute("placeholder", "Contraseña");
                mensajeError2.style.display="none";
            };

            campoPassword.addEventListener("keydown", comprobarPassword);
            e.preventDefault();
        }
    };

    var validar = function(e){
        validarPassword(e);
        validarUsuario(e);
    };

    login.addEventListener("submit", validar);

    //*------------------------------------------------------------
    //!--------------------------- Icono de mostrar contraseña ---------------------------
    //*------------------------------------------------------------

    var icono = document.getElementById('icono');
    
    var mostrarClave = function(){
        if(password.type == "password"){
            icono.classList.add('icon-eye');
            icono.classList.remove('icon-eye-blocked');
            password.type = "text";
        }else{
            icono.classList.add('icon-eye-blocked');
            icono.classList.remove('icon-eye');
            password.type = "password";
        }
    };

    icono.addEventListener("click", mostrarClave);

}())