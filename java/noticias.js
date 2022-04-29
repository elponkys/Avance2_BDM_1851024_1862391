$(document).ready(function () {

    $.ajax({
        type: "POST",
        url: './includes/Select_NoticiasSubidas_inc.php',
        data: $(this).serialize(),
        success: function (response) {
        
            var NoticiasA = $.parseJSON(response);
            for (let Noticias of NoticiasA) {
                var formData2 = new FormData();
                var ID=Noticias['NOTICIA_ID'];
               
                formData2.append('ID', Noticias['NOTICIA_ID']);
                $.ajax({
                    type: "POST",
                    url: './includes/Select_miniatura_inc.php',
                    data: {"ID":ID},
                    success: function (response) {
                        var Miniatura = response;
                      
                              $(".cat-conteiner").append('<div  class="card noticard""><div class="image"><img width="200" height="200" src="data:image/jpeg;base64,' +Miniatura+ '");  "></div><div class="title"><h1>'+Noticias['TITULO']+'</h1> </div>  <div class="date"><p>Fecha de la noticia:'+Noticias['FECHA_PUBLICACION']+'</p></div>   <div class="des"><p>'+Noticias['DESCRIPCION']+'</p><button>Leer mas...</button> </div> </div>')
                    }
                });
           
            }
            console.log(response);
            
            function Elinput(multi) {
    var imagen=document.imgSrc.multi;
                return document.imgSrc.src = misImagenes[i];
                
            }
        }
    });

    
});