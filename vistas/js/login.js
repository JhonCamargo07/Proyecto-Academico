(function(){
    var login = document.getElementsByName('login')[0],
        elementos = login.elements,
        contraseña = document.getElementById('contraseña'),
        usuario = login.usuario,
        campoContraseña = login.contraseña,
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

    var validarContraseña = function(e){
        if(campoContraseña.value == 0){
            alertaError();
            campoContraseña.classList.add("error");
            campoContraseña.setAttribute("placeholder", "Escribe tu contraseña aquí");
            mensajeError2.style.display="block";

            var comprobarContraseña = function(){
                campoContraseña.classList.remove("error");
                campoContraseña.setAttribute("placeholder", "Contraseña");
                mensajeError2.style.display="none";
            };

            campoContraseña.addEventListener("keydown", comprobarContraseña);
            e.preventDefault();
        }
    };

    var validar = function(e){
        validarContraseña(e);
        validarUsuario(e);
    };

    login.addEventListener("submit", validar);

    //*------------------------------------------------------------
    //!--------------------------- Icono de mostrar contraseña ---------------------------
    //*------------------------------------------------------------

    var icono = document.getElementById('icono');
    
    var mostrarContraseña = function(){
        if(contraseña.type == "password"){
            icono.classList.add('icon-eye');
            icono.classList.remove('icon-eye-blocked');
            contraseña.type = "text";
        }else{
            icono.classList.add('icon-eye-blocked');
            icono.classList.remove('icon-eye');
            contraseña.type = "password";
        }
    };

    icono.addEventListener("click", mostrarContraseña);

}())