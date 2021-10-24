(function(){
    $(".submenu").click(function(){
        $(this).children("ul").slideToggle();
    })

    var padreBoton1 = document.getElementById('padreBoton1'),
        padreBoton2 = document.getElementById('padreBoton2'),
        padreBoton3 = document.getElementById('padreBoton3'),
        boton1 = document.getElementById('boton1'),
        boton2 = document.getElementById('boton2'),
        boton3 = document.getElementById('boton3');

        var cambiarIconos = (boton) => {
            if(boton.className == 'icon-cheveron-down'){
                boton.className = 'icon-cheveron-up';
            }else{
                boton.className = 'icon-cheveron-down';
            }
        }

        padreBoton1.addEventListener("click", function(){cambiarIconos(boton1);});
        padreBoton2.addEventListener("click", function(){cambiarIconos(boton2);});
        padreBoton3.addEventListener("click", function(){cambiarIconos(boton3);});

        //!==============================================================
        //!=========================== Mensaje de bienvenida =============================
        //!==============================================================

        var mensajeBienvenida = "",
            fecha = new Date(),
            horaActual = fecha.getHours();

            if(horaActual >= 0 && horaActual < 12){
                mensajeBienvenida = "Buenos días";
            }else if(horaActual >= 12 && horaActual < 18){
                mensajeBienvenida = "Buenas tardes";
            }else if(horaActual >= 18 && horaActual < 24){
                mensajeBienvenida = "Buenas noches";
            }else{
                mensajeBienvenida = "Bienvenido";
            }

            // var hora = fecha.getHours() + '-' + fecha.getMinutes() + '-' + fecha.getSeconds();

            // console.log(hora);

        var alertaBienvenida = () => {
            swal.fire({
                toast: true,
                position: 'bottom-end',
                title: "<span style='color: #fff'>¡Hola! " + mensajeBienvenida + "</span>",
                showConfirmButton: false,
                icon: false,
                background:'#02F0B6',
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
                },
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                    }
            });
        }

        // Saber de que página viene
        var referrer = document.referrer;

        window.onload = () => {
            // Si viene de la página login, muestra el mensaje de bienveida sino no hace nada
            if(referrer == 'http://localhost/proyectoacademico/vistas/login.php'){
                alertaBienvenida();
            }  
        }
/* 
        //!==============================================================
        //!=========================== salir =============================
        //!==============================================================

        var salir = document.getElementById('salir');

        var redirecionarAlArchivoSalir = () => {
            location.href = 'http://localhost/proyectoacademico/controladores/logout.php';
        };

        salir.addEventListener('click', redirecionarAlArchivoSalir); */

}())