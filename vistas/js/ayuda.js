(function(){
    var sidebar = document.getElementById('sidebar'),
        botones = sidebar.elements,
        resultados = document.getElementById('resultados'),
        divs = resultados.elements;
    console.log(botones);

    boton1.addEventListener("click", function(){
        boton1.className = "boton-activo";
        contraseña.style.display = "block";
        original.style.display = "none";
    })
    boton2.addEventListener("click", function(){
        boton2.className = "boton-activo";
    })
    boton3.addEventListener("click", function(){
        boton3.className = "boton-activo";
    })
    boton4.addEventListener("click", function(){
        boton4.className = "boton-activo";
    })
    boton5.addEventListener("click", function(){
        boton5.className = "boton-activo";
    })
    boton6.addEventListener("click", function(){
        boton6.className = "boton-activo";
    })


    
    /* sidebar.addEventListener("click", function(){
        sidebar.elementsclassName = 'boton-activo';
        alert("Hola mundo");
    })

    boton2.addEventListener("click", function(){
        boton2.className = 'boton-activo';
        alert("Boton2");
    }) */
}())