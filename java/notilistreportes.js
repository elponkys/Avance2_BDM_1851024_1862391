$(document).ready(function () {

    $.ajax({
        type: "POST",
        url: './includes/combo_seccion_inc.php',
        data: $(this).serialize(),
        success: function (response) {
            alert(response);
            var categories = $.parseJSON(response);
            for (let category of categories) {
                $("select").append(' <option style="background-color: '+ category['COLOR'] +'" value="' + category['SECCION_ID'] + '">' + category['DESCRIPCION'] + '</option>')
            }
            console.log(response);
        }
    });
var eliminar = 0;
var eliminars = 0;

    $('#btn_noti').click(function () {
        for (let index = 0; index < eliminar; index++) {
            $("#aa").remove();
            
        }
    eliminar = 0;
        var categoria = $("#cat_noti").val();
        var fecha1 = $("#fecha_noti1").val();
        var fecha2 = $("#fecha_noti2").val();
        fechita1 = fecha1.substring(0, 10);
        fechita2 = fecha2.substring(0, 10);
        $.ajax({
            type: "POST",
            url: './includes/Reporte_Noticias_inc.php',
            data: {
                "CAT": categoria,
                "F1": fecha1,
                "F2": fecha2,
              },
            success: function (response) {
            console.log(response);
                var NoticiasNA = $.parseJSON(response);
                for (let Noticias of NoticiasNA) {

                $("#catconteiner").append('<div  id="aa" class="content"> <h4  class="text-black"   style="text-align: center ;">' + Noticias['TITULO'] + ' </h4><h5 class="text-black">' + Noticias['DESCRIPCION'] + ' </h5>  <strong style="font-style: italic;">' + Noticias['FECHA_PUBLICACION'] + ' </strong>  <p class="datos">' + Noticias['LIKES'] + ' </p>   <p class="datos">' + Noticias['COMENTARIOS'] + ' </p>  </div>')

               eliminar = eliminar + 1;
                }
                console.log(response);
                
                function Elinput() {
                    var elinput = "'noticia.php'";
                    return elinput;
                }
            }
        });
    });



    $('#btn_noti2').click(function () {
        for (let index = 0; index < eliminars; index++) {
            $("#ee").remove();
            
        }
        eliminar = 0;
        var fecha1 = $("#fechacat_noti1").val();
        var fecha2 = $("#fechacat_noti2").val();
        
        $.ajax({
            type: "POST",
            url: './includes/Reporte_Secciones_inc.php',
            data: {
                "F1": fecha1,
                "F2": fecha2,
              },
            success: function (response) {
            
                var NoticiasNA = $.parseJSON(response);
                for (let Noticias of NoticiasNA) {

                $("#catsito-conteiner").append('<div  id="ee" class="content"> <h5 class="text-black">' + Noticias['DESCRIPCION'] + ' </h5>  <strong style="font-style: italic;">' + Noticias['FECHA_PUBLICACION'] + ' </strong>  <p class="datos">' + Noticias['LIKES'] + ' </p>   <p class="datos">' + Noticias['COMENTARIOS'] + ' </p>  </div>')
                eliminars = eliminars + 1;
               
                }
                console.log(response);
                
                function Elinput() {
                    var elinput = "'noticia.php'";
                    return elinput;
                }
            }
        });
    });



    
});