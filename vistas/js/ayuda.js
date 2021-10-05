(function(){
    //!==============================================================
    //!=========================== Categorias =============================
    //!==============================================================
    const categorias = document.querySelector('#categorias');
    let sectionCategoria = document.querySelectorAll('.categoria');
    let sectionCategoriaLast = sectionCategoria[sectionCategoria.length -1];

    // Redirecionar a la vista contacto
    sectionCategoriaLast.addEventListener('click', ()=>{
        swal.fire({
            title: "Será redirecionado a la página de contacto",
            text:"Allí podra dar a conocer su problema y tan pronto como sea posible le daremos respuesta.",
            confirmButtonText: 'Ok, dejaré mi problema',
            imageUrl: 'imagenes/error.gif',
            imageWidth: 135,
            imageHeight: 135,
            timer: 6090,
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
                location.href ="contacto.php";
            }
        });
        setTimeout( ()=>{
            location.href = "contacto.php";
        }, 6100);
    });

    const btnLeft = document.querySelector('#btn-left');
    const btnRight = document.querySelector('#btn-right');

    if(screen.width < 769){

    }else{
        categorias.insertAdjacentElement('afterbegin', sectionCategoriaLast);
    }

    if(screen.width < 768){
        var margin1 = -45;
        var margin2 = -21.6;
        var margin3 = -23;
    }else{
        margin1 = -34.2;
        margin2 = -17.2;
        margin3 = -17.2;
    }

    function moverDerecha(){
        let sectionCategoriaFirst = document.querySelectorAll('.categoria')[0];
        categorias.style.marginLeft = margin1 + "%";
        categorias.style.transition = "all 0.3s";
        setTimeout(() => {
            categorias.style.transition = "none";
            categorias.insertAdjacentElement('beforeend', sectionCategoriaFirst);
            categorias.style.marginLeft = margin2 + "%";
        }, 300);
    };

    function moverIzquierda(){
        let sectionCategoria = document.querySelectorAll('.categoria');
        let sectionCategoriaLast = sectionCategoria[sectionCategoria.length -1];
        categorias.style.marginLeft = "0%";
        categorias.style.transition = "all 0.3s";
        setTimeout(() => {
            categorias.style.transition = "none";
            categorias.insertAdjacentElement('afterbegin', sectionCategoriaLast);
            categorias.style.marginLeft = margin3 + "%";
        }, 300);
    };

    btnRight.addEventListener('click', ()=>{
        moverDerecha();
    });

    btnLeft.addEventListener('click', ()=>{
        moverIzquierda();
    });

    // setInterval(()=>{
    //     moverIzquierda();
    // }, 5000);


    //!==============================================================
    //!=========================== Respuestas =============================
    //!==============================================================

    const categoriasMenu = document.querySelectorAll('#categorias .categoria');
    const contenedorPreguntas = document.querySelectorAll('.contenedor-preguntas');
    let categoriaActiva = null;

    categoriasMenu.forEach( (categoria) => {
        categoria.addEventListener('click', (e) =>{
            categoriasMenu.forEach((elemento) => {
                elemento.classList.remove('activa');
            });
            e.currentTarget.classList.toggle('activa');
            categoriaActiva = categoria.dataset.categoria;

            // Activamos el contenedor de pregunta que correnponda
            contenedorPreguntas.forEach( (contenedor) => {
                if(contenedor.dataset.categoria === categoriaActiva){
                    contenedor.classList.add('activo');
                }else{
                    contenedor.classList.remove('activo');
                }
            });
        });
    });

    const preguntas = document.querySelectorAll('.preguntas .contenedor-pregunta');
    preguntas.forEach( (pregunta) => {
        pregunta.addEventListener('click', (e) => {
            e.currentTarget.classList.toggle('activa');

            const respuesta = pregunta.querySelector('.respuesta');
            const alturaRealRespuesta = respuesta.scrollHeight;
            
            if(!respuesta.style.maxHeight){
                // Si está vacio e maxHeight le agragamos in valor.
                respuesta.style.maxHeight = alturaRealRespuesta + 'px';
            }else{
                respuesta.style.maxHeight = null;
            }

            // Reiniciar preguntas
            preguntas.forEach( (elemento) => {
                if(pregunta !== elemento){
                    elemento.classList.remove('activa');
                    elemento.querySelector('.respuesta').style.maxHeight = null;
                }
            });
        });
    });

}())