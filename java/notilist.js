$(document).ready(function () {

    $.ajax({
        type: "POST",
        url: './includes/Select_Noticia_inc.php',
        data: $(this).serialize(),
        success: function (response) {
            alert(response);
            var NoticiasNA = $.parseJSON(response);
            for (let Noticias of NoticiasNA) {
              
            $(".cat-conteiner").append('<div class="content"> <h4 class="text-black" style="text-align: center;">' + Noticias['TITULO'] + ' </h4><h5 class="text-black">' + Noticias['DESCRIPCION'] + ' </h5>  <strong>' + Noticias['FIRMA'] + ' </strong>  <strong style="font-style: italic;">' + Noticias['FECHA_PUBLICACION'] + ' </strong>  <strong class="datos">' + Noticias['STATUS'] + ' </strong>   <p class="datos">' + Noticias['TEXTO'] + ' </p>  <input type="button"id="btn_delete" value="Eliminar noticia"></input>   <input type="button"id="btn_update" value="Subir noticia"></input> <input type="button"id="btn_update" value="Hacer comentario"></input>    <input type="button"id="btn_update" value="Ver noticia"></input>    </div>')
           // $(".cat-conteiner").append(' <h5 class="text-black">' + Noticias['DESCRIPCION'] + ' </h5>')
            //$(".cat-conteiner").append('<strong>' + Noticias['FIRMA'] + ' </strong>')
            //$(".cat-conteiner").append('<strong style="font-style: italic;">' + Noticias['FECHA_PUBLICACION'] + ' </strong>')
            //$(".cat-conteiner").append('<strong class="datos">' + Noticias['STATUS'] + ' </strong>')
            //$(".cat-conteiner").append(' <p class="datos">' + Noticias['TEXTO'] + ' </p>')
           
            }
            console.log(response);
            
        }
    });
    
});