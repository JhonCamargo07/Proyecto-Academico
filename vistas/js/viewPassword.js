//!==============================================================
//!=========================== Mostrar contraseña =============================
//!==============================================================

var icono1 = document.getElementById("icono1");
var icono2 = document.getElementById("icono2");
var icono3 = document.getElementById("icono3");
var input0 = document.getElementById("password");
var input1 = document.getElementById("password-estudiante");
var input2 = document.getElementById("password-profesor");
var input3 = document.getElementById("password-admin");

var mostrarClave = (input, icono) => {
    if(input.type == "password"){
        icono.classList.add('icon-eye');
        icono.classList.remove('icon-eye-blocked');
        input.type = "text";
    }else{
        icono.classList.add('icon-eye-blocked');
        icono.classList.remove('icon-eye');
        input.type = "password";
    }
};

icono1.addEventListener("click", ()=>{mostrarClave(input0, icono1)});
icono1.addEventListener("click", ()=>{mostrarClave(input1, icono1)});
icono2.addEventListener("click", ()=>{mostrarClave(input2, icono2)});
icono3.addEventListener("click", ()=>{mostrarClave(input3, icono3)});