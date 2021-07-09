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
}())