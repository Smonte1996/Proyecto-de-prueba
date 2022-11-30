import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone ('#dropzone',{
    dictDefaultMessage: 'sube aqui tu imagen',
    acceptedFiles: ".phg,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar Archivos',
    maxFiles: 5,
    uploadMultiple: false,

    init: function (){
    if(document.querySelector('[name="imagen"]').value.trim()){
        const imagenPublicada = {}
        imagenPublicada.size = 1234;
        imagenPublicada.name = document.querySelector('[name="imagen"]').value;

        this.options.addedfile.call(this, imagenPublicada);
        this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);

        imagenPublicada.previewElement.classList.add("dz-success","dz-complete");
    }
    },
});

dropzone.on('success', function(file, Response){
document.querySelector('[name="imagen"]').value = Response.imagen;
});
dropzone.on("removedfile", function(){
document.querySelector('[name="imagen"]').value = "";
});