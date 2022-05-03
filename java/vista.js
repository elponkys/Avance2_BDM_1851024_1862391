$(document).ready(function () {








    
    $("#btn-comment").click(function () {
       var NoticiaSuccess=null;
        var comentario = $("#comentario").val();


        if (comentario == "") {
            alert("Llena los espacios vacios");
            return;
        } else {


            var formData2 = new FormData();

            var Id_noticia = $("#noti_noti").val();
            var Id_usuario = $("#usuario_noti").val();
            formData2.append('ID', Id_noticia);
            formData2.append('Id_usuario', Id_usuario);
            formData2.append('Comentario', comentario);
        $.ajax({
            url: "includes/Crear_comentario_inc.php",
            type: "POST",
            data: formData2,
            success: function (msg) {
                console.log(msg);
                NoticiaSucces = msg;
          
            },
            cache: false,
            contentType: false,
            processData: false,
            async: false
        });
   
       
        }
    });





   
});