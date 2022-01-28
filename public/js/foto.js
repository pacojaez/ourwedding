function ver(foto) {

    let scrollToY = window.scrollY;
    console.log('scroll TO: ' + scrollToY);

    let fondo = document.getElementById("fondosvg");
    fondo.classList.add('hidden');

    let containerFotos = document.getElementById('container-fotos');
    containerFotos.classList.add('blur');
    // containerFotos.classList.add('hidden');

    let headerFotos = document.getElementById('header-fotos');
    // headerFotos.classList.add('hidden');
    // crea una figura nueva
    var figura = document.createElement("figure");
    //ponerle la clase grande
    figura.classList.add('grande');
    figura.classList.add('flex');
    figura.classList.add('top-0');
    figura.classList.add('justify-center');
    figura.classList.add('z-40');

    //hacer que al hacer click se elimine
    figura.onclick = function() {
        this.remove();
        fondo.classList.remove('hidden');
        headerFotos.classList.remove('hidden');
        containerFotos.classList.remove('hidden');
        containerFotos.classList.remove('blur');
        fondo.classList.remove('hidden');
        window.scrollTo(0, scrollToY);
    };
    //crear una imagen nueva
    var imagen = document.createElement('img');
    //pone el src de la foto que le llega por parametro
    imagen.src = foto.src;
    //coloca la imagen en la figura
    figura.appendChild(imagen);
    //coloca la fiogura en el body del documento
    let div = document.getElementById("parentGrande");
    div.appendChild(figura);
    // scrollToY = 0;

}