function mostrar(id){
    if (id == "estudiante") {
        $("#estudiante").show();
        $("#profesor").hide();
        $("#administrador").hide();
    }
    else if(id == "profesor"){
        $("#estudiante").hide();
        $("#profesor").show();
        $("#administrador").hide();
    }
    else if(id == "administrador"){
        $("#estudiante").hide();
        $("#profesor").hide();
        $("#administrador").show();
    }
}
