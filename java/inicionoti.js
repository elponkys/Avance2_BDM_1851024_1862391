$(document).ready (function(){
   
    /*lleva al otro articulo*/
    $(".noticard").click(function(){
        window.location.href = 'noticia.html';

    });
    /*Para subir noticia y validar que se llenen los campos*/
    $("#newnoti").submit(function(){

        var nombre = $("#nom_noti").val()
        var desc = $("#desc_noti").val()
        var lugar = $("lugar_noti").val()
        var fecha = $("#fecha_noti").val()
        var hora = $("#fecha_noti").val()
        var noticia = $("#noti").val()
        var categoria = $("#cat_noti").val()

        if(nombre == "" || desc == "" || lugar == "" || fecha == "" || hora == "" || noticia == "" || categoria == "" ){
           
        alert("Llena los espacios vacios");   
        }
        else{
               
        alert("Noticia subida con exito");   
        }
    });
    /*Crear categoria*/
    $(".cat").click(function(){

        var catego = $("#cate").val()
       

        if(catego == ""){
           
        alert("Llena los espacios vacios");   
        }
        else{
               
        alert("Categoria subida con exito");   
        }
    });
      /*login*/
      $("#log").submit(function(){
        var usuario = $("#user").val()
        var contras = $("#contra").val()

        if(usuario == "" || contras == ""){
    
        alert("Llena los espacios vacios");   
        }
        else{
        
        window.location.href = 'noticia.html';
        alert("bienvenido");   
        }
    });
     /*crear cuenta*/
     $("#newuser").submit(function(){
        var usuari0 = $("#user").val()
        var pass = $("#passw").val()
        var correo = $("#correo").val()

        if(usuari0 == "" || pass == ""   || correo == "" ){
    
        alert("Llena los espacios vacios");   
        }
        else{
        alert("cuenta creada con exito");   
        }
    });
});