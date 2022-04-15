$(document).ready (function(){
   
    /*lleva al otro articulo*/
    $(".noticard").click(function(){
        window.location.href = 'noticia.html';

    });
    /*Para subir noticia y validar que se llenen los campos*/
    $("#crearseccion").submit(function(){

        var nombre = $("#cate").val()
        var orden = $("#orden").val()


        if(nombre == "" || orden == "" ){
           
        alert("Llena los espacios vacios");   
        }
        else{
               
        alert("Seccion subida con exito");   
        }
    });
    /*Crear categoria*/
   
});