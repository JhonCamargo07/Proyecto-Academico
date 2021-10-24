var alertaError = () => {
    swal.fire({
        title: "Error en los datos",
        text:"Verifiquelos e intente nuevamente",
        confirmButtonText: 'Ok, entendí',
        confirmButtonColor: '#0EA3E3',
        imageUrl: '../vistas/imagenes/error.gif',
        imageWidth: 135,
        imageHeight: 135,
        timer: 9990,
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
            },
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        stopKeydownPropagation: false,
    }).then((result)=>{
        if(result.isConfirmed){
            location.href = paginaReferencia;
        }
    });

    var paginaReferencia = document.referrer;

    // Redirecionar al login
    setInterval( ()=>{
        location.href = paginaReferencia;
    }, 10000);
}