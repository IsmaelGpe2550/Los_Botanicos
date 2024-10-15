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