document.addEventListener("DOMContentLoaded", function() {
    const preloader = document.querySelector('.preloader');
    
    setTimeout(function() {
        preloader.classList.add('loaded');
    }, 1000);
});

function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('preview-profile-photo');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

function previewSelectedImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('preview-profile-photo');
        output.src = reader.result;
        output.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
}

function mostrarDescripcionCompleta(descripcionCompleta) {
    const descripcionElemento = document.getElementById('descripcion');
    const botonVerMas = document.getElementById('ver-mas');
    const botonVerMenos = document.getElementById('ver-menos');

    if (descripcionElemento) {
        descripcionElemento.innerText = descripcionCompleta;
    }

    if (botonVerMas) botonVerMas.style.display = 'none';
    if (botonVerMenos) botonVerMenos.style.display = 'inline';
}

function mostrarDescripcionCorta(descripcionCorta) {
    const descripcionElemento = document.getElementById('descripcion');
    const botonVerMas = document.getElementById('ver-mas');
    const botonVerMenos = document.getElementById('ver-menos');

    if (descripcionElemento) {
        descripcionElemento.innerText = descripcionCorta;
    }
    
    if (botonVerMas) botonVerMas.style.display = 'inline';
    if (botonVerMenos) botonVerMenos.style.display = 'none';
}
