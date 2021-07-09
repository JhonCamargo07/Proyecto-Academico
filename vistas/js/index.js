var contenedor = document.getElementById('contenedor'),
    boton = document.getElementById('btn-menu');

var oscurecerBody = function(){
    console.log('Si se activó');
    contenedor.className = ' contenedor-index oscurecer';
};

var devolverBody = function(){
    console.log('Todo volvio a la normalidad');
    contenedor.className = 'contenedor-index';
};

/* if(boton.active = true){
    boton.addEventListener("click", oscurecerBody);
}else{
    devolverBody();
} */