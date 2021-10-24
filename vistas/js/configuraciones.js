(function(){

    //!==============================================================
    //!=========================== Imprimir en consola un mensaje preventivo =============================
    //!==============================================================

    console.log('%c¡Detente - Stop!', 'color: #f00; font-size: 4rem; -webkit-text-stroke: 1px #000; font-weight: bold;');
    console.log('%cEsta es una función del navegador destinada a desarrolladores. Si alguien le dijo que copie y pegue algo aquí para habilitar una nueva función en la página o "piratear" la cuenta de alguien, es una estafa y le podría dar acceso a su cuenta.',"color: #fff; font-family: 'Open Sans', sans-serif; font-size: 1.2rem;");

    //!==============================================================
    //!=========================== Detectar el navegador y hacer una alerta en caso de que la página la abran desde Internet Explorer =============================
    //!==============================================================

    function navegador(){
        var agente = navigator.userAgent;
        var navegadores = ["Chrome", "Firefox", "Safari", "Opera", "Trident", "MSIE", "Edge"];

        for(var i in navegadores){
            if(agente.indexOf( navegadores[i] ) != -1)
            return navegadores[i];
        }
    }

    navegador();

    var browser = navegador();
    if(browser == "Trident"){
        alert("¿Estás en Internet Explorer? Este navegador no es compatible con la página, intenta usar otro como Firefox, Chrome o cualquier otro.");
        var IE = document.getElementById('error__ie');

        IE.innerHTML = "<br>Si estás en Internet Explorer, intenta usar otro navegador como Firefox, Chrome o cualquier otro, ya que Internet Explorer NO es compatible con la página. Esto sucede porque Internet Explorer no soporta las nuevas tecnologías.<br>";
        IE.classList.add('error__ie');
    }
}())