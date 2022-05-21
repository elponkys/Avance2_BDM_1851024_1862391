$(document).ready(function () {

    $.ajax({
        type: "POST",
        url: './includes/Select_Noticia_inc.php',
        data: $(this).serialize(),
        success: function (response) {
        
            var NoticiasNA = $.parseJSON(response);
            for (let Noticias of NoticiasNA) {
              
            $(".cat-conteiner").append('<div   class="content"> <h4  class="text-black"   style="text-align: center ;">' + Noticias['TITULO'] + ' </h4><h5 class="text-black">' + Noticias['DESCRIPCION'] + ' </h5>  <strong>' + Noticias['FIRMA'] + ' </strong>  <p style="font-style: italic;">' + Noticias['FECHA_PUBLICACION'] + ' </p>  <strong style="color:#F7E33C";class="datos">' + Noticias['STATUS'] + ' </strong>   <p class="datos">' + Noticias['TEXTO'] + ' </p>  <form  action="includes/subir_noticia_inc.php" class="content" method="POST"> <input type="hidden" name="ID" value="'+Noticias['NOTICIA_ID']+'"></input>       </input></form> <form  action="includes/Comentario_editor_inc.php" class="content" method="POST"> <input type="hidden" name="ID" value="'+Noticias['NOTICIA_ID']+'"></input>  <input type="text" style="  background-color:#D3D0BB;border-radius: 5px; border:none"; placeholder="Comentario" name="comentario" required> <input type="submit" id="btn_update" value="Hacer comentario" style="  background-color: #DE7824 ;border-radius: 5px; border:none";></input> </form> <form  action="VistaNoticia.php" class="content" method="POST"> <input type="hidden" name="ID" value="'+Noticias['NOTICIA_ID']+'"></input>   <input type="submit"  name="submit" id="btn_update"  value="Ver noticia" style="width:100px; background-color: #86A9C9 ;border-radius: 5px; border:none";padding:10px;></input><input type="submit"id="btn_update" style=" width:100px; margin:11px; background-color: #80CD56 ;border-radius: 5px; border:none"; value="Subir noticia" >    </form> </div>')
           // $(".cat-conteiner").append(' <h5 class="text-black">' + Noticias['DESCRIPCION'] + ' </h5>')
            //$(".cat-conteiner").append('<strong>' + Noticias['FIRMA'] + ' </strong>')
            //$(".cat-conteiner").append('<strong style="font-style: italic;">' + Noticias['FECHA_PUBLICACION'] + ' </strong>')
            //$(".cat-conteiner").append('<strong class="datos">' + Noticias['STATUS'] + ' </strong>')
            //$(".cat-conteiner").append(' <p class="datos">' + Noticias['TEXTO'] + ' </p>')
           
            }
            console.log(response);
            
            function Elinput() {
                var elinput = "'noticia.php'";
                return elinput;
            }
        }
    });

    
});