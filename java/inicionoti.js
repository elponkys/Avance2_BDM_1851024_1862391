$(document).ready (function(){
   
    $.ajax({
        type: "POST",
        url: './includes/combo_seccion_inc.php',
        data: $(this).serialize(),
        success: function(response) 
        {
            alert(response);
            var categories = $.parseJSON(response);
            for(let category of categories){
                $("select").append(' <option id="'+category['SECCION_ID']+'">'+category['DESCRIPCION']+'</option>')
            }
       console.log(response);
       }
   });


    /*lleva al otro articulo*/
    $(".noticard").click(function(){
        window.location.href = 'noticia.html';

    });

    $("#cat_noti").change(function(){
        var select = $(this).children("option:selected").val();
        $(".cat-conteiner").append('<label class="ci">'+select+' <button type="button" class="deletec" onClick=" $(this).parent().remove();">X</button></label>')
    });
    $(".deletec").on("click",function(){
       
    });
    function remove(){
        $(this).parent().remove();
        alert("hola");
    }
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